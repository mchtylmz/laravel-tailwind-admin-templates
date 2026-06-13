<x-layouts-admin>
    <x-slot:title>Kanban Board</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Kanban Board']]" />
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Kanban Board</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your project tasks</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">Manage Labels</x-button>
            <x-button size="sm">+ Add Task</x-button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" x-data="kanbanBoard">
        @php
            $columns = [
                ['key' => 'backlog', 'label' => 'Backlog', 'color' => 'gray', 'tasks' => [
                    ['title' => 'Design new landing page', 'desc' => 'Create wireframes for the new marketing site', 'priority' => 'low', 'assignee' => 'AD', 'comments' => 3],
                    ['title' => 'Research competitor products', 'desc' => 'Analyze top 5 competitors', 'priority' => 'medium', 'assignee' => 'SC', 'comments' => 1],
                    ['title' => 'Set up CI/CD pipeline', 'desc' => 'Configure GitHub Actions for automated deployment', 'priority' => 'high', 'assignee' => 'JW', 'comments' => 5],
                ]],
                ['key' => 'in-progress', 'label' => 'In Progress', 'color' => 'blue', 'tasks' => [
                    ['title' => 'User authentication module', 'desc' => 'Implement OAuth2 and JWT token management', 'priority' => 'high', 'assignee' => 'AD', 'comments' => 8],
                    ['title' => 'API rate limiting', 'desc' => 'Add rate limiting middleware to protect endpoints', 'priority' => 'medium', 'assignee' => 'ED', 'comments' => 2],
                ]],
                ['key' => 'review', 'label' => 'Review', 'color' => 'amber', 'tasks' => [
                    ['title' => 'Refactor database queries', 'desc' => 'Optimize N+1 queries in the reporting module', 'priority' => 'high', 'assignee' => 'MB', 'comments' => 4],
                    ['title' => 'Update documentation', 'desc' => 'API docs for v2 endpoints', 'priority' => 'low', 'assignee' => 'SC', 'comments' => 0],
                ]],
                ['key' => 'done', 'label' => 'Done', 'color' => 'emerald', 'tasks' => [
                    ['title' => 'Dashboard redesign', 'desc' => 'New analytics dashboard with real-time data', 'priority' => 'high', 'assignee' => 'AD', 'comments' => 6],
                    ['title' => 'Email notification system', 'desc' => 'Transactional emails with SendGrid integration', 'priority' => 'medium', 'assignee' => 'JW', 'comments' => 3],
                    ['title' => 'Database backup automation', 'desc' => 'Automated daily backups with 30-day retention', 'priority' => 'low', 'assignee' => 'ED', 'comments' => 1],
                ]],
            ];
        @endphp

        @foreach ($columns as $column)
            <div>
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-{{ $column['color'] }}-500"></span>
                        <h3 class="font-semibold text-gray-900 dark:text-white text-sm">{{ $column['label'] }}</h3>
                        <span class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded-full">{{ count($column['tasks']) }}</span>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                        <x-heroicon-o-ellipsis-horizontal class="w-4 h-4" />
                    </button>
                </div>
                <div class="space-y-3 min-h-[200px]">
                    @foreach ($column['tasks'] as $task)
                        <div class="bg-white dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-800 p-3 shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                            <div class="flex items-start justify-between mb-2">
                                <span @class([
                                    'text-xs font-medium px-1.5 py-0.5 rounded',
                                    'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300' => $task['priority'] === 'high',
                                    'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300' => $task['priority'] === 'medium',
                                    'bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400' => $task['priority'] === 'low',
                                ])>{{ ucfirst($task['priority']) }}</span>
                                <button class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                    <x-heroicon-o-pencil-square class="w-3.5 h-3.5" />
                                </button>
                            </div>
                            <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-1">{{ $task['title'] }}</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">{{ $task['desc'] }}</p>
                            <div class="flex items-center justify-between">
                                <x-avatar size="xs" color="indigo">{{ $task['assignee'] }}</x-avatar>
                                <div class="flex items-center gap-2 text-xs text-gray-400 dark:text-gray-500">
                                    <x-heroicon-o-chat-bubble-oval-left-ellipsis class="w-3.5 h-3.5" />
                                    <span>{{ $task['comments'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('kanbanBoard', () => ({
                init() {
                    // Kanban drag & drop logic can be added here
                }
            }))
        })
    </script>
</x-layouts-admin>
