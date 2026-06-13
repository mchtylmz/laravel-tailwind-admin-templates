<x-layouts-admin>
    <x-slot:title>Invoices</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Invoices']]" />
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Invoices</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage and track invoices</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">Export CSV</x-button>
            <x-button size="sm">+ Create Invoice</x-button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        @foreach ([
            ['label' => 'Total Invoices', 'value' => '156', 'change' => '+12 this month', 'icon' => 'document-text', 'color' => 'indigo'],
            ['label' => 'Paid', 'value' => '$48,250', 'change' => '+8.4%', 'icon' => 'check-circle', 'color' => 'emerald'],
            ['label' => 'Pending', 'value' => '$12,400', 'change' => '5 invoices', 'icon' => 'clock', 'color' => 'amber'],
            ['label' => 'Overdue', 'value' => '$3,200', 'change' => '2 invoices', 'icon' => 'exclamation-circle', 'color' => 'red'],
        ] as $stat)
            <x-statscard :label="$stat['label']" :value="$stat['value']" :change="$stat['change']" :color="$stat['color']">
                <x-slot:icon>
                    <x-heroicon-o-{{ $stat['icon'] }} class="w-5 h-5" />
                </x-slot:icon>
            </x-statscard>
        @endforeach
    </div>

    <x-card>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-800">
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Invoice</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Client</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Amount</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-900 dark:text-white">Date</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-900 dark:text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $invoices = [
                            ['id' => 'INV-001', 'client' => 'Acme Corp', 'amount' => '$2,450.00', 'status' => 'Paid', 'statusColor' => 'emerald', 'date' => 'Jun 10, 2026'],
                            ['id' => 'INV-002', 'client' => 'TechStart Inc', 'amount' => '$4,800.00', 'status' => 'Pending', 'statusColor' => 'amber', 'date' => 'Jun 8, 2026'],
                            ['id' => 'INV-003', 'client' => 'DesignLab', 'amount' => '$1,200.00', 'status' => 'Overdue', 'statusColor' => 'red', 'date' => 'May 25, 2026'],
                            ['id' => 'INV-004', 'client' => 'CloudBase', 'amount' => '$3,600.00', 'status' => 'Paid', 'statusColor' => 'emerald', 'date' => 'May 20, 2026'],
                            ['id' => 'INV-005', 'client' => 'DataFlow', 'amount' => '$5,500.00', 'status' => 'Pending', 'statusColor' => 'amber', 'date' => 'May 15, 2026'],
                            ['id' => 'INV-006', 'client' => 'Webify', 'amount' => '$950.00', 'status' => 'Paid', 'statusColor' => 'emerald', 'date' => 'May 12, 2026'],
                            ['id' => 'INV-007', 'client' => 'NexGen', 'amount' => '$8,200.00', 'status' => 'Draft', 'statusColor' => 'gray', 'date' => 'May 10, 2026'],
                            ['id' => 'INV-008', 'client' => 'PixelWorks', 'amount' => '$2,100.00', 'status' => 'Overdue', 'statusColor' => 'red', 'date' => 'Apr 28, 2026'],
                        ];
                    @endphp
                    @foreach ($invoices as $inv)
                        <tr class="border-b border-gray-100 dark:border-gray-800/50 hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $inv['id'] }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $inv['client'] }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $inv['amount'] }}</td>
                            <td class="px-4 py-3">
                                <x-badge :color="$inv['statusColor']" size="sm">{{ $inv['status'] }}</x-badge>
                            </td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ $inv['date'] }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <x-button variant="ghost" size="xs">View</x-button>
                                    <x-button variant="ghost" size="xs">
                                        <x-heroicon-o-arrow-down-tray class="w-4 h-4" />
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>
</x-layouts-admin>
