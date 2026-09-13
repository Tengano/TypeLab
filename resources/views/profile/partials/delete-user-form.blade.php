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
        onclick="document.getElementById('delete-modal-overlay').classList.remove('hidden'); document.getElementById('delete-modal').classList.remove('hidden'); document.getElementById('delete-modal').style.display=''; document.getElementById('delete-modal-password').focus();"
    >Xóa tài khoản</x-danger-button>

    <!-- Modal overlay -->
    <div id="delete-modal-overlay" class="hidden fixed inset-0 z-40 bg-gray-500/75 dark:bg-gray-900/75 transition-opacity"></div>

    <!-- Modal -->
    <div id="delete-modal" class="hidden fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0" style="display: none;">
        <div class="flex min-h-full items-center justify-center">
            <!-- Click outside to close -->
            <div onclick="closeDeleteModal()" class="fixed inset-0"></div>

            <div class="relative bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl mx-auto p-6">
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
                            id="delete-modal-password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Nhập mật khẩu của bạn"
                        />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button type="button" onclick="closeDeleteModal()">
                            Hủy bỏ
                        </x-secondary-button>

                        <x-danger-button class="ms-3">
                            Xóa vĩnh viễn
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($errors->userDeletion->isNotEmpty())
        <script>
            document.getElementById('delete-modal-overlay').classList.remove('hidden');
            document.getElementById('delete-modal').classList.remove('hidden');
            document.getElementById('delete-modal').style.display = '';
        </script>
    @endif

    <script>
        function closeDeleteModal() {
            document.getElementById('delete-modal-overlay').classList.add('hidden');
            document.getElementById('delete-modal').classList.add('hidden');
            document.getElementById('delete-modal').style.display = 'none';
        }

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
</section>
