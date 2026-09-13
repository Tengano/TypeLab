@extends('layouts.public')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-950 min-h-screen">
    <div class="container mx-auto px-4">
        
        <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-full bg-rose-100 dark:bg-rose-900/30 text-rose-500 flex items-center justify-center">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Sản phẩm yêu thích</h1>
        </div>

        @if($wishlists->isEmpty())
            <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm p-12 text-center">
                <svg class="mx-auto h-24 w-24 text-gray-300 dark:text-gray-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Danh sách trống</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">Bạn chưa có sản phẩm nào trong danh sách yêu thích.</p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-cyan-600 hover:bg-cyan-700 transition-colors">
                    Khám phá cửa hàng
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($wishlists as $wishlist)
                @php $product = $wishlist->product; @endphp
                @if($product)
                <div class="group bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden hover:border-cyan-400 dark:hover:border-cyan-500/50 transition-all shadow-sm flex flex-col relative" id="wishlist-item-{{ $product->id }}">
                    <!-- Xóa khỏi yêu thích -->
                    <button onclick="removeWishlist({{ $product->id }})" class="absolute top-3 right-3 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm text-rose-500 hover:text-gray-400 transition-colors shadow-sm" title="Xóa">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>

                    <a href="{{ route('products.show', $product->slug) }}" class="aspect-square bg-gray-50 dark:bg-gray-800 relative overflow-hidden flex items-center justify-center p-4 transition-colors block">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400/111827/22d3ee?text=' . urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"/>
                    </a>
                    <div class="p-5 flex flex-col flex-1">
                        <a href="{{ route('products.show', $product->slug) }}">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 transition-colors hover:text-cyan-600 dark:hover:text-cyan-400">{{ $product->name }}</h3>
                        </a>
                        <div class="mt-auto flex items-center justify-between pt-4">
                            <span class="text-lg font-bold text-cyan-600 dark:text-cyan-400 transition-colors">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="w-10 h-10 rounded-lg bg-cyan-50 dark:bg-gray-800 hover:bg-cyan-500 dark:hover:bg-cyan-500 text-cyan-600 dark:text-white hover:text-white flex items-center justify-center transition-colors shadow-sm" title="Thêm vào giỏ hàng">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>
function removeWishlist(productId) {
    fetch(`/wishlists/toggle/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'removed') {
            document.getElementById('wishlist-item-' + productId).remove();
            
            // Check if grid is empty now
            const grid = document.querySelector('.grid');
            if (grid && grid.children.length === 0) {
                location.reload(); // Reload to show empty state
            }
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
