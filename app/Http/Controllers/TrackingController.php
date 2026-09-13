<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Hiển thị trang Tra cứu đơn hàng / Ticket sửa chữa.
     */
    public function index()
    {
        return view('tracking.index', [
            'title' => 'Tra cứu đơn hàng',
            'order' => null,
        ]);
    }

    /**
     * Xử lý tìm kiếm — dùng dữ liệu mock mô phỏng.
     */
    public function search(Request $request)
    {
        $data = $request->validate([
            'keyword' => 'required|string|max:100',
        ]);

        $keyword = trim($data['keyword']);

        // ─── MOCK DATA ─────────────────────────────────────────
        // Mô phỏng kết quả tra cứu. Trong thực tế, bạn sẽ query
        // từ DB (orders / repair_tickets) dựa trên mã ticket hoặc SĐT.
        $mockOrders = collect([
            [
                'id'            => 'TL-ORD-20240801-001',
                'product_name'  => 'Lab TKL Pro (Gateron Oil King)',
                'total'         => '3.500.000₫',
                'status'        => 'processing',      // key dùng cho timeline
                'status_text'   => 'Đang xử lý / Sửa chữa',
                'created_at'    => '01/08/2026',
                'timeline'      => [
                    ['label' => 'Đã tiếp nhận',      'date' => '01/08', 'completed' => true],
                    ['label' => 'Đang xử lý / Sửa chữa', 'date' => '03/08', 'completed' => true],
                    ['label' => 'Đang giao hàng',    'date' => '—',     'completed' => false],
                    ['label' => 'Hoàn thành',        'date' => '—',     'completed' => false],
                ],
            ],
            [
                'id'            => 'TL-TKT-20240802-045',
                'product_name'  => 'Nova 65 – Dịch vụ Lube + Mod Foam',
                'total'         => '850.000₫',
                'status'        => 'shipping',
                'status_text'   => 'Đang giao hàng',
                'created_at'    => '28/07/2026',
                'timeline'      => [
                    ['label' => 'Đã tiếp nhận',      'date' => '28/07', 'completed' => true],
                    ['label' => 'Đang xử lý / Sửa chữa', 'date' => '30/07', 'completed' => true],
                    ['label' => 'Đang giao hàng',    'date' => '05/08', 'completed' => true],
                    ['label' => 'Hoàn thành',        'date' => '—',     'completed' => false],
                ],
            ],
            [
                'id'            => 'TL-ORD-20240720-003',
                'product_name'  => 'Mainframe 100 (Cherry MX2A Red)',
                'total'         => '4.200.000₫',
                'status'        => 'completed',
                'status_text'   => 'Hoàn thành',
                'created_at'    => '12/07/2026',
                'timeline'      => [
                    ['label' => 'Đã tiếp nhận',      'date' => '12/07', 'completed' => true],
                    ['label' => 'Đang xử lý / Sửa chữa', 'date' => '14/07', 'completed' => true],
                    ['label' => 'Đang giao hàng',    'date' => '18/07', 'completed' => true],
                    ['label' => 'Hoàn thành',        'date' => '20/07', 'completed' => true],
                ],
            ],
        ]);

        // Giả lập tìm kiếm: nếu keyword chứa "TL-" → match theo mã, nếu không → match SĐT giả
        if (str_contains(strtoupper($keyword), 'TL-')) {
            $order = $mockOrders->firstWhere('id', $keyword);
            $notFound = !$order;
        } else {
            // Mô phỏng tra SĐT: luôn trả về đơn đầu tiên nếu nhập đúng 10 số
            $order = preg_match('/^\d{10,11}$/', $keyword) ? $mockOrders->first() : null;
            $notFound = !$order;
        }

        return view('tracking.index', [
            'title'    => 'Kết quả tra cứu',
            'order'    => $order,
            'notFound' => $notFound ?? false,
            'keyword'  => $keyword,
        ]);
    }
}