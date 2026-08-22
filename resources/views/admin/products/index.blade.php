<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 dark:text-gray-600 mb-0.5">Quản lý</p>
            <h1 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">Sản phẩm</h1>
        </div>
    </x-slot>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 px-5 py-4 rounded-xl flex items-center gap-3 shadow-sm transition-colors" role="alert">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Thanh hành động -->        
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500 dark:text-gray-400">Quản lý toàn bộ sản phẩm trong cửa hàng.</p>
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-600 text-white text-sm font-semibold py-2.5 px-5 rounded-lg transition-all shadow-md hover:shadow-lg hover:shadow-cyan-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Thêm Sản Phẩm
            </a>
        </div>

        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 overflow-hidden shadow-sm rounded-2xl transition-colors duration-300">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 dark:bg-gray-900/50 text-gray-500 dark:text-gray-400 text-xs uppercase tracking-wider">
                                <th class="border-b border-gray-100 dark:border-gray-700 p-4 font-semibold rounded-tl-lg">Sản phẩm</th>
                                <th class="border-b border-gray-100 dark:border-gray-700 p-4 font-semibold">Switch</th>
                                <th class="border-b border-gray-100 dark:border-gray-700 p-4 font-semibold">Giá bán</th>
                                <th class="border-b border-gray-100 dark:border-gray-700 p-4 font-semibold">Trạng thái</th>
                                <th class="border-b border-gray-100 dark:border-gray-700 p-4 font-semibold rounded-tr-lg">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700/50">
                            @forelse($products as $product)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors group">
                                    <td class="p-4">
                                        <div class="flex items-center gap-4">
                                            @if($product->image)
                                                <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 shrink-0">
                                                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                                </div>
                                            @else
                                                <div class="w-16 h-16 rounded-xl bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 flex items-center justify-center text-xs text-gray-400 shrink-0">No IMG</div>
                                            @endif
                                            <div>
                                                <h3 class="font-bold text-gray-900 dark:text-white">{{ $product->name }}</h3>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">{{ $product->category ?? 'Bàn phím cơ' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-gray-600 dark:text-gray-300">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-xs font-medium">
                                            {{ $product->switch_type ?? 'Không có' }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-bold text-cyan-600 dark:text-cyan-400">
                                            {{ number_format($product->price ?? 0, 0, ',', '.') }}đ
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $product->is_active ? 'bg-green-100/50 dark:bg-green-900/30 text-green-700 dark:text-green-400 border border-green-200 dark:border-green-800/50' : 'bg-red-100/50 dark:bg-red-900/30 text-red-700 dark:text-red-400 border border-red-200 dark:border-red-800/50' }}">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $product->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                            {{ $product->is_active ? 'Hiển thị' : 'Đã ẩn' }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="p-2 text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 hover:bg-cyan-50 dark:hover:bg-gray-800 rounded-lg transition-colors" title="Sửa">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-gray-800 rounded-lg transition-colors" title="Xóa">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400 dark:text-gray-500">
                                            <svg class="w-12 h-12 mb-3 text-gray-200 dark:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                            <p class="text-lg font-medium">Chưa có sản phẩm nào</p>
                                            <p class="text-sm mt-1">Hãy thêm sản phẩm đầu tiên để bắt đầu bán hàng.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if(method_exists($products, 'hasPages') && $products->hasPages())
                <div class="p-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50">
                    {{ $products->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

