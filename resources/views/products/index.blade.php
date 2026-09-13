@extends('layouts.public')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-950 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-end mb-8">
            <div>
                <h1 class="text-3xl font-bold tracking-tight mb-2 text-gray-900 dark:text-white transition-colors">Cửa Hàng TypeLab</h1>
                <p class="text-gray-600 dark:text-gray-400 transition-colors">Tất cả sản phẩm bàn phím cơ và phụ kiện custom.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
            <div class="group bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden hover:border-cyan-400 dark:hover:border-cyan-500/50 transition-all shadow-sm hover:shadow-md flex flex-col relative">
                @auth
                    <button onclick="toggleWishlist({{ $product->id }}, this)" class="absolute top-3 right-3 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm text-gray-400 hover:text-rose-500 transition-colors {{ auth()->user()->wishlists()->where('product_id', $product->id)->exists() ? 'text-rose-500' : '' }}">
                        <svg class="w-5 h-5" fill="{{ auth()->user()->wishlists()->where('product_id', $product->id)->exists() ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                @endauth

                <a href="{{ route('products.show', $product->slug) }}" class="aspect-square bg-gray-50 dark:bg-gray-800 relative overflow-hidden flex items-center justify-center p-4 transition-colors block">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400/111827/22d3ee?text=' . urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"/>
                </a>
                <div class="p-5 flex flex-col flex-1">
                    <a href="{{ route('products.show', $product->slug) }}">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 transition-colors hover:text-cyan-600 dark:hover:text-cyan-400">{{ $product->name }}</h3>
                    </a>
                    <div class="mb-4">
                        <span class="inline-block px-2.5 py-1 bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-xs font-medium text-gray-600 dark:text-gray-300 rounded-md transition-colors">
                            {{ $product->switch_type ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-lg font-bold text-cyan-600 dark:text-cyan-400 transition-colors">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                        
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-cyan-500 dark:hover:bg-cyan-500 text-gray-600 dark:text-white hover:text-white flex items-center justify-center transition-colors shadow-sm" title="Thêm vào giỏ hàng">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-10 text-gray-500 dark:text-gray-400">
                    Chưa có sản phẩm nào.
                </div>
            @endforelse
        </div>
        
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</div>

<script>
function toggleWishlist(productId, btn) {
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
        if (data.status === 'added') {
            btn.classList.add('text-rose-500');
            btn.querySelector('svg').setAttribute('fill', 'currentColor');
        } else {
            btn.classList.remove('text-rose-500');
            btn.querySelector('svg').setAttribute('fill', 'none');
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
