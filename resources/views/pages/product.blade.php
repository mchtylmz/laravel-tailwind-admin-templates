<x-layouts-admin>
    <x-slot:title>Product Detail</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Products', 'url' => '/products'], ['label' => 'Wireless Headphones Pro']]" />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" x-data="productDetail">
        <div>
            <x-carousel class="aspect-square rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800">
                <div class="flex-shrink-0 w-full h-full bg-gradient-to-br from-indigo-600 to-indigo-800 flex items-center justify-center relative">
                    <div class="absolute inset-0 opacity-10" style="background: radial-gradient(circle at 30% 50%, white 0%, transparent 50%), radial-gradient(circle at 70% 30%, white 0%, transparent 40%)"></div>
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto rounded-3xl bg-white/20 flex items-center justify-center mb-4">
                            <x-heroicon-o-speaker-wave class="w-16 h-16 text-white" />
                        </div>
                        <p class="text-white text-lg font-semibold">Wireless Headphones Pro</p>
                        <p class="text-indigo-200 text-sm">Indigo Blue</p>
                    </div>
                </div>
                <div class="flex-shrink-0 w-full h-full bg-gradient-to-br from-emerald-600 to-emerald-800 flex items-center justify-center relative">
                    <div class="absolute inset-0 opacity-10" style="background: radial-gradient(circle at 70% 60%, white 0%, transparent 50%), radial-gradient(circle at 30% 20%, white 0%, transparent 40%)"></div>
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto rounded-3xl bg-white/20 flex items-center justify-center mb-4">
                            <x-heroicon-o-speaker-wave class="w-16 h-16 text-white" />
                        </div>
                        <p class="text-white text-lg font-semibold">Wireless Headphones Pro</p>
                        <p class="text-emerald-200 text-sm">Forest Green</p>
                    </div>
                </div>
                <div class="flex-shrink-0 w-full h-full bg-gradient-to-br from-amber-600 to-orange-600 flex items-center justify-center relative">
                    <div class="absolute inset-0 opacity-10" style="background: radial-gradient(circle at 40% 40%, white 0%, transparent 50%), radial-gradient(circle at 80% 70%, white 0%, transparent 40%)"></div>
                    <div class="text-center">
                        <div class="w-32 h-32 mx-auto rounded-3xl bg-white/20 flex items-center justify-center mb-4">
                            <x-heroicon-o-speaker-wave class="w-16 h-16 text-white" />
                        </div>
                        <p class="text-white text-lg font-semibold">Wireless Headphones Pro</p>
                        <p class="text-amber-200 text-sm">Amber Gold</p>
                    </div>
                </div>
            </x-carousel>
            <div class="flex gap-2 mt-3">
                @foreach (['indigo' => 'from-indigo-600 to-indigo-800', 'emerald' => 'from-emerald-600 to-emerald-800', 'amber' => 'from-amber-600 to-orange-600'] as $color => $gradient)
                    <button @click="slide = {{ $loop->index }}" class="w-16 h-16 rounded-lg border-2 cursor-pointer transition-all"
                            :class="slide === {{ $loop->index }} ? 'border-indigo-500 ring-2 ring-indigo-200' : 'border-gray-200 dark:border-gray-700 hover:border-gray-400'"
                            style="background: linear-gradient(135deg, var(--tw-{{ $color }}-600), var(--tw-{{ $color }}-800))">
                    </button>
                @endforeach
            </div>
        </div>

        <div>
            <div class="flex items-start gap-2 mb-1">
                <x-badge size="sm" color="emerald">New</x-badge>
                <x-badge size="sm" color="amber">Best Seller</x-badge>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Wireless Headphones Pro</h1>
            <div class="flex items-center gap-2 mb-3">
                <x-rating :value="5" size="sm" />
                <span class="text-sm text-gray-500 dark:text-gray-400">(128 reviews)</span>
            </div>
            <p class="text-3xl font-bold text-gray-900 dark:text-white mb-4">$249.00</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Premium wireless headphones with active noise cancellation, 30-hour battery life, and premium comfort for all-day wear.</p>

            <div class="mb-6">
                <p class="text-sm font-medium text-gray-900 dark:text-white mb-2">Color</p>
                <div class="flex gap-2">
                    @foreach (['#6366f1' => 'border-indigo-500 ring-indigo-200', '#10b981' => 'border-emerald-500 ring-emerald-200', '#f59e0b' => 'border-amber-500 ring-amber-200', '#ef4444' => 'border-red-500 ring-red-200', '#1e293b' => 'border-gray-800 ring-gray-400'] as $hex => $classes)
                        <button @click="selectedColor = '{{ $hex }}'" class="w-8 h-8 rounded-full border-2 transition-all"
                                :class="selectedColor === '{{ $hex }}' ? 'border-{{ explode(" ", $classes)[0] }} ring-2 ring-{{ explode(" ", $classes)[1] }}' : 'border-transparent'"
                                style="background-color: {{ $hex }}"></button>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-4 mb-6">
                <div class="flex items-center border border-gray-300 dark:border-gray-700 rounded-lg">
                    <button @click="qty = Math.max(1, qty - 1)" class="px-3 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">-</button>
                    <span class="px-4 py-2 text-sm font-medium text-gray-900 dark:text-white border-x border-gray-300 dark:border-gray-700" x-text="qty"></span>
                    <button @click="qty++" class="px-3 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">+</button>
                </div>
                <x-button size="lg" class="flex-1">Add to Cart</x-button>
                <button @click="wishlisted = !wishlisted" class="w-12 h-12 rounded-lg border border-gray-300 dark:border-gray-700 flex items-center justify-center transition-colors"
                        :class="wishlisted ? 'text-red-500 border-red-300 bg-red-50 dark:bg-red-900/20' : 'text-gray-400 hover:text-red-500 hover:border-red-300'">
                    <x-heroicon-o-heart class="w-5 h-5" />
                </button>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-800 pt-4 space-y-2 text-sm">
                <div class="flex justify-between"><span class="text-gray-500 dark:text-gray-400">SKU</span><span class="text-gray-900 dark:text-white font-medium">WHP-001-BL</span></div>
                <div class="flex justify-between"><span class="text-gray-500 dark:text-gray-400">Category</span><span class="text-gray-900 dark:text-white font-medium">Electronics</span></div>
                <div class="flex justify-between"><span class="text-gray-500 dark:text-gray-400">Free Shipping</span><span class="text-emerald-600 font-medium">Yes</span></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Reviews</h2>
                        <x-badge size="sm" color="gray">128</x-badge>
                    </div>
                </x-slot:header>
                <div class="divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach ([
                        ['user' => 'AD', 'name' => 'Alex D.', 'rating' => 5, 'date' => '2 days ago', 'text' => 'Best headphones I\'ve ever owned. The noise cancellation is incredible and the battery lasts forever.', 'helpful' => 24],
                        ['user' => 'SC', 'name' => 'Sarah C.', 'rating' => 4, 'date' => '1 week ago', 'text' => 'Great sound quality but the ear cups could be more comfortable for long sessions.', 'helpful' => 12],
                        ['user' => 'JW', 'name' => 'James W.', 'rating' => 5, 'date' => '2 weeks ago', 'text' => 'Worth every penny. The build quality is premium and the soundstage is amazing.', 'helpful' => 8],
                    ] as $review)
                        <div class="py-4">
                            <div class="flex items-center gap-3 mb-2">
                                <x-avatar size="sm" color="indigo">{{ $review['user'] }}</x-avatar>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $review['name'] }}</p>
                                    <div class="flex items-center gap-2">
                                        <x-rating :value="$review['rating']" size="xs" />
                                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $review['date'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ $review['text'] }}</p>
                            <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                                <span>{{ $review['helpful'] }} people found this helpful</span>
                                <button class="text-indigo-600 dark:text-indigo-400 hover:underline">Helpful</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header><h3 class="text-sm font-semibold text-gray-900 dark:text-white">Shipping Info</h3></x-slot:header>
                <div class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach ([
                        ['icon' => 'truck', 'text' => 'Free shipping', 'sub' => 'On orders over $50'],
                        ['icon' => 'arrow-path', 'text' => 'Easy returns', 'sub' => '30-day return policy'],
                        ['icon' => 'shield-check', 'text' => 'Warranty', 'sub' => '1 year included'],
                        ['icon' => 'clock', 'text' => 'Delivery', 'sub' => '3-5 business days'],
                    ] as $info)
                        <div class="flex items-center gap-3 py-3 first:pt-0 last:pb-0">
                            <div class="w-8 h-8 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center flex-shrink-0">
                                <x-heroicon-o-{{ $info['icon'] }} class="w-4 h-4 text-indigo-600 dark:text-indigo-400" />
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $info['text'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $info['sub'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productDetail', () => ({
                qty: 1, slide: 0, wishlisted: false, selectedColor: '#6366f1'
            }))
        })
    </script>
</x-layouts-admin>
