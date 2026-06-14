<x-layouts-admin>
    <x-slot:title>Checkout</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Cart', 'url' => '/cart'], ['label' => 'Checkout']]" />
    </div>

    <div class="flex items-center mb-6" x-data="stepper" x-init="total = 3">
        <template x-for="(_, i) in Array.from({ length: total })" :key="i">
            <div class="flex items-center flex-1">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold transition-colors"
                         :class="i + 1 <= step ? 'bg-indigo-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-500'"
                         x-text="i + 1"></div>
                    <span class="text-sm font-medium hidden sm:inline" :class="i + 1 <= step ? 'text-gray-900 dark:text-white' : 'text-gray-400'" x-text="['Shipping', 'Payment', 'Review'][i]"></span>
                </div>
                <div x-show="i < total - 1" class="flex-1 h-px mx-3 transition-colors" :class="i + 1 < step ? 'bg-indigo-600' : 'bg-gray-200 dark:bg-gray-700'"></div>
            </div>
        </template>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div x-show="step === 1">
                <x-card>
                    <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Shipping Address</h2></x-slot:header>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <x-label>First Name</x-label>
                            <x-input placeholder="John" />
                        </div>
                        <div>
                            <x-label>Last Name</x-label>
                            <x-input placeholder="Doe" />
                        </div>
                        <div class="sm:col-span-2">
                            <x-label>Email</x-label>
                            <x-input type="email" placeholder="john@example.com" />
                        </div>
                        <div class="sm:col-span-2">
                            <x-label>Address</x-label>
                            <x-input placeholder="123 Main Street" />
                        </div>
                        <div>
                            <x-label>City</x-label>
                            <x-input placeholder="New York" />
                        </div>
                        <div>
                            <x-label>ZIP Code</x-label>
                            <x-input placeholder="10001" />
                        </div>
                        <div>
                            <x-label>Country</x-label>
                            <x-select>
                                <option>United States</option>
                                <option>Canada</option>
                                <option>United Kingdom</option>
                            </x-select>
                        </div>
                        <div>
                            <x-label>Phone</x-label>
                            <x-input type="tel" placeholder="+1 (555) 000-0000" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-checkbox label="Save this address for future orders" />
                    </div>
                </x-card>
            </div>

            <div x-show="step === 2">
                <x-card>
                    <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Payment Method</h2></x-slot:header>
                    <div class="space-y-3">
                        @foreach ([
                            ['value' => 'card', 'label' => 'Credit Card', 'icon' => 'credit-card'],
                            ['value' => 'paypal', 'label' => 'PayPal', 'icon' => 'currency-dollar'],
                            ['value' => 'bank', 'label' => 'Bank Transfer', 'icon' => 'building-library'],
                        ] as $pm)
                            <label class="flex items-center gap-3 p-3 rounded-lg border cursor-pointer transition-colors has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-50 dark:has-[:checked]:bg-indigo-900/20 border-gray-200 dark:border-gray-800 hover:border-gray-300">
                                <input type="radio" name="payment" value="{{ $pm['value'] }}" class="accent-indigo-600" {{ $loop->first ? 'checked' : '' }}>
                                <x-heroicon-o-{{ $pm['icon'] }} class="w-5 h-5 text-gray-400" />
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $pm['label'] }}</span>
                            </label>
                        @endforeach
                    </div>
                    <div class="mt-4 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col-span-2">
                                <x-label>Card Number</x-label>
                                <x-input placeholder="4242 4242 4242 4242" />
                            </div>
                            <div>
                                <x-label>Expiry</x-label>
                                <x-input placeholder="MM/YY" />
                            </div>
                            <div>
                                <x-label>CVC</x-label>
                                <x-input placeholder="123" />
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>

            <div x-show="step === 3">
                <x-card>
                    <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Review Your Order</h2></x-slot:header>
                    <div class="divide-y divide-gray-200 dark:divide-gray-800">
                        @foreach ([
                            ['name' => 'Wireless Headphones Pro', 'qty' => 1, 'price' => 249.00],
                            ['name' => 'Smart Watch Ultra', 'qty' => 1, 'price' => 399.00],
                            ['name' => 'USB-C Hub 7-in-1', 'qty' => 2, 'price' => 49.00],
                        ] as $item)
                            <div class="flex justify-between py-2 text-sm">
                                <span class="text-gray-600 dark:text-gray-400">{{ $item['name'] }} <span class="text-gray-400">x{{ $item['qty'] }}</span></span>
                                <span class="font-medium text-gray-900 dark:text-white">${{ number_format($item['price'] * $item['qty'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t border-gray-200 dark:border-gray-800 pt-3 mt-3 space-y-1 text-sm">
                        <div class="flex justify-between"><span class="text-gray-500">Subtotal</span><span class="text-gray-900 dark:text-white">$746.00</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Shipping</span><span class="text-emerald-600">Free</span></div>
                        <div class="flex justify-between"><span class="text-gray-500">Tax</span><span class="text-gray-900 dark:text-white">$59.68</span></div>
                        <div class="flex justify-between pt-2 border-t border-gray-200 dark:border-gray-800 font-semibold"><span class="text-gray-900 dark:text-white">Total</span><span class="text-gray-900 dark:text-white text-lg">$805.68</span></div>
                    </div>
                </x-card>
            </div>

            <div class="flex justify-between">
                <x-button variant="outline" @click="prev" x-show="step > 1">Back</x-button>
                <x-button @click="next" x-show="step < total" x-bind:class="step === 1 ? '' : 'ml-auto'">Continue</x-button>
                <x-button variant="primary" @click="next" x-show="step === total">Place Order</x-button>
            </div>
        </div>

        <div class="space-y-4">
            <x-card>
                <x-slot:header><h3 class="text-sm font-semibold text-gray-900 dark:text-white">Order Summary</h3></x-slot:header>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-500">Subtotal</span><span class="text-gray-900 dark:text-white">$746.00</span></div>
                    <div class="flex justify-between"><span class="text-gray-500">Shipping</span><span class="text-emerald-600">Free</span></div>
                    <div class="flex justify-between"><span class="text-gray-500">Tax</span><span class="text-gray-900 dark:text-white">$59.68</span></div>
                    <div class="border-t border-gray-200 dark:border-gray-800 pt-2 flex justify-between font-semibold">
                        <span class="text-gray-900 dark:text-white">Total</span>
                        <span class="text-gray-900 dark:text-white">$805.68</span>
                    </div>
                </div>
            </x-card>
            <x-card>
                <x-slot:header><h3 class="text-sm font-semibold text-gray-900 dark:text-white">Secure Checkout</h3></x-slot:header>
                <div class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach ([
                        ['icon' => 'lock-closed', 'text' => 'Encrypted', 'sub' => 'Your data is secure'],
                        ['icon' => 'shield-check', 'text' => 'Secure Payment', 'sub' => 'Protected transactions'],
                        ['icon' => 'credit-card', 'text' => 'Accepted Cards', 'sub' => 'Visa, MC, Amex'],
                    ] as $item)
                        <div class="flex items-center gap-3 py-3 first:pt-0 last:pb-0">
                            <div class="w-8 h-8 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center flex-shrink-0">
                                <x-heroicon-o-{{ $item['icon'] }} class="w-4 h-4 text-emerald-600 dark:text-emerald-400" />
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $item['text'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $item['sub'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</x-layouts-admin>
