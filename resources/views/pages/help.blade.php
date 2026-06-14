<x-layouts-admin>
    <x-slot:title>Help Center</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Help Center']]" />
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Help Center</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Support tickets and help resources</p>
        </div>
        <x-button size="sm">+ New Ticket</x-button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-6">
        @foreach ([
            ['label' => 'Open Tickets', 'value' => '4', 'change' => '+2 today', 'icon' => 'clock', 'color' => 'amber'],
            ['label' => 'Resolved', 'value' => '28', 'change' => 'This month', 'icon' => 'check-circle', 'color' => 'emerald'],
            ['label' => 'Avg Response', 'value' => '2.4h', 'change' => '-15%', 'icon' => 'bolt', 'color' => 'indigo'],
            ['label' => 'Satisfaction', 'value' => '96%', 'change' => '+2.1%', 'icon' => 'star', 'color' => 'purple'],
        ] as $stat)
            <x-statscard :label="$stat['label']" :value="$stat['value']" :change="$stat['change']" :color="$stat['color']">
                <x-slot:icon><x-heroicon-o-{{ $stat['icon'] }} class="w-5 h-5" /></x-slot:icon>
            </x-statscard>
        @endforeach
    </div>

    <x-card>
        <div class="flex items-center gap-2 mb-4">
            <x-input placeholder="Search tickets..." class="max-w-xs" />
            <x-select class="max-w-[140px]">
                <option>All Status</option>
                <option>Open</option>
                <option>In Progress</option>
                <option>Resolved</option>
            </x-select>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-800">
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Ticket</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Subject</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Priority</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Assigned To</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Updated</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-900 dark:text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $tickets = [
                            ['id' => '#TK-1024', 'subject' => 'Cannot access billing portal', 'priority' => 'High', 'priorityColor' => 'red', 'status' => 'Open', 'statusColor' => 'amber', 'assignee' => 'AM', 'color' => 'indigo', 'updated' => '2 hours ago'],
                            ['id' => '#TK-1023', 'subject' => 'API rate limiting issue', 'priority' => 'Medium', 'priorityColor' => 'amber', 'status' => 'In Progress', 'statusColor' => 'blue', 'assignee' => 'SC', 'color' => 'emerald', 'updated' => '5 hours ago'],
                            ['id' => '#TK-1022', 'subject' => 'User import failing', 'priority' => 'High', 'priorityColor' => 'red', 'status' => 'In Progress', 'statusColor' => 'blue', 'assignee' => 'JW', 'color' => 'amber', 'updated' => '1 day ago'],
                            ['id' => '#TK-1021', 'subject' => 'Feature request: dark mode', 'priority' => 'Low', 'priorityColor' => 'gray', 'status' => 'Open', 'statusColor' => 'amber', 'assignee' => '--', 'color' => 'gray', 'updated' => '2 days ago'],
                            ['id' => '#TK-1020', 'subject' => 'Database connection timeout', 'priority' => 'Urgent', 'priorityColor' => 'red', 'status' => 'Resolved', 'statusColor' => 'emerald', 'assignee' => 'ED', 'color' => 'purple', 'updated' => '3 days ago'],
                            ['id' => '#TK-1019', 'subject' => 'Update user permissions', 'priority' => 'Medium', 'priorityColor' => 'amber', 'status' => 'Resolved', 'statusColor' => 'emerald', 'assignee' => 'AD', 'color' => 'indigo', 'updated' => '5 days ago'],
                        ];
                    @endphp
                    @foreach ($tickets as $ticket)
                        <tr class="border-b border-gray-100 dark:border-gray-800/50 hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $ticket['id'] }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $ticket['subject'] }}</td>
                            <td class="px-4 py-3"><x-badge size="sm" :color="$ticket['priorityColor']">{{ $ticket['priority'] }}</x-badge></td>
                            <td class="px-4 py-3"><x-badge size="sm" :color="$ticket['statusColor']">{{ $ticket['status'] }}</x-badge></td>
                            <td class="px-4 py-3">
                                @if ($ticket['assignee'] !== '--')
                                    <x-avatar size="xs" :color="$ticket['color']">{{ $ticket['assignee'] }}</x-avatar>
                                @else
                                    <span class="text-gray-400">Unassigned</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">{{ $ticket['updated'] }}</td>
                            <td class="px-4 py-3 text-right">
                                <x-button variant="ghost" size="xs">View</x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        @foreach ([
            ['icon' => 'book-open', 'title' => 'Documentation', 'desc' => 'Browse our comprehensive guides and API docs'],
            ['icon' => 'chat-bubble-oval-left-ellipsis', 'title' => 'Live Chat', 'desc' => 'Chat with our support team in real-time'],
            ['icon' => 'megaphone', 'title' => 'Announcements', 'desc' => 'Stay updated with the latest product news'],
        ] as $resource)
            <x-card>
                <div class="text-center">
                    <x-heroicon-o-{{ $resource['icon'] }} class="w-8 h-8 mx-auto mb-2 text-indigo-500" />
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-1">{{ $resource['title'] }}</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">{{ $resource['desc'] }}</p>
                    <x-button variant="outline" size="xs">Learn More</x-button>
                </div>
            </x-card>
        @endforeach
    </div>
</x-layouts-admin>
