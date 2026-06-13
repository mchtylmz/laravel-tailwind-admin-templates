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
            <x-slot:icon><x-heroicon-o-user-group class="w-5 h-5" /></x-slot:icon>
        </x-statscard>
        <x-statscard label="Revenue" value="$48,250" change="+8.3%" trend="up" color="emerald">
            <x-slot:icon><x-heroicon-o-banknotes class="w-5 h-5" /></x-slot:icon>
        </x-statscard>
        <x-statscard label="Tasks" value="24" change="-3 overdue" trend="down" color="rose">
            <x-slot:icon><x-heroicon-o-shopping-bag class="w-5 h-5" /></x-slot:icon>
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
