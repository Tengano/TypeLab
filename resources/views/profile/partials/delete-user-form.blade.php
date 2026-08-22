<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-red-600 dark:text-red-500">
            Xóa tài khoản
        </h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Một khi tài khoản của bạn bị xóa, tất cả tài nguyên và dữ liệu sẽ bị xóa vĩnh viễn. Trước khi xóa tài khoản, vui lòng tải xuống bất kỳ dữ liệu hoặc thông tin nào bạn muốn giữ lại.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Xóa tài khoản</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                Bạn có chắc chắn muốn xóa tài khoản không?
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Khi tài khoản bị xóa, mọi dữ liệu liên quan sẽ bị xóa vĩnh viễn. Vui lòng nhập mật khẩu của bạn để xác nhận hành động này.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="Mật khẩu" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Nhập mật khẩu của bạn"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Hủy bỏ
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Xóa vĩnh viễn
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
