@extends('layouts.public')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-950 min-h-screen">
    <div class="container mx-auto px-4">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500 dark:text-gray-400">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Trang chủ</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('products.index') }}" class="ml-1 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Sản phẩm</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-gray-900 dark:text-white font-medium">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden flex flex-col md:flex-row mb-12">
            <!-- Product Image -->
            <div class="md:w-1/2 p-8 bg-gray-50 dark:bg-gray-800/50 flex items-center justify-center relative">
                @auth
                    <button onclick="toggleWishlist({{ $product->id }}, this)" class="absolute top-6 right-6 w-10 h-10 flex items-center justify-center rounded-full bg-white dark:bg-gray-800 shadow-sm text-gray-400 hover:text-rose-500 transition-colors {{ auth()->user()->wishlists()->where('product_id', $product->id)->exists() ? 'text-rose-500' : '' }}">
                        <svg class="w-6 h-6" fill="{{ auth()->user()->wishlists()->where('product_id', $product->id)->exists() ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                @endauth
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/800x800/111827/22d3ee?text=' . urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full max-w-md object-contain rounded-xl hover:scale-105 transition-transform duration-500"/>
            </div>
            
            <!-- Product Info -->
            <div class="md:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                <div class="mb-2 text-sm font-bold text-cyan-600 dark:text-cyan-400 tracking-wider uppercase">{{ $product->category ?? 'Bàn phím cơ' }}</div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-4 leading-tight">{{ $product->name }}</h1>
                
                <div class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ number_format($product->price, 0, ',', '.') }}<span class="text-lg text-gray-500">đ</span>
                </div>
                
                <div class="prose dark:prose-invert text-gray-600 dark:text-gray-400 mb-8 max-w-none">
                    <p>{{ $product->description ?: 'Một chiếc bàn phím custom chất lượng cao từ TypeLab. Tùy biến mọi thứ để có cảm giác gõ tốt nhất.' }}</p>
                </div>
                
                <ul class="space-y-3 mb-8 text-sm text-gray-600 dark:text-gray-400">
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <strong>Switch:</strong> {{ $product->switch_type ?? 'N/A' }}
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <strong>Tình trạng:</strong> Sẵn hàng
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <strong>Giao hàng:</strong> Miễn phí toàn quốc
                    </li>
                </ul>
                
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex items-end gap-4 mt-auto">
                    @csrf
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Số lượng</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="10" class="w-20 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block p-2.5 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500 text-center font-bold">
                    </div>
                    
                    <button type="submit" class="flex-1 bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-cyan-500/30 transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Thêm vào giỏ hàng
                    </button>
                </form>
            </div>
        </div>

        @if($relatedProducts->count() > 0)
        <!-- Sản phẩm liên quan -->
        <div class="mt-16">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Sản Phẩm Tương Tự</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="group bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden hover:border-cyan-400 dark:hover:border-cyan-500/50 transition-all shadow-sm flex flex-col relative">
                    <a href="{{ route('products.show', $related->slug) }}" class="aspect-square bg-gray-50 dark:bg-gray-800 relative overflow-hidden flex items-center justify-center p-4 transition-colors block">
                        <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://placehold.co/400x400/111827/22d3ee?text=' . urlencode($related->name) }}" alt="{{ $related->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"/>
                    </a>
                    <div class="p-5 flex flex-col flex-1">
                        <a href="{{ route('products.show', $related->slug) }}">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 transition-colors hover:text-cyan-600 dark:hover:text-cyan-400">{{ $related->name }}</h3>
                        </a>
                        <div class="mt-auto flex items-center justify-between pt-4">
                            <span class="text-lg font-bold text-cyan-600 dark:text-cyan-400 transition-colors">{{ number_format($related->price, 0, ',', '.') }}đ</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
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
