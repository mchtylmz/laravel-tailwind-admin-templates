<x-layouts-admin>
    <x-slot:title>Dashboard — Ecommerce</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Ecommerce</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Your online store performance</p>
        </div>
        <x-button size="sm">New Product</x-button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-statscard label="Total Sales" value="$24,780" change="+15.3%" trend="up" color="emerald">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Orders" value="342" change="+8.7%" trend="up" color="indigo">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Conversion" value="3.42%" change="+0.8%" trend="up" color="amber">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg></x-slot:icon>
        </x-statscard>
        <x-statscard label="Avg. Order" value="$72.45" change="+5.2%" trend="up" color="cyan">
            <x-slot:icon><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/></svg></x-slot:icon>
        </x-statscard>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Sales Overview</h2></x-slot:header>
                <div class="h-64 flex items-end gap-2">
                    @php $heights = [30, 50, 40, 70, 45, 85, 60, 78, 55, 92, 68, 48] @endphp
                    @foreach(['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] as $i => $m)
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full rounded-md bg-emerald-500 dark:bg-emerald-400 transition-all" style="height: {{ $heights[$i] }}px"></div>
                            <span class="text-xs text-gray-400">{{ $m }}</span>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Top Products</h2></x-slot:header>
                @foreach([['Wireless Headphones', '$12,450'], ['Smart Watch', '$8,920'], ['Laptop Stand', '$6,340'], ['USB-C Hub', '$4,870'], ['Desk Lamp', '$3,210']] as $product)
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-800 last:border-0">
                        <span class="text-sm text-gray-700 dark:text-gray-300">{{ $product[0] }}</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $product[1] }}</span>
                    </div>
                @endforeach
            </x-card>
        </div>
    </div>

    <x-card>
        <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Orders</h2></x-slot:header>
        <x-table :header="['Order', 'Customer', 'Product', 'Status', 'Total', 'Date']">
            @foreach([
                ['#1245', 'John Doe', 'Wireless Headphones', 'Completed', '$129.99', '2026-06-09'],
                ['#1244', 'Jane Smith', 'Smart Watch', 'Processing', '$249.99', '2026-06-09'],
                ['#1243', 'Bob Johnson', 'Laptop Stand', 'Completed', '$79.99', '2026-06-08'],
                ['#1242', 'Alice Brown', 'USB-C Hub', 'Pending', '$45.99', '2026-06-08'],
                ['#1241', 'Charlie Wilson', 'Desk Lamp', 'Cancelled', '$39.99', '2026-06-07'],
            ] as $order)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    @foreach($order as $i => $cell)
                        <td class="px-4 py-3 text-sm {{ $i === 0 ? 'font-medium text-gray-900 dark:text-white' : ($i === 3 ? ($cell === 'Completed' ? 'text-emerald-600' : ($cell === 'Processing' ? 'text-amber-600' : ($cell === 'Cancelled' ? 'text-red-600' : 'text-gray-500'))) : 'text-gray-500 dark:text-gray-400') }}">
                            {{ $cell }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </x-table>
    </x-card>
</x-layouts-admin>
