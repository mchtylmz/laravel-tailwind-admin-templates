<x-layouts-admin>
    <x-slot:title>Dashboard — CRM</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">CRM</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Customer relationship management</p>
        </div>
        <x-button size="sm">+ Add Customer</x-button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-statscard label="Total Customers" value="1,482" change="+12 this month" trend="up" color="indigo">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Leads" value="237" change="+18 new" trend="up" color="amber">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Opportunities" value="$128k" change="+$12k" trend="up" color="emerald">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Conversion" value="24.8%" change="+2.3%" trend="up" color="cyan">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg></x-slot:icon>
        </x-statscard>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Sales Pipeline</h2></x-slot:header>
                <div class="space-y-4">
                    @foreach([
                        ['Qualified', 45, '#3b82f6'],
                        ['Proposal', 28, '#8b5cf6'],
                        ['Negotiation', 18, '#f59e0b'],
                        ['Closed Won', 32, '#22c55e'],
                        ['Closed Lost', 12, '#ef4444'],
                    ] as $stage)
                        <div>
                            <div class="flex items-center justify-between text-sm mb-1">
                                <span class="text-gray-700 dark:text-gray-300">{{ $stage[0] }}</span>
                                <span class="text-gray-500 dark:text-gray-400">{{ $stage[1] }}</span>
                            </div>
                            <div class="w-full h-2.5 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full rounded-full" style="width: {{ $stage[1] }}%; background-color: {{ $stage[2] }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Leads</h2></x-slot:header>
                @foreach([
                    ['Acme Corp', '$12,000', 'Qualified'],
                    ['Globex Inc', '$8,500', 'Proposal'],
                    ['Initech', '$15,000', 'Negotiation'],
                    ['Umbrella Co', '$6,200', 'Qualified'],
                ] as $lead)
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-800 last:border-0">
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $lead[0] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $lead[2] }}</p>
                        </div>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $lead[1] }}</span>
                    </div>
                @endforeach
            </x-card>
        </div>
    </div>

    <x-card>
        <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Top Customers</h2></x-slot:header>
        <x-table :header="['Name', 'Email', 'Plan', 'Status', 'Revenue', 'Joined']">
            @foreach([
                ['John Doe', 'john@example.com', 'Enterprise', 'Active', '$12,450', 'Jan 2024'],
                ['Jane Smith', 'jane@example.com', 'Professional', 'Active', '$8,920', 'Mar 2024'],
                ['Bob Johnson', 'bob@example.com', 'Enterprise', 'Active', '$7,340', 'Feb 2024'],
                ['Alice Brown', 'alice@example.com', 'Starter', 'Inactive', '$3,210', 'Jun 2024'],
                ['Charlie Wilson', 'charlie@example.com', 'Professional', 'Active', '$5,870', 'Apr 2024'],
            ] as $customer)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    @foreach($customer as $i => $cell)
                        <td class="px-4 py-3 text-sm {{ $i === 0 ? 'font-medium text-gray-900 dark:text-white' : ($i === 3 ? ($cell === 'Active' ? 'text-emerald-600' : 'text-red-600') : 'text-gray-500 dark:text-gray-400') }}">
                            {{ $cell }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </x-table>
    </x-card>
</x-layouts-admin>
