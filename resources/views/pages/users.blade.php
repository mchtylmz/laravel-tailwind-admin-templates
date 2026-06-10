<x-layouts-admin>
    <x-slot:title>Users</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Users</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage system users ({{ count($users ?? []) }})</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">Export</x-button>
            <x-button size="sm">+ Add User</x-button>
        </div>
    </div>

    <x-card>
        <div class="flex items-center gap-4 mb-4">
            <div class="relative flex-1 max-w-sm">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Search users..." class="w-full pl-10 pr-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
            </div>
            <select class="rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                <option>All Roles</option>
                <option>Admin</option>
                <option>Editor</option>
                <option>User</option>
            </select>
        </div>

        <x-table :header="['Name', 'Email', 'Role', 'Status', 'Joined', 'Actions']">
            @foreach($users ?? [] as $user)
                @php
                    $colorMap = ['indigo', 'emerald', 'blue', 'purple', 'pink', 'red', 'gray'];
                    $color = in_array($user['color'] ?? 'gray', $colorMap) ? $user['color'] : 'gray';
                @endphp
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-semibold
                                @switch($color)
                                    @case('indigo') bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 @break
                                    @case('emerald') bg-emerald-100 dark:bg-emerald-900 text-emerald-700 dark:text-emerald-300 @break
                                    @case('blue') bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 @break
                                    @case('purple') bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 @break
                                    @case('pink') bg-pink-100 dark:bg-pink-900 text-pink-700 dark:text-pink-300 @break
                                    @case('red') bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 @break
                                    @default bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400
                                @endswitch
                            ">{{ substr($user['name'], 0, 2) }}</div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $user['name'] }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">{{ $user['email'] }}</td>
                    <td class="px-4 py-3">
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium
                            @if($user['role'] === 'Admin') bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300
                            @elseif($user['role'] === 'Editor') bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300
                            @else bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 @endif
                        ">
                            {{ $user['role'] }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium
                            @if($user['status'] === 'Active') bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300
                            @else bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 @endif
                        ">
                            {{ $user['status'] }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">{{ $user['joined'] }}</td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2">
                            <x-button variant="ghost" size="sm">Edit</x-button>
                            <x-button variant="ghost" size="sm" class="text-red-600 hover:text-red-700">Delete</x-button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table>

        <div class="flex items-center justify-between mt-4">
            <p class="text-sm text-gray-500">Showing 1 to {{ count($users ?? []) }} of {{ count($users ?? []) }} entries</p>
            <div class="flex gap-1">
                <x-button variant="outline" size="sm" disabled>Previous</x-button>
                <x-button variant="outline" size="sm" disabled>Next</x-button>
            </div>
        </div>
    </x-card>
</x-layouts-admin>
