@extends('layouts.public')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-950 min-h-screen">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <h1 class="text-3xl font-bold tracking-tight mb-8 text-gray-900 dark:text-white">Thanh toán</h1>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Form nhập liệu -->
                <div class="md:w-2/3">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-6 sm:p-8">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 border-b border-gray-100 dark:border-gray-800 pb-4">Thông tin giao hàng</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Họ và tên</label>
                                <input type="text" id="name" value="{{ auth()->user()->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white" readonly>
                            </div>
                            <div>
                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số điện thoại <span class="text-red-500">*</span></label>
                                <input type="text" id="phone_number" name="phone_number" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white">
                                @error('phone_number') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="shipping_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Địa chỉ giao hàng <span class="text-red-500">*</span></label>
                                <textarea id="shipping_address" name="shipping_address" rows="3" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white"></textarea>
                                @error('shipping_address') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ghi chú thêm</label>
                                <textarea id="notes" name="notes" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white" placeholder="Giao giờ hành chính, v.v..."></textarea>
                                @error('notes') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tóm tắt -->
                <div class="md:w-1/3">
                    <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-6 sticky top-24">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4 border-b border-gray-100 dark:border-gray-800 pb-2">Đơn hàng</h2>
                        
                        <ul class="mb-4 space-y-3">
                            @php $total = 0; @endphp
                            @foreach($cart as $item)
                                @php $total += $item['price'] * $item['quantity']; @endphp
                                <li class="flex justify-between items-start text-sm">
                                    <div class="flex-1 pr-2">
                                        <span class="text-gray-900 dark:text-white font-medium block truncate">{{ $item['name'] }}</span>
                                        <span class="text-gray-500 dark:text-gray-400 text-xs">x{{ $item['quantity'] }}</span>
                                    </div>
                                    <span class="text-gray-900 dark:text-white font-medium shrink-0">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}đ</span>
                                </li>
                            @endforeach
                        </ul>
                        
                        <div class="border-t border-gray-100 dark:border-gray-800 pt-4 mb-6">
                            <div class="flex justify-between items-center mb-2 text-sm text-gray-600 dark:text-gray-400">
                                <span>Phí vận chuyển</span>
                                <span>Miễn phí</span>
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-base font-bold text-gray-900 dark:text-white">Tổng cộng</span>
                                <span class="text-xl font-extrabold text-cyan-600 dark:text-cyan-400">{{ number_format($total, 0, ',', '.') }}đ</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full flex justify-center items-center px-6 py-3.5 border border-transparent text-base font-bold rounded-lg text-white bg-cyan-600 hover:bg-cyan-700 shadow-lg hover:shadow-cyan-500/30 transition-all">
                            Đặt Hàng ($)
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
