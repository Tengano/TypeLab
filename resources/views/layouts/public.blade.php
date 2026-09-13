<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TypeLab - Nâng Tầm Trải Nghiệm Gõ Của Bạn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // Cài đặt chế độ giao diện (sáng/tối) dựa trên local storage hoặc tùy chọn hệ thống trước khi tải trang
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans antialiased selection:bg-cyan-500 selection:text-white transition-colors duration-300">

    <!-- Phần Header (Thanh điều hướng) -->
    <header class="sticky top-0 z-50 w-full bg-white/90 dark:bg-gray-900/90 backdrop-blur-lg border-b border-gray-200 dark:border-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4 h-16 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 group">
                <svg class="w-8 h-8 text-cyan-600 dark:text-cyan-400 group-hover:text-cyan-500 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.001"/><path d="M10 8h.001"/><path d="M14 8h.001"/><path d="M18 8h.001"/><path d="M8 12h.001"/><path d="M12 12h.001"/><path d="M16 12h.001"/><path d="M7 16h10"/></svg>
                <span class="text-xl font-bold tracking-tight text-gray-900 dark:text-white transition-colors">Type<span class="text-cyan-600 dark:text-cyan-400">Lab</span></span>
            </a>
            
            <!-- Menu điều hướng -->
            <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-gray-600 dark:text-gray-300">
                <a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Trang chủ</a>
                <a href="#shop" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Cửa hàng</a>
                <a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Dịch vụ Sửa chữa</a>
                <a href="{{ route('tracking.index') }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Tra cứu Ticket</a>
            </nav>
            
            <!-- Các Icon -->
            <div class="flex items-center gap-4">
                <button id="theme-toggle" type="button" class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg text-sm p-2 transition-colors">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>

                <button class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 p-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
                <button class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 p-2 transition-colors relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="absolute top-0 right-0 bg-cyan-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border-2 border-white dark:border-gray-900 transition-colors">3</span>
                </button>
                @auth
                    <!-- Đã đăng nhập: Link tới Dashboard/Profile -->
                    <a href="{{ auth()->user()->isAdmin() ? route('dashboard') : route('profile.edit') }}" class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 p-2 transition-colors">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=00bcd4&background=e0f2fe" alt="Avatar" class="w-6 h-6 rounded-full border border-cyan-200 dark:border-cyan-800">
                        <span class="hidden md:block">{{ auth()->user()->name }}</span>
                    </a>
                @else
                    <!-- Chưa đăng nhập: Nút Login & Register -->
                    <div class="flex items-center gap-3 pr-2">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white rounded-lg transition-colors shadow-sm shadow-cyan-500/20">Đăng ký</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Phần Footer (Chân trang) -->
    <footer class="bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 pt-16 pb-8 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Thương hiệu -->
                <div>
                    <a href="/" class="flex items-center gap-2 mb-6">
                        <svg class="w-8 h-8 text-cyan-600 dark:text-cyan-400 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.001"/><path d="M10 8h.001"/><path d="M14 8h.001"/><path d="M18 8h.001"/><path d="M8 12h.001"/><path d="M12 12h.001"/><path d="M16 12h.001"/><path d="M7 16h10"/></svg>
                        <span class="text-xl font-bold tracking-tight text-gray-900 dark:text-white transition-colors">Type<span class="text-cyan-600 dark:text-cyan-400">Lab</span></span>
                    </a>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-6 transition-colors">
                        TypeLab là phòng thí nghiệm bàn phím cơ của những người đam mê. Chúng tôi tự hào mang đến các sản phẩm custom chất lượng và dịch vụ kỹ thuật tận tâm.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Liên kết -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold uppercase tracking-wider text-sm mb-6 transition-colors">Liên Kết Hữu Ích</h4>
                    <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Về chúng tôi</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Cửa hàng bàn phím</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Dịch vụ mod & lube</a></li>
                        <li><a href="{{ route('tracking.index') }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Tra cứu ticket sửa chữa</a></li>
                    </ul>
                </div>
                
                <!-- Chính sách -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold uppercase tracking-wider text-sm mb-6 transition-colors">Chính Sách</h4>
                    <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Chính sách bảo hành</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Chính sách đổi trả</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Điều khoản dịch vụ</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Bảo mật thông tin</a></li>
                    </ul>
                </div>
                
                <!-- Liên hệ -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold uppercase tracking-wider text-sm mb-6 transition-colors">Liên Hệ</h4>
                    <ul class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 shrink-0 text-cyan-600 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>123 Đường Bàn Phím, Phường Tech, Quận Geek, TP.HCM</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0 text-cyan-600 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>0909 123 456</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0 text-cyan-600 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>hello@typelab.vn</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-gray-500 transition-colors">
                <p>&copy; {{ date('Y') }} TypeLab. Đã đăng ký Bản quyền.</p>
                <p class="font-mono">Handcrafted for Keyboard Enthusiasts.</p>
            </div>
        </div>
    </footer>

    <!-- Script Đổi Giao Diện -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Thay đổi icon bên trong nút dựa trên cài đặt trước đó
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            // Chuyển đổi icon bên trong nút
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Nếu đã lưu trong local storage trước đó
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            // Nếu CHƯA lưu trong local storage trước đó
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

