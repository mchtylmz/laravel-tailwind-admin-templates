<x-layouts-admin>
    <x-slot:title>Products</x-slot:title>

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Products</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Browse our collection</p>
        </div>
        <x-button size="sm" variant="primary">Add Product</x-button>
    </div>

    @php
        $products = [
            ['name' => 'Wireless Headphones Pro', 'cat' => 'Electronics', 'price' => 249.00, 'rating' => 5, 'reviews' => 128, 'color' => '#6366f1', 'icon' => 'speaker-wave', 'badge' => 'Best Seller', 'bc' => 'indigo'],
            ['name' => 'Smart Watch Ultra', 'cat' => 'Electronics', 'price' => 399.00, 'rating' => 4, 'reviews' => 89, 'color' => '#10b981', 'icon' => 'clock', 'badge' => 'New', 'bc' => 'emerald'],
            ['name' => 'Leather Backpack', 'cat' => 'Fashion', 'price' => 89.00, 'rating' => 4, 'reviews' => 56, 'color' => '#f59e0b', 'icon' => 'briefcase', 'badge' => null, 'bc' => 'amber'],
            ['name' => 'Premium Sneakers', 'cat' => 'Fashion', 'price' => 159.00, 'rating' => 5, 'reviews' => 203, 'color' => '#ef4444', 'icon' => 'fire', 'badge' => 'Popular', 'bc' => 'red'],
            ['name' => 'Mechanical Keyboard', 'cat' => 'Electronics', 'price' => 129.00, 'rating' => 4, 'reviews' => 67, 'color' => '#8b5cf6', 'icon' => 'command-line', 'badge' => null, 'bc' => 'purple'],
            ['name' => 'Noise Cancelling Earbuds', 'cat' => 'Electronics', 'price' => 179.00, 'rating' => 4, 'reviews' => 142, 'color' => '#06b6d4', 'icon' => 'speaker-x-mark', 'badge' => 'Sale', 'bc' => 'cyan'],
            ['name' => 'Organic Cotton T-Shirt', 'cat' => 'Fashion', 'price' => 34.00, 'rating' => 3, 'reviews' => 34, 'color' => '#ec4899', 'icon' => 'heart', 'badge' => null, 'bc' => 'pink'],
            ['name' => 'Stainless Steel Bottle', 'cat' => 'Home', 'price' => 28.00, 'rating' => 4, 'reviews' => 91, 'color' => '#0ea5e9', 'icon' => 'beaker', 'badge' => null, 'bc' => 'sky'],
            ['name' => 'Desk Lamp LED', 'cat' => 'Home', 'price' => 49.00, 'rating' => 4, 'reviews' => 45, 'color' => '#14b8a6', 'icon' => 'light-bulb', 'badge' => null, 'bc' => 'teal'],
            ['name' => 'Running Shoes Pro', 'cat' => 'Sports', 'price' => 199.00, 'rating' => 5, 'reviews' => 178, 'color' => '#84cc16', 'icon' => 'bolt', 'badge' => 'Best Seller', 'bc' => 'lime'],
            ['name' => 'Slim Fit Jacket', 'cat' => 'Fashion', 'price' => 119.00, 'rating' => 4, 'reviews' => 23, 'color' => '#f43f5e', 'icon' => 'star', 'badge' => 'New', 'bc' => 'rose'],
            ['name' => 'Wireless Charger Pad', 'cat' => 'Electronics', 'price' => 39.00, 'rating' => 3, 'reviews' => 112, 'color' => '#7c3aed', 'icon' => 'bolt', 'badge' => null, 'bc' => 'violet'],
            ['name' => 'Yoga Mat Premium', 'cat' => 'Sports', 'price' => 59.00, 'rating' => 4, 'reviews' => 67, 'color' => '#22c55e', 'icon' => 'sparkles', 'badge' => null, 'bc' => 'green'],
            ['name' => 'Sunglasses Aviator', 'cat' => 'Fashion', 'price' => 79.00, 'rating' => 4, 'reviews' => 44, 'color' => '#f97316', 'icon' => 'sun', 'badge' => null, 'bc' => 'orange'],
            ['name' => 'Smartphone Stand', 'cat' => 'Electronics', 'price' => 24.00, 'rating' => 3, 'reviews' => 39, 'color' => '#64748b', 'icon' => 'device-phone-mobile', 'badge' => null, 'bc' => 'slate'],
        ];
    @endphp

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($products as $p)
            <div class="rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 overflow-hidden group hover:shadow-lg transition-all duration-200">
                <a href="/product" class="block">
                    <div class="aspect-square flex items-center justify-center relative overflow-hidden" style="background: linear-gradient(135deg, {{ $p['color'] }}22, {{ $p['color'] }}44)">
                        @if ($p['badge'])
                            <span class="absolute top-2 left-2 text-xs font-medium px-2 py-0.5 rounded-full
                                @switch($p['badge'])
                                    @case('Sale') bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300 @break
                                    @case('New') bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300 @break
                                    @case('Popular') bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300 @break
                                    @default bg-indigo-100 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300
                                @endswitch
                            ">{{ $p['badge'] }}</span>
                        @endif
                        <x-dynamic-component :component="'heroicon-o-' . $p['icon']" class="w-16 h-16 group-hover:scale-110 transition-transform duration-300" style="color: {{ $p['color'] }}cc" />
                    </div>
                </a>
                <div class="p-3">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-0.5">{{ $p['cat'] }}</p>
                    <a href="/product" class="text-sm font-semibold text-gray-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors line-clamp-1">{{ $p['name'] }}</a>
                    <div class="flex items-center gap-1 mt-1">
                        <x-rating :value="$p['rating']" size="xs" />
                        <span class="text-xs text-gray-400">({{ $p['reviews'] }})</span>
                    </div>
                    <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-100 dark:border-gray-800">
                        <span class="text-base font-bold text-gray-900 dark:text-white">${{ number_format($p['price'], 2) }}</span>
                        <button class="w-7 h-7 rounded-lg border border-gray-300 dark:border-gray-700 flex items-center justify-center text-gray-400 hover:text-indigo-600 hover:border-indigo-400 dark:hover:text-indigo-400 transition-colors">
                            <x-heroicon-o-plus class="w-3.5 h-3.5" />
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts-admin>
