@extends('layouts.public')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-950 min-h-screen">
    <div class="container mx-auto px-4">
        
        <h1 class="text-3xl font-bold tracking-tight mb-8 text-gray-900 dark:text-white">Giỏ hàng của bạn</h1>

        @if(session('success'))
            <div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Thành công!</span> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Lỗi!</span> {{ session('error') }}
            </div>
        @endif

        @if(empty($cart))
            <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-12 text-center">
                <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Giỏ hàng trống</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">Bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-cyan-600 hover:bg-cyan-700 transition-colors">
                    Tiếp tục mua sắm
                </a>
            </div>
        @else
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Danh sách sản phẩm -->
                <div class="lg:w-2/3">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                        <ul class="divide-y divide-gray-200 dark:divide-gray-800">
                            @php $total = 0; @endphp
                            @foreach($cart as $id => $details)
                                @php $total += $details['price'] * $details['quantity']; @endphp
                                <li class="p-6 flex flex-col sm:flex-row gap-6 items-center">
                                    <div class="shrink-0 w-24 h-24 bg-gray-50 dark:bg-gray-800 rounded-xl overflow-hidden flex items-center justify-center border border-gray-100 dark:border-gray-700">
                                        <img src="{{ $details['image'] ? asset('storage/' . $details['image']) : 'https://placehold.co/400x400/111827/22d3ee?text=' . urlencode($details['name']) }}" alt="{{ $details['name'] }}" class="w-full h-full object-contain">
                                    </div>
                                    <div class="flex-1 text-center sm:text-left">
                                        <a href="{{ route('products.show', $details['slug']) }}" class="text-lg font-bold text-gray-900 dark:text-white hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">{{ $details['name'] }}</a>
                                        <div class="text-cyan-600 dark:text-cyan-400 font-bold mt-1">{{ number_format($details['price'], 0, ',', '.') }}đ</div>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <!-- Cập nhật số lượng -->
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-2 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white font-medium">
                                            <button type="submit" class="text-xs text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 font-medium px-2">Cập nhật</button>
                                        </form>

                                        <!-- Xóa -->
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-gray-400 hover:text-red-500 dark:hover:text-red-400 transition-colors bg-gray-50 dark:bg-gray-800 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20" title="Xóa">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Tổng kết đơn hàng -->
                <div class="lg:w-1/3">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-6 sticky top-24">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 border-b border-gray-100 dark:border-gray-800 pb-4">Tóm tắt đơn hàng</h2>
                        
                        <div class="flex justify-between items-center mb-4 text-gray-600 dark:text-gray-400">
                            <span>Tạm tính</span>
                            <span class="font-medium text-gray-900 dark:text-white">{{ number_format($total, 0, ',', '.') }}đ</span>
                        </div>
                        <div class="flex justify-between items-center mb-4 text-gray-600 dark:text-gray-400">
                            <span>Phí vận chuyển</span>
                            <span class="text-green-600 dark:text-green-400 font-medium">Miễn phí</span>
                        </div>
                        
                        <div class="border-t border-gray-100 dark:border-gray-800 pt-4 mb-6 flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-900 dark:text-white">Tổng cộng</span>
                            <span class="text-2xl font-extrabold text-cyan-600 dark:text-cyan-400">{{ number_format($total, 0, ',', '.') }}đ</span>
                        </div>
                        
                        <a href="{{ route('checkout.index') }}" class="w-full flex justify-center items-center px-6 py-3.5 border border-transparent text-base font-bold rounded-lg text-white bg-cyan-600 hover:bg-cyan-700 shadow-lg hover:shadow-cyan-500/30 transition-all">
                            Tiến hành thanh toán
                        </a>
                        <a href="{{ route('products.index') }}" class="w-full flex justify-center items-center px-6 py-3 border border-gray-300 dark:border-gray-700 mt-4 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            Tiếp tục mua sắm
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
