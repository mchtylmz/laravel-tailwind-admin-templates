<x-layouts-admin>
    <x-slot:title>Users</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Users</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage system users</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">Export</x-button>
            <x-button size="sm">+ Add User</x-button>
        </div>
    </div>

    <x-card>
        <x-datatable
            :rows="$users"
            :columns="[
                ['label' => 'Name', 'key' => 'name'],
                ['label' => 'Email', 'key' => 'email'],
                ['label' => 'Role', 'key' => 'role'],
                ['label' => 'Status', 'key' => 'status'],
                ['label' => 'Joined', 'key' => 'joined'],
                ['label' => 'Actions', 'key' => 'actions', 'sortable' => false],
            ]"
            :per-page="5"
        />
    </x-card>
</x-layouts-admin>
