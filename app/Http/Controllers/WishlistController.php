<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Auth::user()->wishlists()->with('product')->latest()->get();
        return view('wishlists.index', compact('wishlists'));
    }

    public function toggle(Product $product)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'removed', 'message' => 'Đã xóa khỏi danh sách yêu thích.']);
        } else {
            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $product->id
            ]);
            return response()->json(['status' => 'added', 'message' => 'Đã thêm vào danh sách yêu thích!']);
        }
    }
}
