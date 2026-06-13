<x-layouts-admin>
    <x-slot:title>Pricing</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Pricing']]" />
    </div>

    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Simple, Transparent Pricing</h1>
        <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">Choose the plan that fits your needs. No hidden fees. Upgrade or downgrade anytime.</p>
        <div class="inline-flex items-center gap-2 mt-4 p-1 bg-gray-100 dark:bg-gray-800 rounded-lg">
            <span class="px-3 py-1.5 text-sm font-medium rounded-md cursor-pointer" :class="billing === 'monthly' ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm' : 'text-gray-500 dark:text-gray-400'" @click="billing = 'monthly'">Monthly</span>
            <span class="px-3 py-1.5 text-sm font-medium rounded-md cursor-pointer" :class="billing === 'annual' ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm' : 'text-gray-500 dark:text-gray-400'" @click="billing = 'annual'">Annual <span class="text-emerald-500 text-xs">-20%</span></span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto" x-data="{ billing: 'monthly' }">
        @php
            $plans = [
                ['name' => 'Starter', 'price' => '29', 'desc' => 'Perfect for small projects', 'features' => ['5 team members', '10GB storage', 'Basic analytics', 'Email support', 'API access'], 'popular' => false, 'color' => 'gray'],
                ['name' => 'Professional', 'price' => '79', 'desc' => 'Best for growing teams', 'features' => ['Unlimited members', '100GB storage', 'Advanced analytics', 'Priority support', 'API access', 'Custom domains', 'SSO'], 'popular' => true, 'color' => 'indigo'],
                ['name' => 'Enterprise', 'price' => '199', 'desc' => 'For large organizations', 'features' => ['Everything in Pro', 'Unlimited storage', 'Dedicated support', 'SLA guarantee', 'Custom integrations', 'Audit logs', 'White label'], 'popular' => false, 'color' => 'gray'],
            ];
        @endphp

        @foreach ($plans as $plan)
            <div @class([
                'rounded-xl border-2 p-6 relative flex flex-col',
                'border-indigo-500 shadow-lg shadow-indigo-500/10' => $plan['popular'],
                'border-gray-200 dark:border-gray-800' => !$plan['popular'],
                'bg-white dark:bg-gray-900',
            ])>
                @if ($plan['popular'])
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Most Popular</span>
                @endif
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">{{ $plan['name'] }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">{{ $plan['desc'] }}</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">$<span x-text="billing === 'monthly' ? '{{ $plan['price'] }}' : '{{ round($plan['price'] * 0.8) }}'">{{ $plan['price'] }}</span></span>
                    <span class="text-sm text-gray-500 dark:text-gray-400" x-text="billing === 'monthly' ? '/month' : '/month'">/month</span>
                </div>
                <ul class="space-y-3 mb-8 flex-1">
                    @foreach ($plan['features'] as $feature)
                        <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <x-heroicon-o-check class="w-4 h-4 text-emerald-500 flex-shrink-0" />
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
                <x-button variant="{{ $plan['popular'] ? 'primary' : 'outline' }}" class="w-full">
                    Get Started
                </x-button>
            </div>
        @endforeach
    </div>

    <div class="mt-10 max-w-3xl mx-auto">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Frequently Asked Questions</h2></x-slot:header>
            <div class="space-y-4">
                @foreach ([
                    ['q' => 'Can I change my plan later?', 'a' => 'Yes, you can upgrade or downgrade at any time. Changes take effect immediately.'],
                    ['q' => 'What payment methods do you accept?', 'a' => 'We accept all major credit cards, PayPal, and bank transfers for annual plans.'],
                    ['q' => 'Is there a free trial?', 'a' => 'Yes, we offer a 14-day free trial on all plans. No credit card required.'],
                ] as $faq)
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center justify-between w-full text-left">
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $faq['q'] }}</span>
                            <span class="w-4 h-4 text-gray-400 transition-transform" :class="{ 'rotate-180': open }">
                                <x-heroicon-o-chevron-down class="w-4 h-4" />
                            </span>
                        </button>
                        <p x-show="open" x-collapse class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>
</x-layouts-admin>
