<x-layouts-admin>
    <x-slot:title>Dashboard — Minimal</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Minimal Dashboard</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Clean and simple overview</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <x-statscard label="Users" value="2,847" change="+12.5%" trend="up" color="indigo">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Revenue" value="$48,250" change="+8.3%" trend="up" color="emerald">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Tasks" value="24" change="-3 overdue" trend="down" color="rose">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></x-slot:icon>
        </x-statscard>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Weekly Progress</h2></x-slot:header>
            <div class="space-y-4">
                @foreach([['Design', 85, '#8b5cf6'], ['Development', 60, '#3b82f6'], ['Testing', 40, '#22c55e'], ['Deployment', 20, '#f59e0b']] as $item)
                    <div>
                        <div class="flex items-center justify-between text-sm mb-1">
                            <span class="text-gray-700 dark:text-gray-300">{{ $item[0] }}</span>
                            <span class="text-gray-500 dark:text-gray-400">{{ $item[1] }}%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                            <div class="h-full rounded-full" style="width: {{ $item[1] }}%; background-color: {{ $item[2] }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Updates</h2></x-slot:header>
            <div class="space-y-4">
                @foreach([
                    ['New team member joined', '5 min ago'],
                    ['Project milestone reached', '1 hour ago'],
                    ['Server maintenance scheduled', '3 hours ago'],
                    ['New feature deployed', '6 hours ago'],
                    ['Weekly report generated', '1 day ago'],
                ] as $update)
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 mt-2 rounded-full bg-indigo-500 flex-shrink-0"></div>
                        <div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $update[0] }}</p>
                            <p class="text-xs text-gray-500">{{ $update[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-400">A minimal dashboard with essential metrics.</p>
    </div>
</x-layouts-admin>
