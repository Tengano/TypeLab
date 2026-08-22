<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight">Hồ sơ cá nhân</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Quản lý thông tin tài khoản và bảo mật của bạn.</p>
        </div>
    </x-slot>

    <div class="space-y-6">
        <!-- Hàng 1: Thông tin cá nhân & Mật khẩu -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
            <!-- Card Thông tin cá nhân -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl p-6 sm:p-8 shadow-sm transition-colors duration-300">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Card Mật khẩu -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl p-6 sm:p-8 shadow-sm transition-colors duration-300">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Hàng 2: Xóa tài khoản -->
        <div class="bg-white dark:bg-gray-900 border border-red-200 dark:border-red-900/50 rounded-2xl p-6 sm:p-8 shadow-sm transition-colors duration-300">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>

