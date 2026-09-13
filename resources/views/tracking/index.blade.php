<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' — TypeLab' : 'Tra cứu đơn hàng — TypeLab' }}</title>

    {{-- Dark mode trước khi tải trang --}}
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 selection:bg-cyan-500 selection:text-white transition-colors duration-300">

    {{-- ===================== HEADER ===================== --}}
    <header class="sticky top-0 z-50 w-full bg-white/90 dark:bg-gray-900/90 backdrop-blur-lg border-b border-gray-200 dark:border-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4 h-16 flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <svg class="w-8 h-8 text-cyan-600 dark:text-cyan-400 group-hover:text-cyan-500 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.001"/><path d="M10 8h.001"/><path d="M14 8h.001"/><path d="M18 8h.001"/><path d="M8 12h.001"/><path d="M12 12h.001"/><path d="M16 12h.001"/><path d="M7 16h10"/></svg>
                <span class="text-xl font-bold tracking-tight text-gray-900 dark:text-white transition-colors">Type<span class="text-cyan-600 dark:text-cyan-400">Lab</span></span>
            </a>

            {{-- Right Side --}}
            <div class="flex items-center gap-4">
                <button id="theme-toggle" type="button" class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg text-sm p-2 transition-colors">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
    </header>

    {{-- ===================== MAIN ===================== --}}
    <main class="transition-colors duration-300">

        {{-- ─── HERO SEARCH ─── --}}
        <section class="relative overflow-hidden">
            {{-- Background decoration --}}
            <div class="absolute inset-0 bg-gradient-to-br from-cyan-50 via-white to-blue-50 dark:from-gray-950 dark:via-gray-900 dark:to-cyan-950 transition-colors duration-300"></div>
            <div class="absolute top-1/4 -left-20 w-80 h-80 rounded-full bg-cyan-400/20 dark:bg-cyan-500/10 blur-3xl transition-colors"></div>
            <div class="absolute bottom-1/4 right-0 w-96 h-96 rounded-full bg-blue-400/20 dark:bg-blue-500/10 blur-3xl transition-colors"></div>

            <div class="container mx-auto px-4 py-16 md:py-24 relative z-10 text-center">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-xs font-medium text-cyan-600 dark:text-cyan-400 mb-6 shadow-sm transition-colors">
                    <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
                    24/7 Tra cứu trực tuyến
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight mb-4 text-gray-900 dark:text-white transition-colors">
                    Tra cứu đơn hàng & <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600 dark:from-cyan-400 dark:to-blue-500">Ticket sửa chữa</span>
                </h1>
                <p class="text-gray-600 dark:text-gray-400 max-w-lg mx-auto mb-10 transition-colors">
                    Nhập mã đơn hàng (VD: TL-ORD-...) hoặc số điện thoại của bạn để kiểm tra trạng thái.
                </p>

                {{-- Search Form --}}
                <form action="{{ route('tracking.search') }}" method="GET" class="max-w-xl mx-auto">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                            <input
                                type="text"
                                name="keyword"
                                value="{{ old('keyword', $keyword ?? '') }}"
                                placeholder="Nhập mã đơn hàng hoặc SĐT của bạn"
                                class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:border-cyan-400 dark:focus:border-cyan-500 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all text-base shadow-sm"
                                autocomplete="off"
                            >
                        </div>
                        <button
                            type="submit"
                            class="px-8 py-4 bg-cyan-500 hover:bg-cyan-600 active:bg-cyan-700 text-white font-bold rounded-xl shadow-md shadow-cyan-500/20 dark:shadow-[0_0_20px_rgba(6,182,212,0.35)] hover:shadow-lg hover:shadow-cyan-500/30 transition-all text-base flex items-center justify-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            Tra cứu
                        </button>
                    </div>
                </form>

                {{-- Quick examples --}}
                <div class="mt-6 flex flex-wrap items-center justify-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Thử với:</span>
                    <a href="{{ route('tracking.search', ['keyword' => 'TL-ORD-20240801-001']) }}" class="px-2.5 py-1 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-cyan-400 dark:hover:border-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors font-mono text-xs">TL-ORD-20240801-001</a>
                    <a href="{{ route('tracking.search', ['keyword' => 'TL-TKT-20240802-045']) }}" class="px-2.5 py-1 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-cyan-400 dark:hover:border-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors font-mono text-xs">TL-TKT-20240802-045</a>
                    <a href="{{ route('tracking.search', ['keyword' => '0909123456']) }}" class="px-2.5 py-1 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-cyan-400 dark:hover:border-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors font-mono text-xs">0909123456</a>
                </div>
            </div>
        </section>

        {{-- ─── KẾT QUẢ ─── --}}
        @if(isset($order) && $order)
            <section class="container mx-auto px-4 pb-20 -mt-6 relative z-20">
                <div class="max-w-3xl mx-auto space-y-8">

                    {{-- Card tóm tắt thông tin --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 md:p-8 shadow-lg dark:shadow-[0_0_30px_rgba(6,182,212,0.08)]">
                        <div class="flex items-center gap-2 mb-5">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                                @switch($order['status'])
                                    @case('completed')
                                        bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400
                                        @break
                                    @case('shipping')
                                        bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400
                                        @break
                                    @case('processing')
                                        bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400
                                        @break
                                    @default
                                        bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300
                                @endswitch
                            ">
                                <span class="w-1.5 h-1.5 rounded-full
                                    @switch($order['status'])
                                        @case('completed') bg-green-500 @break
                                        @case('shipping') bg-blue-500 @break
                                        @case('processing') bg-yellow-500 @break
                                        @default bg-gray-400
                                    @endswitch
                                "></span>
                                {{ $order['status_text'] }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Mã đơn / Ticket</p>
                                <p class="text-sm font-mono font-bold text-gray-900 dark:text-white">{{ $order['id'] }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Sản phẩm / Dịch vụ</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $order['product_name'] }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Tổng tiền / Phí sửa chữa</p>
                                <p class="text-sm font-bold text-cyan-600 dark:text-cyan-400">{{ $order['total'] }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Timeline --}}
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 md:p-8 shadow-lg dark:shadow-[0_0_30px_rgba(6,182,212,0.08)]">
                        <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            Trạng thái xử lý
                        </h2>

                        {{-- Timeline ngang (desktop) --}}
                        <div class="hidden md:block">
                            <div class="relative flex items-start justify-between">
                                {{-- Đường nối --}}
                                <div class="absolute top-5 left-0 right-0 h-0.5 bg-gray-200 dark:bg-gray-700 transition-colors">
                                    <div class="h-full bg-cyan-500 transition-all duration-700" style="width: {{ $order['status'] === 'completed' ? '100' : ($order['status'] === 'shipping' ? '75' : ($order['status'] === 'processing' ? '50' : '25')) }}%"></div>
                                </div>

                                @foreach($order['timeline'] as $step)
                                    <div class="relative flex flex-col items-center text-center" style="width: 25%">
                                        {{-- Dot --}}
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold border-2 z-10 transition-all duration-300
                                            {{ $step['completed'] ? 'bg-cyan-500 border-cyan-500 text-white shadow-md shadow-cyan-500/30' : 'bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-400 dark:text-gray-500' }}">
                                            @if($step['completed'])
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            @else
                                                {{ $loop->iteration }}
                                            @endif
                                        </div>
                                        {{-- Label --}}
                                        <p class="mt-3 text-xs font-semibold leading-tight
                                            {{ $step['completed'] ? 'text-cyan-700 dark:text-cyan-400' : 'text-gray-400 dark:text-gray-500' }}">
                                            {{ $step['label'] }}
                                        </p>
                                        <p class="text-[11px] text-gray-400 dark:text-gray-600 mt-0.5">{{ $step['date'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Timeline dọc (mobile) --}}
                        <div class="md:hidden">
                            @foreach($order['timeline'] as $step)
                                <div class="relative flex gap-4 pb-8 last:pb-0">
                                    {{-- Đường dọc --}}
                                    @if(!$loop->last)
                                        <div class="absolute left-[19px] top-10 bottom-0 w-0.5
                                            {{ $step['completed'] && $loop->iteration < count($order['timeline']) ? 'bg-cyan-500' : 'bg-gray-200 dark:bg-gray-700' }}"></div>
                                    @endif

                                    {{-- Dot --}}
                                    <div class="relative z-10 w-10 h-10 rounded-full flex items-center justify-center shrink-0 border-2 transition-all
                                        {{ $step['completed'] ? 'bg-cyan-500 border-cyan-500 text-white shadow-md shadow-cyan-500/30' : 'bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-400 dark:text-gray-500' }}">
                                        @if($step['completed'])
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        @else
                                            {{ $loop->iteration }}
                                        @endif
                                    </div>

                                    {{-- Nội dung --}}
                                    <div class="pt-1.5">
                                        <p class="text-sm font-semibold
                                            {{ $step['completed'] ? 'text-cyan-700 dark:text-cyan-400' : 'text-gray-400 dark:text-gray-500' }}">
                                            {{ $step['label'] }}
                                        </p>
                                        <p class="text-xs text-gray-400 dark:text-gray-600 mt-0.5">{{ $step['date'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>

        {{-- ─── KHÔNG TÌM THẤY ─── --}}
        @elseif(isset($notFound) && $notFound)
            <section class="container mx-auto px-4 pb-20 -mt-6 relative z-20">
                <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl p-8 text-center shadow-lg">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Không tìm thấy đơn hàng</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                        Rất tiếc, chúng tôi không tìm thấy kết quả nào cho <strong class="text-gray-700 dark:text-gray-300">"{{ $keyword }}"</strong>.
                    </p>
                    <p class="text-xs text-gray-400 dark:text-gray-500">
                        Vui lòng kiểm tra lại mã đơn hàng hoặc số điện thoại. Nếu cần hỗ trợ, hãy gọi <a href="tel:0909123456" class="text-cyan-600 dark:text-cyan-400 hover:underline font-medium">0909 123 456</a>.
                    </p>
                </div>
            </section>
        @endif

    </main>

    {{-- ===================== FOOTER (simplified) ===================== --}}
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 py-8 transition-colors">
        <div class="container mx-auto px-4 text-center text-xs text-gray-500 dark:text-gray-500">
            <p>&copy; {{ date('Y') }} TypeLab. Đã đăng ký Bản quyền. &nbsp;|&nbsp; <a href="{{ route('home') }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Về trang chủ</a></p>
        </div>
    </footer>

    {{-- ===================== DARK MODE SCRIPT ===================== --}}
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>
</html>