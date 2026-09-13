<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20',
            'notes' => 'nullable|string|max:1000'
        ]);

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Sinh mã đơn hàng ngẫu nhiên (Ví dụ: TL-ORD-20240904-XXXX)
        $orderNumber = 'TL-ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        $order = Order::create([
            'user_id' => Auth::id(), // null nếu chưa đăng nhập nhưng checkout yêu cầu auth
            'order_number' => $orderNumber,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'shipping_address' => $request->shipping_address,
            'phone_number' => $request->phone_number,
            'notes' => $request->notes,
        ]);

        foreach ($cart as $id => $item) {
            // Note: DB schema có bảng order_items chứa product_variant_id. 
            // Do chưa làm variant hoàn chỉnh, ta lưu id sản phẩm gốc vào product_variant_id tạm thời.
            // Hoặc tạo một variant mặc định nếu cần. (Ở đây tạm dùng id product).
            OrderItem::create([
                'order_id' => $order->id,
                'product_variant_id' => $id, // Tạm thời dùng Product ID
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity']
            ]);
        }

        Session::forget('cart');

        return redirect()->route('checkout.success', ['order' => $order->order_number])
            ->with('success', 'Đặt hàng thành công!');
    }

    public function success($order_number)
    {
        $order = Order::where('order_number', $order_number)->where('user_id', Auth::id())->firstOrFail();
        return view('checkout.success', compact('order'));
    }
}
