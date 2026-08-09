<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TypeLab - Nâng Tầm Trải Nghiệm Gõ Của Bạn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // Set theme mode based on local storage or system preference before page loads
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans antialiased selection:bg-cyan-500 selection:text-white transition-colors duration-300">

    <!-- Header (Navbar) -->
    <header class="sticky top-0 z-50 w-full bg-white/90 dark:bg-gray-900/90 backdrop-blur-lg border-b border-gray-200 dark:border-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4 h-16 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 group">
                <svg class="w-8 h-8 text-cyan-600 dark:text-cyan-400 group-hover:text-cyan-500 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.001"/><path d="M10 8h.001"/><path d="M14 8h.001"/><path d="M18 8h.001"/><path d="M8 12h.001"/><path d="M12 12h.001"/><path d="M16 12h.001"/><path d="M7 16h10"/></svg>
                <span class="text-xl font-bold tracking-tight text-gray-900 dark:text-white transition-colors">Type<span class="text-cyan-600 dark:text-cyan-400">Lab</span></span>
            </a>
            
            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-gray-600 dark:text-gray-300">
                <a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Trang chủ</a>
                <a href="#shop" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Cửa hàng</a>
                <a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Dịch vụ Sửa chữa</a>
                <a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Tra cứu Ticket</a>
            </nav>
            
            <!-- Icons -->
            <div class="flex items-center gap-4">
                <button id="theme-toggle" type="button" class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg text-sm p-2 transition-colors">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>

                <button class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 p-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
                <button class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 p-2 transition-colors relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="absolute top-0 right-0 bg-cyan-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border-2 border-white dark:border-gray-900 transition-colors">3</span>
                </button>
                <button class="text-gray-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 p-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="relative pt-20 pb-28 overflow-hidden transition-colors duration-300">
            <!-- Grid background pattern -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMCwwLDAsMC4wNSkiLz48L3N2Zz4=')] dark:bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] [mask-image:linear-gradient(to_bottom,black,transparent)] z-0"></div>
            
            <div class="container mx-auto px-4 relative z-10 flex flex-col lg:flex-row items-center gap-12">
                <div class="flex-1 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-xs font-medium text-cyan-600 dark:text-cyan-400 mb-6 transition-colors duration-300 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
                        Hệ sinh thái Bàn phím cơ Custom
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight text-gray-900 dark:text-white transition-colors duration-300">
                        Nâng Tầm Trải Nghiệm <br class="hidden lg:block"/>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-600 dark:from-cyan-400 dark:to-blue-500">Gõ Của Bạn</span>
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto lg:mx-0 transition-colors duration-300">
                        TypeLab mang đến cho bạn những chiếc bàn phím cơ được tùy chỉnh tỉ mỉ nhất. Từ linh kiện cao cấp đến dịch vụ lube & mod chuyên nghiệp, mọi thứ đều sẵn sàng cho đôi tay của bạn.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="#shop" class="w-full sm:w-auto px-8 py-3.5 bg-cyan-500 hover:bg-cyan-600 text-white font-semibold rounded-lg transition-all shadow-md shadow-cyan-500/20 dark:shadow-[0_0_20px_rgba(6,182,212,0.4)] flex items-center justify-center gap-2">
                            Mua sắm ngay
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="#services" class="w-full sm:w-auto px-8 py-3.5 bg-white dark:bg-transparent hover:bg-gray-50 dark:hover:bg-gray-800 border border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500 text-gray-800 dark:text-white font-semibold rounded-lg transition-all shadow-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Đặt lịch sửa chữa
                        </a>
                    </div>
                </div>
                <div class="flex-1 relative w-full max-w-lg lg:max-w-none">
                    <div class="absolute -inset-1 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-2xl blur opacity-20 dark:opacity-30"></div>
                    <img src="{{ asset('keyboards/hero-keyboard.png') }}" alt="Custom Mechanical Keyboard" class="relative rounded-2xl border border-gray-200 dark:border-gray-700 shadow-xl bg-white dark:bg-gray-800 w-full object-cover aspect-[4/3] transition-colors duration-300" onerror="this.src='https://placehold.co/800x600/1f2937/a5f3fc?text=TypeLab+Keyboard'"/>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        @php
        $products = [
            ['name' => 'Lab TKL Pro', 'switch' => 'Gateron Oil King (Linear)', 'price' => '3.500.000đ', 'image' => 'keyboards/product-tkl.png'],
            ['name' => 'Nova 65', 'switch' => 'Boba U4T (Tactile)', 'price' => '2.800.000đ', 'image' => 'keyboards/product-65.png'],
            ['name' => 'Mainframe 100', 'switch' => 'Cherry MX2A Red (Linear)', 'price' => '4.200.000đ', 'image' => 'keyboards/product-full.png'],
            ['name' => 'Micro 60', 'switch' => 'Holy Panda X (Tactile)', 'price' => '2.500.000đ', 'image' => 'keyboards/product-60.png']
        ];
        @endphp
        <section id="shop" class="py-20 bg-gray-100/50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 transition-colors duration-300">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight mb-2 text-gray-900 dark:text-white transition-colors">Sản Phẩm Nổi Bật</h2>
                        <p class="text-gray-600 dark:text-gray-400 transition-colors">Những mẫu bàn phím cơ custom được ưa chuộng nhất tại TypeLab.</p>
                    </div>
                    <a href="#" class="text-cyan-600 dark:text-cyan-400 hover:text-cyan-500 dark:hover:text-cyan-300 font-medium flex items-center gap-1 mt-4 md:mt-0 transition-colors">
                        Xem tất cả <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden hover:border-cyan-400 dark:hover:border-cyan-500/50 transition-all shadow-sm hover:shadow-md dark:hover:shadow-[0_0_15px_rgba(6,182,212,0.15)] flex flex-col">
                        <div class="aspect-square bg-gray-50 dark:bg-gray-900 relative overflow-hidden flex items-center justify-center p-4 transition-colors">
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500" onerror="this.src='https://placehold.co/400x400/111827/22d3ee?text={{ urlencode($product['name']) }}'"/>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 transition-colors">{{ $product['name'] }}</h3>
                            <div class="mb-4">
                                <span class="inline-block px-2.5 py-1 bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-xs font-medium text-gray-600 dark:text-gray-300 rounded-md transition-colors">
                                    {{ $product['switch'] }}
                                </span>
                            </div>
                            <div class="mt-auto flex items-center justify-between">
                                <span class="text-lg font-bold text-cyan-600 dark:text-cyan-400 transition-colors">{{ $product['price'] }}</span>
                                <button class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-cyan-500 dark:hover:bg-cyan-500 text-gray-600 dark:text-white hover:text-white flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Repair Services -->
        <section id="services" class="py-24 bg-white dark:bg-gray-800/50 border-t border-gray-200 dark:border-gray-800 relative transition-colors duration-300">
            <div class="container mx-auto px-4">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl font-bold tracking-tight mb-4 text-gray-900 dark:text-white transition-colors">Dịch Vụ Bảo Dưỡng & Sửa Chữa</h2>
                    <p class="text-gray-600 dark:text-gray-400 transition-colors">Từ vệ sinh cơ bản, lube switch cho đến mod foam, thay mạch... TypeLab sẽ hồi sinh chiếc bàn phím của bạn chỉ với 3 bước đơn giản.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <!-- Line connecting steps (desktop) -->
                    <div class="hidden md:block absolute top-12 left-[16%] right-[16%] h-0.5 bg-gray-200 dark:bg-gray-700 transition-colors"></div>
                    
                    <!-- Step 1 -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-full bg-white dark:bg-gray-900 border-2 border-gray-200 dark:border-gray-700 flex items-center justify-center relative z-10 mb-6 group hover:border-cyan-500 dark:hover:border-cyan-400 transition-colors shadow-sm dark:shadow-none">
                            <svg class="w-10 h-10 text-cyan-500 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-cyan-500 text-white font-bold flex items-center justify-center text-sm border-4 border-white dark:border-gray-900 transition-colors">1</div>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white transition-colors">Gửi bàn phím</h3>
                        <p class="text-gray-600 dark:text-gray-400 transition-colors">Tạo ticket và gửi bàn phím của bạn đến địa chỉ Lab hoặc mang đến trực tiếp.</p>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-full bg-white dark:bg-gray-900 border-2 border-gray-200 dark:border-gray-700 flex items-center justify-center relative z-10 mb-6 group hover:border-cyan-500 dark:hover:border-cyan-400 transition-colors shadow-sm dark:shadow-none">
                            <svg class="w-10 h-10 text-cyan-500 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-cyan-500 text-white font-bold flex items-center justify-center text-sm border-4 border-white dark:border-gray-900 transition-colors">2</div>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white transition-colors">Kiểm tra & Báo giá</h3>
                        <p class="text-gray-600 dark:text-gray-400 transition-colors">Kỹ thuật viên sẽ kiểm tra chi tiết, tư vấn giải pháp và báo giá minh bạch.</p>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-full bg-white dark:bg-gray-900 border-2 border-gray-200 dark:border-gray-700 flex items-center justify-center relative z-10 mb-6 group hover:border-cyan-500 dark:hover:border-cyan-400 transition-colors shadow-sm dark:shadow-none">
                            <svg class="w-10 h-10 text-cyan-500 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                            <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-cyan-500 text-white font-bold flex items-center justify-center text-sm border-4 border-white dark:border-gray-900 transition-colors">3</div>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white transition-colors">Nhận lại hoàn hảo</h3>
                        <p class="text-gray-600 dark:text-gray-400 transition-colors">Bàn phím được sửa chữa, căn chỉnh tỉ mỉ và gửi trả lại bạn trong trạng thái tốt nhất.</p>
                    </div>
                </div>
                
                <div class="mt-16 text-center">
                    <a href="#" class="inline-flex items-center gap-2 px-8 py-3.5 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-semibold rounded-lg transition-colors border border-gray-200 dark:border-gray-600">
                        <svg class="w-5 h-5 text-cyan-500 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Tra cứu tiến độ Ticket
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 pt-16 pb-8 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div>
                    <a href="/" class="flex items-center gap-2 mb-6">
                        <svg class="w-8 h-8 text-cyan-600 dark:text-cyan-400 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="M6 8h.001"/><path d="M10 8h.001"/><path d="M14 8h.001"/><path d="M18 8h.001"/><path d="M8 12h.001"/><path d="M12 12h.001"/><path d="M16 12h.001"/><path d="M7 16h10"/></svg>
                        <span class="text-xl font-bold tracking-tight text-gray-900 dark:text-white transition-colors">Type<span class="text-cyan-600 dark:text-cyan-400">Lab</span></span>
                    </a>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-6 transition-colors">
                        TypeLab là phòng thí nghiệm bàn phím cơ của những người đam mê. Chúng tôi tự hào mang đến các sản phẩm custom chất lượng và dịch vụ kỹ thuật tận tâm.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                
                <!-- Links -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold uppercase tracking-wider text-sm mb-6 transition-colors">Liên Kết Hữu Ích</h4>
                    <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Về chúng tôi</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Cửa hàng bàn phím</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Dịch vụ mod & lube</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Tra cứu ticket sửa chữa</a></li>
                    </ul>
                </div>
                
                <!-- Policies -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold uppercase tracking-wider text-sm mb-6 transition-colors">Chính Sách</h4>
                    <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Chính sách bảo hành</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Chính sách đổi trả</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Điều khoản dịch vụ</a></li>
                        <li><a href="#" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">Bảo mật thông tin</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold uppercase tracking-wider text-sm mb-6 transition-colors">Liên Hệ</h4>
                    <ul class="space-y-4 text-sm text-gray-600 dark:text-gray-400">
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 shrink-0 text-cyan-600 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>123 Đường Bàn Phím, Phường Tech, Quận Geek, TP.HCM</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0 text-cyan-600 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>0909 123 456</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0 text-cyan-600 dark:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>hello@typelab.vn</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-gray-500 transition-colors">
                <p>&copy; {{ date('Y') }} TypeLab. Đã đăng ký Bản quyền.</p>
                <p class="font-mono">Handcrafted for Keyboard Enthusiasts.</p>
            </div>
        </div>
    </footer>

    <!-- Theme Toggle Script -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>
</html>
