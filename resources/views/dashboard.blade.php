<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-0.5">TypeLab Admin</p>
            <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">Dashboard</h1>
        </div>
    </x-slot>

    <div class="space-y-8">

        <!-- Chào mừng -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 p-6 sm:p-8 text-white shadow-lg shadow-cyan-500/20">
            <div class="absolute -top-8 -right-8 w-48 h-48 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute -bottom-12 -left-4 w-40 h-40 rounded-full bg-white/5 blur-2xl"></div>
            <div class="relative z-10">
                <p class="text-sm font-medium text-white/80 mb-1">Chào mừng trở lại,</p>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-1">{{ Auth::user()->name }} 👋</h2>
                <p class="text-sm text-white/70">Đây là tổng quan tình trạng cửa hàng TypeLab của bạn hôm nay.</p>
            </div>
        </div>

        <!-- Thống kê nhanh -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
            @php
                $stats = [
                    ['label' => 'Tổng sản phẩm', 'value' => '—', 'sub' => 'Chưa có dữ liệu', 'color' => 'cyan', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                    ['label' => 'Tickets sửa chữa', 'value' => '—', 'sub' => 'Sắp ra mắt', 'color' => 'blue', 'icon' => 'M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z'],
                    ['label' => 'Đơn hàng', 'value' => '—', 'sub' => 'Sắp ra mắt', 'color' => 'violet', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['label' => 'Người dùng', 'value' => '—', 'sub' => 'Sắp ra mắt', 'color' => 'rose', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                ];
                $colorMap = [
                    'cyan'   => ['bg' => 'bg-cyan-50 dark:bg-cyan-900/20',   'icon' => 'text-cyan-600 dark:text-cyan-400',   'border' => 'border-cyan-200 dark:border-cyan-800/50'],
                    'blue'   => ['bg' => 'bg-blue-50 dark:bg-blue-900/20',   'icon' => 'text-blue-600 dark:text-blue-400',   'border' => 'border-blue-200 dark:border-blue-800/50'],
                    'violet' => ['bg' => 'bg-violet-50 dark:bg-violet-900/20', 'icon' => 'text-violet-600 dark:text-violet-400', 'border' => 'border-violet-200 dark:border-violet-800/50'],
                    'rose'   => ['bg' => 'bg-rose-50 dark:bg-rose-900/20',   'icon' => 'text-rose-600 dark:text-rose-400',   'border' => 'border-rose-200 dark:border-rose-800/50'],
                ];
            @endphp

            @foreach($stats as $stat)
                @php $c = $colorMap[$stat['color']]; @endphp
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl p-5 flex items-center gap-4 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl {{ $c['bg'] }} border {{ $c['border'] }} flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $stat['icon'] }}"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-2xl font-extrabold text-gray-900 dark:text-white leading-none">{{ $stat['value'] }}</p>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mt-0.5">{{ $stat['label'] }}</p>
                        <p class="text-xs text-gray-400 dark:text-gray-600 mt-0.5">{{ $stat['sub'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Hành động nhanh -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl p-6 shadow-sm">
            <h3 class="text-base font-bold text-gray-900 dark:text-white mb-5">Hành động nhanh</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                <a href="{{ route('admin.products.create') }}"
                   class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-cyan-400 dark:hover:border-cyan-600 hover:shadow-md dark:hover:shadow-[0_0_15px_rgba(6,182,212,0.1)] bg-gray-50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 transition-all duration-200">
                    <div class="w-10 h-10 rounded-lg bg-cyan-500 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">Thêm sản phẩm mới</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Bàn phím, Switch, Keycap...</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 ml-auto group-hover:text-cyan-500 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>

                <a href="{{ route('admin.products.index') }}"
                   class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-cyan-400 dark:hover:border-cyan-600 hover:shadow-md dark:hover:shadow-[0_0_15px_rgba(6,182,212,0.1)] bg-gray-50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 transition-all duration-200">
                    <div class="w-10 h-10 rounded-lg bg-blue-500 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">Xem danh sách sản phẩm</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Quản lý, sửa, xóa sản phẩm</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 ml-auto group-hover:text-cyan-500 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>

                <a href="{{ route('home') }}" target="_blank"
                   class="group flex items-center gap-4 p-4 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-cyan-400 dark:hover:border-cyan-600 hover:shadow-md dark:hover:shadow-[0_0_15px_rgba(6,182,212,0.1)] bg-gray-50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800 transition-all duration-200">
                    <div class="w-10 h-10 rounded-lg bg-gray-700 dark:bg-gray-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">Xem trang chủ</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Mở website TypeLab trong tab mới</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 ml-auto group-hover:text-cyan-500 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

    </div>
</x-app-layout>
