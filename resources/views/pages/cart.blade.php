<x-layouts-admin>
    <x-slot:title>Shopping Cart</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Shopping Cart']]" />
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Shopping Cart</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">3 items in your cart</p>
        </div>
        <x-button variant="outline" size="sm">Clear Cart</x-button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-4">
            @php
                $cartItems = [
                    ['name' => 'Wireless Headphones Pro', 'price' => 249.00, 'qty' => 1, 'image' => 'headphones', 'color' => 'indigo'],
                    ['name' => 'Smart Watch Ultra', 'price' => 399.00, 'qty' => 1, 'image' => 'clock', 'color' => 'emerald'],
                    ['name' => 'USB-C Hub 7-in-1', 'price' => 49.00, 'qty' => 2, 'image' => 'rectangle-stack', 'color' => 'amber'],
                ];
            @endphp

            @foreach ($cartItems as $item)
                <x-card>
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-lg bg-gradient-to-br from-{{ $item['color'] }}-100 to-{{ $item['color'] }}-200 dark:from-{{ $item['color'] }}-900/30 dark:to-{{ $item['color'] }}-800/20 flex items-center justify-center flex-shrink-0">
                            <x-heroicon-o-{{ $item['image'] }} class="w-8 h-8 text-{{ $item['color'] }}-400" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $item['name'] }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">${{ number_format($item['price'], 2) }}</p>
                        </div>
                        <div class="flex items-center border border-gray-300 dark:border-gray-700 rounded-lg">
                            <button class="px-2.5 py-1.5 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white text-sm">-</button>
                            <span class="px-3 py-1.5 text-sm font-medium text-gray-900 dark:text-white border-x border-gray-300 dark:border-gray-700">{{ $item['qty'] }}</span>
                            <button class="px-2.5 py-1.5 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white text-sm">+</button>
                        </div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-white w-20 text-right">${{ number_format($item['price'] * $item['qty'], 2) }}</p>
                        <button class="text-gray-400 hover:text-red-500 transition-colors">
                            <x-heroicon-o-trash class="w-4 h-4" />
                        </button>
                    </div>
                </x-card>
            @endforeach

            <x-card>
                <div class="flex items-center gap-2">
                    <x-input placeholder="Enter coupon code" class="flex-1" />
                    <x-button variant="outline" size="sm">Apply</x-button>
                </div>
            </x-card>
        </div>

        <div>
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Order Summary</h2></x-slot:header>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Subtotal</span>
                        <span class="text-gray-900 dark:text-white font-medium">$746.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Shipping</span>
                        <span class="text-emerald-600 font-medium">Free</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500 dark:text-gray-400">Tax</span>
                        <span class="text-gray-900 dark:text-white font-medium">$59.68</span>
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-800 pt-3 flex justify-between">
                        <span class="font-semibold text-gray-900 dark:text-white">Total</span>
                        <span class="font-bold text-lg text-gray-900 dark:text-white">$805.68</span>
                    </div>
                </div>
                <x-button class="w-full mt-4" size="lg">Proceed to Checkout</x-button>
                <a href="/product" class="block text-center text-sm text-indigo-600 dark:text-indigo-400 hover:underline mt-3">Continue Shopping</a>
            </x-card>
        </div>
    </div>
</x-layouts-admin>
