<x-layouts-admin>
    <x-slot:title>Timeline</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Timeline']]" />
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Activity Timeline</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Track project activity and events</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">Filter</x-button>
            <x-button size="sm">Export</x-button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            @php
                $todayItems = [
                    ['title' => 'Project deployed', 'description' => 'v2.4.1 pushed to production by Alex Morgan', 'time' => '2 hours ago', 'color' => 'emerald',
                     'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'],
                    ['title' => 'New user registered', 'description' => 'Sarah Chen created an account', 'time' => '4 hours ago', 'color' => 'indigo',
                     'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>'],
                    ['title' => 'Payment received', 'description' => '$2,450.00 from Acme Corp', 'time' => '5 hours ago', 'color' => 'amber',
                     'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>'],
                    ['title' => 'Server alert resolved', 'description' => 'CPU usage back to normal levels', 'time' => '8 hours ago', 'color' => 'purple',
                     'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783m0-2.783c.36.743.78 1.446 1.257 2.102m0-2.102a8.364 8.364 0 01-.985-2.102m.985 2.102c.447-.656.867-1.359 1.257-2.102m0 0a8.364 8.364 0 00-.985-2.102"/></svg>'],
                ];

                $yesterdayItems = [
                    ['title' => 'Code review completed', 'description' => 'PR #342 merged to main branch', 'time' => 'Yesterday', 'color' => 'emerald',
                     'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'],
                    ['title' => 'New feature request', 'description' => 'Dashboard export to PDF requested by client', 'time' => 'Yesterday', 'color' => 'indigo',
                     'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>'],
                ];
            @endphp

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Today</h2></x-slot:header>
                <x-timeline :items="$todayItems" />
            </x-card>

            <x-card class="mt-4">
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Yesterday</h2></x-slot:header>
                <x-timeline :items="$yesterdayItems" />
            </x-card>

            <x-card class="mt-4">
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">This Week</h2></x-slot:header>
                @php
                    $weekItems = [
                        ['title' => 'Sprint planning', 'description' => 'Sprint #24 planned with 8 story points', 'time' => 'Mon', 'color' => 'amber',
                         'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008z"/></svg>'],
                        ['title' => 'Database migration', 'description' => 'PostgreSQL migration completed successfully', 'time' => 'Sun', 'color' => 'emerald',
                         'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/></svg>'],
                        ['title' => 'Team building event', 'description' => 'Virtual team building workshop', 'time' => 'Sat', 'color' => 'indigo',
                         'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>'],
                    ];
                @endphp
                <x-timeline :items="$weekItems" />
            </x-card>
        </div>

        <div class="space-y-4">
            <x-card>
                <x-slot:header><h3 class="text-sm font-semibold text-gray-900 dark:text-white">Activity Stats</h3></x-slot:header>
                <div class="space-y-3">
                    @foreach ([
                        ['label' => 'Total Events', 'value' => '48', 'change' => '+12 this week'],
                        ['label' => 'Completed', 'value' => '36', 'change' => '75% completion'],
                        ['label' => 'Pending', 'value' => '12', 'change' => 'Needs attention'],
                    ] as $stat)
                        <div class="flex items-center justify-between py-1">
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $stat['label'] }}</span>
                            <div class="text-right">
                                <span class="text-sm font-semibold text-gray-900 dark:text-white block">{{ $stat['value'] }}</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $stat['change'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h3 class="text-sm font-semibold text-gray-900 dark:text-white">Contributors</h3></x-slot:header>
                <div class="space-y-3">
                    @foreach ([
                        ['name' => 'Alex Morgan', 'color' => 'indigo', 'initials' => 'AM', 'count' => 24],
                        ['name' => 'Sarah Chen', 'color' => 'emerald', 'initials' => 'SC', 'count' => 18],
                        ['name' => 'James Wilson', 'color' => 'amber', 'initials' => 'JW', 'count' => 12],
                        ['name' => 'Emily Davis', 'color' => 'purple', 'initials' => 'ED', 'count' => 8],
                    ] as $contributor)
                        <div class="flex items-center gap-2">
                            <x-avatar size="xs" :color="$contributor['color']">{{ $contributor['initials'] }}</x-avatar>
                            <span class="flex-1 text-sm text-gray-600 dark:text-gray-400">{{ $contributor['name'] }}</span>
                            <span class="text-xs font-medium text-gray-900 dark:text-white">{{ $contributor['count'] }}</span>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</x-layouts-admin>
