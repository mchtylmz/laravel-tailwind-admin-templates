<x-layouts-admin>
    <x-slot:title>Dashboard — Project Management</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Projects</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your team projects</p>
        </div>
        <x-button size="sm">+ New Project</x-button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-statscard label="Active Projects" value="12" change="+2 this month" trend="up" color="indigo">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="In Progress" value="8" change="+3 this week" trend="up" color="amber">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Completed" value="24" change="+5 this month" trend="up" color="emerald">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Team Members" value="18" change="+1 this month" trend="up" color="cyan">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg></x-slot:icon>
        </x-statscard>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Active Projects</h2></x-slot:header>
            <div class="space-y-4">
                @foreach([
                    ['Website Redesign', '65%', '#22c55e', '5 days left'],
                    ['Mobile App v2', '40%', '#f59e0b', '12 days left'],
                    ['API Integration', '80%', '#3b82f6', '3 days left'],
                    ['Data Migration', '25%', '#ef4444', '20 days left'],
                ] as $project)
                    <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $project[0] }}</h3>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $project[3] }}</span>
                        </div>
                        <div class="w-full h-2 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                            <div class="h-full rounded-full" style="width: {{ $project[1] }}; background-color: {{ $project[2] }}"></div>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">{{ $project[1] }} complete</p>
                    </div>
                @endforeach
            </div>
        </x-card>
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Team Tasks</h2></x-slot:header>
            <div class="space-y-3">
                @foreach([
                    ['Design home page', 'Alex', 'high'],
                    ['Fix login bug', 'Sarah', 'high'],
                    ['Write API docs', 'Mike', 'medium'],
                    ['Update dependencies', 'Anna', 'low'],
                    ['Test payment flow', 'John', 'medium'],
                ] as $task)
                    <div class="flex items-center gap-3">
                        <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500">
                        <div class="flex-1">
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $task[0] }}</p>
                            <p class="text-xs text-gray-400">{{ $task[1] }}</p>
                        </div>
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium {{ $task[2] === 'high' ? 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300' : ($task[2] === 'medium' ? 'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300' : 'bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400') }}">
                            {{ $task[2] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>

    <x-card>
        <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Project Timeline</h2></x-slot:header>
        <div class="space-y-4">
            @foreach([
                ['Q1 2026 Planning', 'Completed', '2026-01-15', 'bg-emerald-500'],
                ['Design Phase', 'Completed', '2026-02-28', 'bg-emerald-500'],
                ['Development Sprint 1', 'In Progress', '2026-04-01', 'bg-amber-500'],
                ['Development Sprint 2', 'Upcoming', '2026-06-01', 'bg-gray-300 dark:bg-gray-600'],
                ['Testing', 'Upcoming', '2026-07-15', 'bg-gray-300 dark:bg-gray-600'],
                ['Launch', 'Upcoming', '2026-08-01', 'bg-gray-300 dark:bg-gray-600'],
            ] as $milestone)
                <div class="flex items-start gap-3">
                    <div class="flex flex-col items-center">
                        <div class="w-3 h-3 rounded-full {{ $milestone[3] }}"></div>
                        <div class="w-0.5 h-8 bg-gray-200 dark:bg-gray-700"></div>
                    </div>
                    <div class="flex-1 pb-4">
                        <div class="flex items-center justify-between">
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $milestone[0] }}</h4>
                            <span class="text-xs {{ $milestone[1] === 'Completed' ? 'text-emerald-600' : ($milestone[1] === 'In Progress' ? 'text-amber-600' : 'text-gray-400') }}">{{ $milestone[1] }}</span>
                        </div>
                        <p class="text-xs text-gray-500">{{ $milestone[2] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layouts-admin>
