<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.products.index') }}" class="p-2 -ml-2 text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight tracking-tight">
                {{ isset($product) ? 'Cập nhật: ' . $product->name : 'Thêm Sản Phẩm Mới' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif

                <div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-sm sm:rounded-2xl overflow-hidden transition-colors duration-300">
                    <div class="p-6 sm:p-8 space-y-8 text-gray-900 dark:text-gray-100">
                        
                        <!-- Basic Info -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2 mb-4">Thông tin cơ bản</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tên sản phẩm <span class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required
                                        class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white rounded-lg focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400 block p-2.5 transition-colors placeholder-gray-400 dark:placeholder-gray-500" placeholder="Nhập tên sản phẩm...">
                                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Danh mục</label>
                                    <select id="category" name="category" class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white rounded-lg focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400 block p-2.5 transition-colors">
                                        @php $currentCategory = old('category', $product->category ?? ''); @endphp
                                        <option value="Bàn phím cơ" {{ $currentCategory == 'Bàn phím cơ' ? 'selected' : '' }}>Bàn phím cơ</option>
                                        <option value="Switch" {{ $currentCategory == 'Switch' ? 'selected' : '' }}>Switch</option>
                                        <option value="Keycap" {{ $currentCategory == 'Keycap' ? 'selected' : '' }}>Keycap</option>
                                        <option value="Phụ kiện" {{ $currentCategory == 'Phụ kiện' ? 'selected' : '' }}>Phụ kiện</option>
                                    </select>
                                    @error('category') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="switch_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Loại Switch</label>
                                    <input type="text" id="switch_type" name="switch_type" value="{{ old('switch_type', $product->switch_type ?? '') }}" placeholder="VD: Cherry MX Red..."
                                        class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white rounded-lg focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400 block p-2.5 transition-colors placeholder-gray-400 dark:placeholder-gray-500">
                                    @error('switch_type') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-2 md:col-span-1">
                                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Giá bán <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="number" id="price" name="price" value="{{ old('price', isset($product) ? intval($product->price) : '') }}" required min="0" step="1000"
                                            class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white rounded-lg focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400 block p-2.5 pr-12 transition-colors placeholder-gray-400 dark:placeholder-gray-500" placeholder="Ví dụ: 3500000">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500 dark:text-gray-400">
                                            VNĐ
                                        </div>
                                    </div>
                                    @error('price') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Description & Image -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-2 mb-4">Chi tiết & Hình ảnh</h3>
                            <div class="space-y-6">
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mô tả sản phẩm</label>
                                    <textarea id="description" name="description" rows="4" placeholder="Nhập mô tả chi tiết..."
                                        class="w-full bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white rounded-lg focus:ring-cyan-500 focus:border-cyan-500 dark:focus:ring-cyan-400 dark:focus:border-cyan-400 block p-2.5 transition-colors placeholder-gray-400 dark:placeholder-gray-500">{{ old('description', $product->description ?? '') }}</textarea>
                                    @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ảnh sản phẩm</label>
                                    
                                    <div class="flex flex-col sm:flex-row items-start gap-6">
                                        @if(isset($product) && $product->image)
                                            <div class="shrink-0">
                                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-2 text-center">Ảnh hiện tại</p>
                                                <div class="w-32 h-32 rounded-xl overflow-hidden bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 shadow-sm">
                                                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                                                </div>
                                            </div>
                                        @endif
                                        
                                        <div class="flex-1 w-full">
                                            <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 dark:bg-gray-900/50 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                                    <svg class="w-8 h-8 mb-3 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold text-cyan-600 dark:text-cyan-400">Bấm để tải ảnh lên</span> hoặc kéo thả</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP (Tối đa 2MB)</p>
                                                </div>
                                                <input id="image" name="image" type="file" accept="image/*" class="hidden" />
                                            </label>
                                            @error('image') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-3 pt-2">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-cyan-300 dark:peer-focus:ring-cyan-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-500"></div>
                                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Hiển thị sản phẩm trên trang chủ</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="px-6 sm:px-8 py-5 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end gap-4">
                        <a href="{{ route('admin.products.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                            Hủy bỏ
                        </a>
                        <button type="submit" class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-600 dark:bg-cyan-600 dark:hover:bg-cyan-500 text-white font-semibold py-2.5 px-6 rounded-lg transition-all shadow-md hover:shadow-lg hover:shadow-cyan-500/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            {{ isset($product) ? 'Lưu thay đổi' : 'Tạo sản phẩm' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
