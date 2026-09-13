<x-guest-layout>
    <x-slot name="title">Đăng ký</x-slot>

    <!-- Tiêu đề -->
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight">Tạo tài khoản</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Tham gia cộng đồng TypeLab ngay hôm nay.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Họ tên -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Họ và tên</label>
            <input
                id="name" type="text" name="name"
                value="{{ old('name') }}"
                required autofocus autocomplete="name"
                placeholder="Nguyễn Văn A"
                class="w-full px-3.5 py-2.5 rounded-xl border text-sm transition-colors
                       bg-white dark:bg-gray-900
                       text-gray-900 dark:text-white
                       placeholder-gray-400 dark:placeholder-gray-600
                       {{ $errors->has('name') ? 'border-red-400 dark:border-red-600 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 dark:border-gray-700 focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400' }}
                       focus:outline-none focus:ring-2"
            >
            @error('name')
                <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Địa chỉ Email</label>
            <input
                id="email" type="email" name="email"
                value="{{ old('email') }}"
                required autocomplete="username"
                placeholder="ban@example.com"
                class="w-full px-3.5 py-2.5 rounded-xl border text-sm transition-colors
                       bg-white dark:bg-gray-900
                       text-gray-900 dark:text-white
                       placeholder-gray-400 dark:placeholder-gray-600
                       {{ $errors->has('email') ? 'border-red-400 dark:border-red-600 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 dark:border-gray-700 focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400' }}
                       focus:outline-none focus:ring-2"
            >
            @error('email')
                <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Mật khẩu -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Mật khẩu</label>
            <input
                id="password" type="password" name="password"
                required autocomplete="new-password"
                placeholder="Tối thiểu 8 ký tự"
                class="w-full px-3.5 py-2.5 rounded-xl border text-sm transition-colors
                       bg-white dark:bg-gray-900
                       text-gray-900 dark:text-white
                       placeholder-gray-400 dark:placeholder-gray-600
                       {{ $errors->has('password') ? 'border-red-400 dark:border-red-600 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 dark:border-gray-700 focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400' }}
                       focus:outline-none focus:ring-2"
            >
            @error('password')
                <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Xác nhận mật khẩu -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Xác nhận mật khẩu</label>
            <input
                id="password_confirmation" type="password" name="password_confirmation"
                required autocomplete="new-password"
                placeholder="Nhập lại mật khẩu"
                class="w-full px-3.5 py-2.5 rounded-xl border text-sm transition-colors
                       bg-white dark:bg-gray-900
                       text-gray-900 dark:text-white
                       placeholder-gray-400 dark:placeholder-gray-600
                       {{ $errors->has('password_confirmation') ? 'border-red-400 dark:border-red-600 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 dark:border-gray-700 focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400' }}
                       focus:outline-none focus:ring-2"
            >
            @error('password_confirmation')
                <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Nút đăng ký -->
        <button type="submit"
            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-cyan-500 hover:bg-cyan-600 text-white font-semibold text-sm rounded-xl transition-all shadow-md shadow-cyan-500/20 hover:shadow-lg hover:shadow-cyan-500/30 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950">
            Tạo tài khoản
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
    </form>

    <!-- Divider -->
    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="bg-white dark:bg-gray-950 px-3 text-gray-400 dark:text-gray-500">Hoặc</span>
        </div>
    </div>

    <!-- Nút đăng ký bằng Google -->
    <a href="{{ route('auth.google') }}"
        class="w-full flex items-center justify-center gap-3 px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-medium text-sm rounded-xl transition-all hover:bg-gray-50 dark:hover:bg-gray-800 hover:border-gray-400 dark:hover:border-gray-600 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950">
        <svg class="w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
        </svg>
        Đăng ký bằng Google
    </a>

    <!-- Link đăng nhập -->
    <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
        Đã có tài khoản?
        <a href="{{ route('login') }}" class="text-cyan-600 dark:text-cyan-400 font-semibold hover:text-cyan-500 dark:hover:text-cyan-300 transition-colors">
            Đăng nhập
        </a>
    </p>
</x-guest-layout>
