<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title . ' — TypeLab' : config('app.name', 'TypeLab') }}</title>

        <!-- Dark mode trước khi tải trang -->
        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 selection:bg-cyan-500 selection:text-white transition-colors duration-300">

        <div class="min-h-screen flex">

            <!-- ===================== CỘT TRÁI — Branding ===================== -->
            <div class="hidden lg:flex lg:w-1/2 xl:w-[55%] relative overflow-hidden flex-col
                        bg-slate-100 dark:bg-gray-900
                        transition-colors duration-300">

                <!-- Nền gradient -->
                <div class="absolute inset-0
                            bg-gradient-to-br from-cyan-50 via-slate-100 to-blue-100
                            dark:bg-gradient-to-br dark:from-gray-950 dark:via-gray-900 dark:to-cyan-950
                            transition-colors duration-300"></div>

                <!-- Grid pattern -->
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMCwwLDAsMC4wNSkiLz48L3N2Zz4=')] dark:bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-60"></div>

                <!-- Các hình trang trí -->
                <div class="absolute top-1/4 -left-20 w-80 h-80 rounded-full bg-cyan-400/20 dark:bg-cyan-500/10 blur-3xl transition-colors duration-300"></div>
                <div class="absolute bottom-1/4 right-0 w-96 h-96 rounded-full bg-blue-400/20 dark:bg-blue-500/10 blur-3xl transition-colors duration-300"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-cyan-300/10 dark:bg-cyan-600/5 blur-3xl transition-colors duration-300"></div>

                <!-- Nội dung branding -->
                <div class="relative z-10 flex flex-col h-full p-10 xl:p-14">

                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5 group w-fit">
                        <svg class="w-9 h-9 text-cyan-600 dark:text-cyan-400 group-hover:text-cyan-500 dark:group-hover:text-cyan-300 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.001"/><path d="M10 8h.001"/><path d="M14 8h.001"/><path d="M18 8h.001"/><path d="M8 12h.001"/><path d="M12 12h.001"/><path d="M16 12h.001"/><path d="M7 16h10"/></svg>
                        <span class="text-xl font-extrabold tracking-tight text-gray-900 dark:text-white transition-colors">Type<span class="text-cyan-600 dark:text-cyan-400">Lab</span></span>
                    </a>

                    <!-- Phần giữa: tagline (canh giữa) -->
                    <div class="flex-1 flex flex-col items-center justify-center text-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full
                                    bg-cyan-100 border border-cyan-200 text-cyan-700
                                    dark:bg-white/5 dark:border-white/10 dark:text-cyan-400
                                    text-xs font-medium mb-8 transition-colors duration-300">
                            <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 dark:bg-cyan-400 animate-pulse"></span>
                            Hệ sinh thái Bàn phím cơ Custom
                        </div>

                        <h1 class="text-4xl xl:text-5xl font-extrabold tracking-tight leading-tight mb-6
                                   text-gray-900 dark:text-white transition-colors duration-300">
                            Nâng Tầm<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600 dark:from-cyan-400 dark:to-blue-500">Trải Nghiệm Gõ</span><br>
                            Của Bạn.
                        </h1>

                        <p class="text-base leading-relaxed max-w-sm
                                  text-slate-600 dark:text-gray-400 transition-colors duration-300">
                            TypeLab mang đến những chiếc bàn phím cơ được tùy chỉnh tỉ mỉ nhất cùng dịch vụ bảo dưỡng chuyên nghiệp.
                        </p>

                        <!-- Thống kê nhanh -->
                        <div class="flex justify-center gap-8 mt-10">
                            <div>
                                <p class="text-2xl font-extrabold text-gray-900 dark:text-white transition-colors">500+</p>
                                <p class="text-xs text-slate-500 dark:text-gray-500 mt-0.5 transition-colors">Sản phẩm custom</p>
                            </div>
                            <div class="w-px bg-slate-300 dark:bg-white/10 transition-colors"></div>
                            <div>
                                <p class="text-2xl font-extrabold text-gray-900 dark:text-white transition-colors">1.200+</p>
                                <p class="text-xs text-slate-500 dark:text-gray-500 mt-0.5 transition-colors">Khách hàng tin dùng</p>
                            </div>
                            <div class="w-px bg-slate-300 dark:bg-white/10 transition-colors"></div>
                            <div>
                                <p class="text-2xl font-extrabold text-gray-900 dark:text-white transition-colors">4.9 ★</p>
                                <p class="text-xs text-slate-500 dark:text-gray-500 mt-0.5 transition-colors">Đánh giá trung bình</p>
                            </div>
                        </div>
                    </div>


                    <!-- Footer branding -->
                    <p class="text-xs text-slate-400 dark:text-gray-600 transition-colors">© {{ date('Y') }} TypeLab. Đã đăng ký bản quyền.</p>

                </div>
            </div>

            <!-- ===================== CỘT PHẢI — Form ===================== -->
            <div class="w-full lg:w-1/2 xl:w-[45%] flex flex-col">

                <!-- Top bar (mobile logo + dark toggle) -->
                <div class="flex items-center justify-between p-5 lg:p-6 border-b border-gray-200 dark:border-gray-800 lg:border-0">
                    <!-- Logo (chỉ hiện trên mobile) -->
                    <a href="{{ route('home') }}" class="flex items-center gap-2 lg:invisible">
                        <svg class="w-7 h-7 text-cyan-600 dark:text-cyan-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.001"/><path d="M10 8h.001"/><path d="M14 8h.001"/><path d="M18 8h.001"/><path d="M8 12h.001"/><path d="M12 12h.001"/><path d="M16 12h.001"/><path d="M7 16h10"/></svg>
                        <span class="text-lg font-extrabold text-gray-900 dark:text-white">Type<span class="text-cyan-600 dark:text-cyan-400">Lab</span></span>
                    </a>

                    <!-- Dark Mode + Về trang chủ -->
                    <div class="flex items-center gap-2">
                        <a href="{{ route('home') }}" class="hidden lg:flex items-center gap-1.5 text-xs font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors px-3 py-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Về trang chủ
                        </a>
                        <button id="theme-toggle" type="button" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <svg id="theme-toggle-dark-icon" class="hidden w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- Form content -->
                <div class="flex-1 flex items-center justify-center p-6 sm:p-10">
                    <div class="w-full max-w-md">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Script Dark Mode -->
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
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            });
        </script>
    </body>
</html>
