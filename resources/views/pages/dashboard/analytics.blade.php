<x-layouts-admin>
    <x-slot:title>Dashboard — Analytics</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Analytics overview for your business</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">Export Report</x-button>
            <x-button size="sm" @click="$dispatch('toast', { type: 'success', title: 'Refreshed', message: 'Dashboard data refreshed.' })">Refresh</x-button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-statscard label="Total Revenue" value="$48,250" change="+12.5%" trend="up" color="emerald">
            <x-slot:icon><x-heroicon-o-banknotes class="w-5 h-5" /></x-slot:icon>
        </x-statscard>
        <x-statscard label="Active Users" value="2,847" change="+3.2%" trend="up" color="indigo">
            <x-slot:icon><x-heroicon-o-user-group class="w-5 h-5" /></x-slot:icon>
        </x-statscard>
        <x-statscard label="New Orders" value="156" change="+8.1%" trend="up" color="amber">
            <x-slot:icon><x-heroicon-o-shopping-bag class="w-5 h-5" /></x-slot:icon>
        </x-statscard>
        <x-statscard label="Conversion Rate" value="3.42%" change="+0.8%" trend="up" color="cyan">
            <x-slot:icon><x-heroicon-o-arrow-trending-up class="w-5 h-5" /></x-slot:icon>
        </x-statscard>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Revenue Overview</h2>
                        <span class="text-xs text-gray-400">Last 12 months</span>
                    </div>
                </x-slot:header>
                <div class="h-72">
                    <x-chart type="line" :height="280"
                        :labels="['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']"
                        :datasets="[[
                            'label' => 'Revenue 2026',
                            'data' => [18500, 22500, 19800, 26200, 24100, 28900, 27300, 31500, 29400, 34800, 32600, 48250],
                            'borderColor' => '#6366f1',
                            'backgroundColor' => 'rgba(99,102,241,0.08)',
                            'borderWidth' => 2,
                            'fill' => true,
                            'tension' => 0.4,
                            'pointBackgroundColor' => '#6366f1',
                            'pointBorderColor' => '#fff',
                            'pointBorderWidth' => 2,
                            'pointRadius' => 4,
                            'pointHoverRadius' => 6,
                        ], [
                            'label' => 'Revenue 2025',
                            'data' => [16200, 19100, 17500, 22800, 21000, 25400, 23800, 27800, 25500, 30200, 28100, 35500],
                            'borderColor' => '#a5b4fc',
                            'backgroundColor' => 'rgba(165,180,252,0.05)',
                            'borderWidth' => 2,
                            'borderDash' => [5, 5],
                            'fill' => true,
                            'tension' => 0.4,
                            'pointBackgroundColor' => '#a5b4fc',
                            'pointBorderColor' => '#fff',
                            'pointBorderWidth' => 2,
                            'pointRadius' => 3,
                            'pointHoverRadius' => 5,
                        ]]" />
                </div>
            </x-card>
        </div>
        <div class="space-y-6">
            <x-card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Traffic Sources</h2>
                        <span class="text-xs text-gray-400">This month</span>
                    </div>
                </x-slot:header>
                <div class="h-56">
                    <x-chart type="doughnut" :height="220"
                        :labels="['Direct', 'Organic', 'Social', 'Referral', 'Email']"
                        :datasets="[[
                            'label' => 'Traffic',
                            'data' => [35, 28, 20, 12, 5],
                            'backgroundColor' => ['#6366f1', '#10b981', '#f59e0b', '#06b6d4', '#f43f5e'],
                            'borderWidth' => 0,
                            'hoverOffset' => 8,
                        ]]" />
                </div>
            </x-card>
            <x-card>
                <x-slot:header>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Quick Stats</h2>
                </x-slot:header>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Avg. Order Value</span>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">$312.45</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Customer Lifetime</span>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">$1,890</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Churn Rate</span>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">4.2%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Active Campaigns</span>
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">8</span>
                    </div>
                </div>
            </x-card>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <x-card>
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Orders</h2>
                    <a href="/invoices" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">View All</a>
                </div>
            </x-slot:header>
            <x-table :header="['Order', 'Customer', 'Status', 'Total', 'Date']">
                @php
                    $orders = [
                        ['id' => '#2498', 'customer' => 'Alex Morgan', 'status' => 'Completed', 'total' => '$349.00', 'date' => '2 min ago', 'color' => 'emerald'],
                        ['id' => '#2497', 'customer' => 'Sarah Chen', 'status' => 'Processing', 'total' => '$129.00', 'date' => '1 hour ago', 'color' => 'amber'],
                        ['id' => '#2496', 'customer' => 'James Wilson', 'status' => 'Completed', 'total' => '$599.00', 'date' => '3 hours ago', 'color' => 'emerald'],
                        ['id' => '#2495', 'customer' => 'Emily Davis', 'status' => 'Pending', 'total' => '$89.00', 'date' => '5 hours ago', 'color' => 'gray'],
                        ['id' => '#2494', 'customer' => 'Michael Brown', 'status' => 'Shipped', 'total' => '$249.00', 'date' => '1 day ago', 'color' => 'indigo'],
                        ['id' => '#2493', 'customer' => 'Diana Ross', 'status' => 'Completed', 'total' => '$179.00', 'date' => '2 days ago', 'color' => 'emerald'],
                    ];
                @endphp
                @foreach ($orders as $o)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">{{ $o['id'] }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-400">{{ $o['customer'] }}</td>
                        <td class="px-4 py-3">
                            <span class="text-xs px-2 py-0.5 rounded-full font-medium
                                @switch($o['color'])
                                    @case('emerald') bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 @break
                                    @case('amber') bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 @break
                                    @case('gray') bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 @break
                                    @case('indigo') bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 @break
                                    @default bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400
                                @endswitch
                            ">{{ $o['status'] }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">{{ $o['total'] }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">{{ $o['date'] }}</td>
                    </tr>
                @endforeach
            </x-table>
        </x-card>
        <x-card>
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Activity Log</h2>
                    <x-heroicon-o-check-circle class="w-4 h-4 text-emerald-500" />
                </div>
            </x-slot:header>
            <div class="space-y-0 divide-y divide-gray-100 dark:divide-gray-800">
                @php
                    $activities = [
                        ['icon' => 'user-plus', 'color' => 'emerald', 'text' => 'New user registered', 'sub' => 'John Doe created an account', 'time' => '2 min ago'],
                        ['icon' => 'shopping-cart', 'color' => 'indigo', 'text' => 'Order #2498 completed', 'sub' => 'Alex Morgan purchased $349.00', 'time' => '5 min ago'],
                        ['icon' => 'credit-card', 'color' => 'emerald', 'text' => 'Payment received', 'sub' => '$599.00 from James Wilson', 'time' => '1 hour ago'],
                        ['icon' => 'ticket', 'color' => 'amber', 'text' => 'Support ticket opened', 'sub' => 'Priority: High — Billing issue', 'time' => '2 hours ago'],
                        ['icon' => 'server', 'color' => 'cyan', 'text' => 'Backup completed', 'sub' => 'Daily backup — 1.2 GB', 'time' => '3 hours ago'],
                        ['icon' => 'user-minus', 'color' => 'red', 'text' => 'User deactivated', 'sub' => 'Account marked as inactive', 'time' => '5 hours ago'],
                        ['icon' => 'document-text', 'color' => 'purple', 'text' => 'Invoice generated', 'sub' => 'INV-2026-06-001', 'time' => '6 hours ago'],
                        ['icon' => 'arrow-path', 'color' => 'indigo', 'text' => 'System update deployed', 'sub' => 'v2.4.1 rolled out', 'time' => '8 hours ago'],
                    ];
                @endphp
                @foreach ($activities as $a)
                    <div class="flex items-start gap-3 py-3 first:pt-0 last:pb-0">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 bg-{{ $a['color'] }}-100 dark:bg-{{ $a['color'] }}-900/30">
                            <x-dynamic-component :component="'heroicon-o-' . $a['icon']" class="w-4 h-4 text-{{ $a['color'] }}-600 dark:text-{{ $a['color'] }}-400" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $a['text'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $a['sub'] }}</p>
                        </div>
                        <span class="text-xs text-gray-400 flex-shrink-0">{{ $a['time'] }}</span>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div>
            <x-card>
                <x-slot:header>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Users</h2>
                </x-slot:header>
                <div class="space-y-3">
                    @php
                        $recentUsers = [
                            ['name' => 'Alex Morgan', 'email' => 'alex@example.com', 'avatar' => 'AM', 'color' => 'indigo', 'role' => 'Admin'],
                            ['name' => 'Sarah Chen', 'email' => 'sarah@example.com', 'avatar' => 'SC', 'color' => 'emerald', 'role' => 'Editor'],
                            ['name' => 'James Wilson', 'email' => 'james@example.com', 'avatar' => 'JW', 'color' => 'amber', 'role' => 'User'],
                            ['name' => 'Emily Davis', 'email' => 'emily@example.com', 'avatar' => 'ED', 'color' => 'purple', 'role' => 'Editor'],
                            ['name' => 'Michael Brown', 'email' => 'michael@example.com', 'avatar' => 'MB', 'color' => 'pink', 'role' => 'User'],
                        ];
                    @endphp
                    @foreach ($recentUsers as $u)
                        <div class="flex items-center gap-3">
                            <x-avatar size="sm" color="{{ $u['color'] }}">{{ $u['avatar'] }}</x-avatar>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $u['name'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $u['email'] }}</p>
                            </div>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400">{{ $u['role'] }}</span>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Top Products</h2>
                </x-slot:header>
                <div class="space-y-4">
                    @php
                        $topProducts = [
                            ['name' => 'Wireless Headphones Pro', 'revenue' => '$24,500', 'units' => 98, 'percent' => 100],
                            ['name' => 'Smart Watch Ultra', 'revenue' => '$18,200', 'units' => 46, 'percent' => 74],
                            ['name' => 'Leather Backpack', 'revenue' => '$12,800', 'units' => 144, 'percent' => 52],
                            ['name' => 'Premium Sneakers', 'revenue' => '$9,540', 'units' => 60, 'percent' => 39],
                            ['name' => 'Mechanical Keyboard', 'revenue' => '$7,225', 'units' => 56, 'percent' => 29],
                        ];
                    @endphp
                    @foreach ($topProducts as $p)
                        <div>
                            <div class="flex items-center justify-between text-sm mb-1">
                                <span class="text-gray-700 dark:text-gray-300 font-medium truncate mr-2">{{ $p['name'] }}</span>
                                <span class="text-gray-900 dark:text-white font-semibold flex-shrink-0">{{ $p['revenue'] }}</span>
                            </div>
                            <div class="flex items-center justify-between text-xs text-gray-400 mb-1">
                                <span>{{ $p['units'] }} units sold</span>
                            </div>
                            <div class="w-full h-1.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full rounded-full bg-indigo-500" style="width: {{ $p['percent'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Notifications</h2>
                        <x-badge size="sm" color="red" :count="3" />
                    </div>
                </x-slot:header>
                <div class="space-y-3">
                    @php
                        $notifications = [
                            ['title' => 'New order received', 'desc' => 'Order #2499 — $129.00', 'time' => 'Just now', 'unread' => true, 'color' => 'indigo'],
                            ['title' => 'Payment failed', 'desc' => 'Transaction declined for invoice #INV-023', 'time' => '5 min ago', 'unread' => true, 'color' => 'red'],
                            ['title' => 'Server alert', 'desc' => 'CPU usage exceeded 90% on app-server-01', 'time' => '15 min ago', 'unread' => true, 'color' => 'amber'],
                            ['title' => 'Deployment complete', 'desc' => 'v2.4.1 deployed to production', 'time' => '1 hour ago', 'unread' => false, 'color' => 'emerald'],
                            ['title' => 'Weekly report ready', 'desc' => 'Download your analytics report', 'time' => '2 hours ago', 'unread' => false, 'color' => 'purple'],
                            ['title' => 'New team member', 'desc' => 'Emma Wilson joined your workspace', 'time' => '1 day ago', 'unread' => false, 'color' => 'cyan'],
                        ];
                    @endphp
                    @foreach ($notifications as $n)
                        <div class="flex items-start gap-3 p-3 rounded-lg transition-colors cursor-pointer"
                             :class="$store.darkMode.dark ? 'hover:bg-gray-800' : 'hover:bg-gray-50'">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: {{ match($n['color']) { 'indigo' => '#6366f1', 'red' => '#ef4444', 'amber' => '#f59e0b', 'emerald' => '#10b981', 'purple' => '#8b5cf6', 'cyan' => '#06b6d4', default => '#6366f1' } }}15">
                                <x-dynamic-component :component="'heroicon-o-' . match($n['color']) { 'indigo' => 'bell', 'red' => 'x-circle', 'amber' => 'exclamation-triangle', 'emerald' => 'check-circle', 'purple' => 'chart-bar', 'cyan' => 'user-group', default => 'bell' }" class="w-4 h-4" style="color: {{ match($n['color']) { 'indigo' => '#6366f1', 'red' => '#ef4444', 'amber' => '#f59e0b', 'emerald' => '#10b981', 'purple' => '#8b5cf6', 'cyan' => '#06b6d4', default => '#6366f1' } }}" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $n['title'] }}</p>
                                    @if ($n['unread'])
                                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 flex-shrink-0"></span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $n['desc'] }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $n['time'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</x-layouts-admin>
