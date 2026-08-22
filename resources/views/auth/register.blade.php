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

    <!-- Link đăng nhập -->
    <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
        Đã có tài khoản?
        <a href="{{ route('login') }}" class="text-cyan-600 dark:text-cyan-400 font-semibold hover:text-cyan-500 dark:hover:text-cyan-300 transition-colors">
            Đăng nhập
        </a>
    </p>
</x-guest-layout>
