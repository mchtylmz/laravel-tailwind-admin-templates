<x-layouts-admin>
    <x-slot:title>Example Page</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Example Page'],
        ]" />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mb-6">
        <x-statscard label="Total Revenue" value="$124,500" change="+18.2%" trend="up" color="indigo">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </x-slot:icon>
        </x-statscard>
        <x-statscard label="Active Users" value="3,842" change="+5.7%" trend="up" color="emerald">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg>
            </x-slot:icon>
        </x-statscard>
        <x-statscard label="Avg Rating" change="+0.3 this week" trend="up" color="amber">
            <x-slot:value>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">4.8</span>
                    <x-rating :value="5" size="sm" />
                </div>
            </x-slot:value>
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            </x-slot:icon>
        </x-statscard>
        <x-statscard label="Open Orders" value="24" change="-3.1%" trend="down" color="rose">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </x-slot:icon>
        </x-statscard>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Monthly Revenue</h2>
                        <div class="flex items-center gap-2">
                            <x-badge color="indigo">+18.2%</x-badge>
                            <x-dropdown>
                                <x-slot:trigger>
                                    <x-button variant="ghost" size="sm">This Year ▾</x-button>
                                </x-slot:trigger>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">This Year</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">This Quarter</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">This Month</a>
                            </x-dropdown>
                        </div>
                    </div>
                </x-slot:header>
                <x-chart type="line" :height="280"
                    :labels="['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']"
                    :datasets="[[
                        'label' => 'Revenue',
                        'data' => [4500, 5200, 4800, 5800, 5400, 6200, 5900, 6800, 7200, 7600, 8200, 9500],
                        'borderColor' => '#6366f1',
                        'backgroundColor' => 'rgba(99,102,241,0.1)',
                        'fill' => true,
                        'tension' => 0.4,
                    ], [
                        'label' => 'Expenses',
                        'data' => [3200, 3400, 3100, 3800, 3600, 3900, 3700, 4100, 4300, 4500, 4800, 5100],
                        'borderColor' => '#10b981',
                        'backgroundColor' => 'rgba(16,185,129,0.1)',
                        'fill' => true,
                        'tension' => 0.4,
                    ]]" />
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Team Members</h2></x-slot:header>
                <div class="divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach([
                        ['name' => 'Alex Morgan', 'role' => 'Admin', 'status' => 'online', 'color' => 'indigo'],
                        ['name' => 'Sarah Chen', 'role' => 'Editor', 'status' => 'online', 'color' => 'emerald'],
                        ['name' => 'James Wilson', 'role' => 'Viewer', 'status' => 'away', 'color' => 'amber'],
                        ['name' => 'Emily Davis', 'role' => 'Editor', 'status' => 'offline', 'color' => 'purple'],
                        ['name' => 'Michael Brown', 'role' => 'Admin', 'status' => 'busy', 'color' => 'pink'],
                    ] as $member)
                        <div class="flex items-center gap-3 py-3">
                            <x-avatar size="sm" :color="$member['color']" :status="$member['status']">{{ substr($member['name'], 0, 2) }}</x-avatar>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $member['name'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $member['role'] }}</p>
                            </div>
                            <x-badge size="sm" color="{{ $member['status'] === 'online' ? 'emerald' : ($member['status'] === 'away' ? 'amber' : 'gray') }}">{{ ucfirst($member['status']) }}</x-badge>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <x-card>
                    <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Progress Overview</h2></x-slot:header>
                    <div class="space-y-4">
                        <x-progress label="Frontend" :value="85" :percent="85" color="indigo" />
                        <x-progress label="Backend" :value="70" :percent="70" color="emerald" />
                        <x-progress label="Design" :value="45" :percent="45" color="amber" />
                        <x-progress label="Testing" :value="30" :percent="30" color="red" />
                    </div>
                </x-card>
                <x-card>
                    <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Traffic Sources</h2></x-slot:header>
                    <x-chart type="doughnut" :height="220"
                        :labels="['Direct', 'Organic', 'Social', 'Referral']"
                        :datasets="[[
                            'label' => 'Traffic',
                            'data' => [45, 30, 15, 10],
                            'backgroundColor' => ['#6366f1','#10b981','#f59e0b','#06b6d4'],
                        ]]" />
                </x-card>
            </div>
        </div>
        <div>
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Activity</h2></x-slot:header>
                <x-timeline :items="[
                    ['title' => 'Project deployed', 'description' => 'v2.4.1 pushed to production', 'time' => '5 min ago', 'color' => 'emerald',
                     'icon' => '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z\"/></svg>'],
                    ['title' => 'New user registered', 'description' => 'Sarah Chen created an account', 'time' => '1 hour ago', 'color' => 'indigo',
                     'icon' => '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z\"/></svg>'],
                    ['title' => 'Payment received', 'description' => '$2,450.00 from Acme Corp', 'time' => '3 hours ago', 'color' => 'amber',
                     'icon' => '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z\"/></svg>'],
                ]" />
            </x-card>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Orders</h2></x-slot:header>
            <x-list-group :items="[
                ['icon' => '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z\"/></svg>', 'title' => 'Order #1248', 'description' => 'Processing • $249.00', 'color' => 'amber', 'badge' => ['text' => 'Processing', 'color' => 'amber']],
                ['icon' => '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z\"/></svg>', 'title' => 'Order #1247', 'description' => 'Shipped • $189.00', 'color' => 'emerald', 'badge' => ['text' => 'Shipped', 'color' => 'emerald']],
                ['icon' => '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z\"/></svg>', 'title' => 'Order #1246', 'description' => 'Delivered • $520.00', 'color' => 'indigo', 'badge' => ['text' => 'Delivered', 'color' => 'indigo']],
                ['icon' => '<svg class=\"w-4 h-4\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z\"/></svg>', 'title' => 'Order #1245', 'description' => 'Cancelled • $75.00', 'color' => 'red', 'badge' => ['text' => 'Cancelled', 'color' => 'red']],
            ]" />
        </x-card>
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Product Reviews</h2></x-slot:header>
            <div class="divide-y divide-gray-200 dark:divide-gray-800">
                @foreach([
                    ['user' => 'AD', 'name' => 'Alex D.', 'product' => 'Wireless Headphones', 'rating' => 5, 'text' => 'Amazing sound quality!'],
                    ['user' => 'SC', 'name' => 'Sarah C.', 'product' => 'Smart Watch', 'rating' => 4, 'text' => 'Great battery life.'],
                    ['user' => 'JW', 'name' => 'James W.', 'product' => 'USB-C Hub', 'rating' => 3, 'text' => 'Works well but bulky.'],
                    ['user' => 'ED', 'name' => 'Emily D.', 'product' => 'Keyboard', 'rating' => 5, 'text' => 'Perfect for coding!'],
                ] as $review)
                    <div class="py-3">
                        <div class="flex items-center gap-3 mb-1.5">
                            <x-avatar size="sm" color="indigo">{{ $review['user'] }}</x-avatar>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $review['name'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $review['product'] }}</p>
                            </div>
                            <x-rating :value="$review['rating']" size="sm" />
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 ml-11">{{ $review['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>
</x-layouts-admin>
