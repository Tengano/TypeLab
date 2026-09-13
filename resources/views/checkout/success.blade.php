@extends('layouts.public')

@section('content')
<div class="py-20 bg-gray-50 dark:bg-gray-950 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 max-w-lg text-center">
        
        <div class="w-24 h-24 bg-green-100 dark:bg-green-900/30 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        
        <h1 class="text-3xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white">Đặt hàng thành công!</h1>
        <p class="text-gray-600 dark:text-gray-400 mb-8">Cảm ơn bạn đã mua sắm tại TypeLab. Mã đơn hàng của bạn là <strong class="text-cyan-600 dark:text-cyan-400">{{ $order->order_number }}</strong>.</p>
        
        <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-6 mb-8 text-left text-sm">
            <h3 class="font-bold text-gray-900 dark:text-white mb-4 border-b border-gray-100 dark:border-gray-800 pb-2">Thông tin giao hàng</h3>
            <p class="mb-1"><span class="text-gray-500 dark:text-gray-400">Người nhận:</span> <span class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</span></p>
            <p class="mb-1"><span class="text-gray-500 dark:text-gray-400">Số điện thoại:</span> <span class="font-medium text-gray-900 dark:text-white">{{ $order->phone_number }}</span></p>
            <p class="mb-1"><span class="text-gray-500 dark:text-gray-400">Địa chỉ:</span> <span class="font-medium text-gray-900 dark:text-white">{{ $order->shipping_address }}</span></p>
            <p><span class="text-gray-500 dark:text-gray-400">Tổng thanh toán:</span> <span class="font-bold text-cyan-600 dark:text-cyan-400">{{ number_format($order->total_amount, 0, ',', '.') }}đ</span></p>
        </div>

        <a href="{{ route('home') }}" class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-bold rounded-lg text-white bg-cyan-600 hover:bg-cyan-700 transition-all shadow-sm">
            Tiếp tục mua sắm
        </a>
        <a href="{{ route('tracking.index') }}?keyword={{ $order->order_number }}" class="inline-flex justify-center items-center px-6 py-3 mt-4 sm:mt-0 sm:ml-4 border border-gray-300 dark:border-gray-700 text-base font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors shadow-sm">
            Tra cứu đơn hàng
        </a>

    </div>
</div>
@endsection
