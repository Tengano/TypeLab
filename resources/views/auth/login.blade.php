<x-guest-layout>
    <x-slot name="title">Đăng nhập</x-slot>

    <!-- Tiêu đề -->
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight">Chào mừng trở lại!</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Đăng nhập để quản lý cửa hàng TypeLab của bạn.</p>
    </div>

    <!-- Thông báo session -->
    @if (session('status'))
        <div class="mb-5 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 px-4 py-3 rounded-xl text-sm font-medium flex items-center gap-2">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Địa chỉ Email</label>
            <input
                id="email" type="email" name="email"
                value="{{ old('email') }}"
                required autofocus autocomplete="username"
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
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mật khẩu</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs text-cyan-600 dark:text-cyan-400 hover:text-cyan-500 dark:hover:text-cyan-300 font-medium transition-colors">
                        Quên mật khẩu?
                    </a>
                @endif
            </div>
            <input
                id="password" type="password" name="password"
                required autocomplete="current-password"
                placeholder="••••••••"
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

        <!-- Ghi nhớ đăng nhập -->
        <div class="flex items-center gap-2.5">
            <input id="remember_me" type="checkbox" name="remember"
                class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 text-cyan-500 dark:bg-gray-900 focus:ring-cyan-500 dark:focus:ring-cyan-400 dark:focus:ring-offset-gray-900 cursor-pointer">
            <label for="remember_me" class="text-sm text-gray-600 dark:text-gray-400 cursor-pointer select-none">Ghi nhớ đăng nhập</label>
        </div>

        <!-- Nút đăng nhập -->
        <button type="submit"
            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-cyan-500 hover:bg-cyan-600 text-white font-semibold text-sm rounded-xl transition-all shadow-md shadow-cyan-500/20 hover:shadow-lg hover:shadow-cyan-500/30 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950">
            Đăng nhập
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
    </form>

    <!-- Link đăng ký -->
    <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
        Chưa có tài khoản?
        <a href="{{ route('register') }}" class="text-cyan-600 dark:text-cyan-400 font-semibold hover:text-cyan-500 dark:hover:text-cyan-300 transition-colors">
            Đăng ký ngay
        </a>
    </p>
</x-guest-layout>
