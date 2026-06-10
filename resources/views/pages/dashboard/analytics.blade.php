<x-layouts-admin>
    <x-slot:title>Dashboard — Analytics</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Analytics overview for your business</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">Export</x-button>
            <x-button size="sm">Add Widget</x-button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-statscard label="Total Revenue" value="$48,250" change="+12.5% this week" trend="up" color="emerald">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </x-slot:icon>
        </x-statscard>
        <x-statscard label="Active Users" value="2,847" change="+3.2% this week" trend="up" color="indigo">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg>
            </x-slot:icon>
        </x-statscard>
        <x-statscard label="New Orders" value="156" change="+8.1% this week" trend="up" color="amber">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </x-slot:icon>
        </x-statscard>
        <x-statscard label="Bounce Rate" value="24.5%" change="-2.1% this week" trend="down" color="rose">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </x-slot:icon>
        </x-statscard>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Revenue Overview</h2>
                        <x-dropdown>
                            <x-slot:trigger>
                                <button class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">This Week ▾</button>
                            </x-slot:trigger>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Today</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">This Week</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">This Month</a>
                        </x-dropdown>
                    </div>
                </x-slot:header>
                <div class="h-64 flex items-end gap-2">
                    @php $heights = [40, 65, 45, 80, 55, 90, 70, 85, 60, 95, 75, 50] @endphp
                    @foreach(['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] as $i => $m)
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-md bg-indigo-500 dark:bg-indigo-400 transition-all" style="height: {{ $heights[$i] }}px"></div>
                            <span class="text-xs text-gray-400">{{ $m }}</span>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Activity</h2>
                </x-slot:header>
                <div class="space-y-4">
                    @foreach([
                        ['New user registered', '10 min ago', 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400'],
                        ['Order #1234 completed', '25 min ago', 'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400'],
                        ['Payment received', '1 hour ago', 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400'],
                        ['New ticket opened', '2 hours ago', 'bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400'],
                        ['Server backup done', '3 hours ago', 'bg-cyan-100 dark:bg-cyan-900/30 text-cyan-600 dark:text-cyan-400'],
                    ] as $activity)
                        <div class="flex items-start gap-3">
                            <div class="w-2 h-2 mt-2 rounded-full flex-shrink-0 {{ explode(' ', $activity[2])[0] }}"></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $activity[0] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $activity[1] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-card>
            <x-slot:header>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Traffic Sources</h2>
            </x-slot:header>
            @php $sources = [['Direct', 35, 'bg-indigo-500'], ['Organic', 28, 'bg-emerald-500'], ['Social', 20, 'bg-amber-500'], ['Referral', 12, 'bg-cyan-500'], ['Email', 5, 'bg-rose-500']] @endphp
            <div class="space-y-3">
                @foreach($sources as $source)
                    <div>
                        <div class="flex items-center justify-between text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-300">{{ $source[0] }}</span>
                            <span class="text-gray-500 dark:text-gray-400">{{ $source[1] }}%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                            <div class="h-full rounded-full {{ $source[2] }}" style="width: {{ $source[1] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
        <x-card>
            <x-slot:header>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Quick Actions</h2>
            </x-slot:header>
            <div class="grid grid-cols-2 gap-3">
                @foreach([['New User', 'users'], ['New Order', 'forms'], ['Settings', 'settings'], ['Reports', 'dashboard/ecommerce']] as $action)
                    <a href="{{ url($action[1]) }}" class="flex flex-col items-center gap-2 p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $action[0] }}</span>
                    </a>
                @endforeach
            </div>
        </x-card>
    </div>
</x-layouts-admin>
