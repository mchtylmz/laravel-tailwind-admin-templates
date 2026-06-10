<x-layouts-admin>
    <x-slot:title>Components</x-slot:title>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Components</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">UI component showcase</p>
    </div>

    <div class="space-y-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Buttons</h2></x-slot:header>
            <div class="flex flex-wrap gap-3 items-center">
                <x-button variant="primary">Primary</x-button>
                <x-button variant="secondary">Secondary</x-button>
                <x-button variant="success">Success</x-button>
                <x-button variant="danger">Danger</x-button>
                <x-button variant="warning">Warning</x-button>
                <x-button variant="outline">Outline</x-button>
                <x-button variant="ghost">Ghost</x-button>
            </div>
            <div class="flex flex-wrap gap-3 items-center mt-4">
                <x-button size="sm">Small</x-button>
                <x-button size="md">Medium</x-button>
                <x-button size="lg">Large</x-button>
                <x-button size="xl">Extra Large</x-button>
            </div>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Alerts</h2></x-slot:header>
            <div class="space-y-3">
                <x-alert type="success">Your changes have been saved successfully.</x-alert>
                <x-alert type="danger">There was an error processing your request.</x-alert>
                <x-alert type="warning">Your session will expire in 5 minutes.</x-alert>
                <x-alert type="info">A new version is available. Please update.</x-alert>
            </div>
        </x-card>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Cards</h2></x-slot:header>
                <div class="grid grid-cols-1 gap-4">
                    <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Hover Card</h3>
                        <p class="text-xs text-gray-500 mt-1">This card has hover shadow effect.</p>
                    </div>
                    <div class="p-4 rounded-lg bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800">
                        <h3 class="text-sm font-semibold text-indigo-900 dark:text-indigo-200">Highlighted Card</h3>
                        <p class="text-xs text-indigo-700 dark:text-indigo-300 mt-1">This card has a colored background.</p>
                    </div>
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Modals</h2></x-slot:header>
                <div class="space-y-3">
                    <div x-data="modal()">
                        <x-button @click="open = true">Open Small Modal</x-button>
                        <div x-show="open" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50" @click="open = false">
                            <div @click.stop class="bg-white dark:bg-gray-900 rounded-xl shadow-xl border border-gray-200 dark:border-gray-800 w-full max-w-sm p-6 text-center">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Modal Title</h3>
                                <p class="text-sm text-gray-500 mb-4">This is a small modal dialog.</p>
                                <x-button @click="open = false">Close</x-button>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Click the button to open a modal example (interactive).</p>
                </div>
            </x-card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Tabs</h2></x-slot:header>
                <div x-data="tab">
                    <div class="flex border-b border-gray-200 dark:border-gray-800 gap-1">
                        @foreach(['Tab 1', 'Tab 2', 'Tab 3'] as $i => $t)
                            <button @click="set('tab-' + {{ $i }})" class="px-4 py-2 text-sm font-medium border-b-2 transition-colors"
                                    x-bind:class="active === 'tab-' + {{ $i }} ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700'">{{ $t }}</button>
                        @endforeach
                    </div>
                    @foreach(['First tab content', 'Second tab content', 'Third tab content'] as $i => $content)
                        <div x-show="active === 'tab-' + {{ $i }}" class="mt-4 text-sm text-gray-600 dark:text-gray-400">{{ $content }}</div>
                    @endforeach
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Dropdowns</h2></x-slot:header>
                <div class="flex gap-2">
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button variant="outline">Actions ▾</x-button>
                        </x-slot:trigger>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Edit</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Duplicate</a>
                        <hr class="my-1 border-gray-200 dark:border-gray-700">
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">Delete</a>
                    </x-dropdown>
                    <p class="text-xs text-gray-500 self-center">Click to toggle dropdown</p>
                </div>
            </x-card>
        </div>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Empty State</h2></x-slot:header>
            <x-emptystate title="No results found" description="Try adjusting your search or filter to find what you're looking for.">
                <x-slot:icon>
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                </x-slot:icon>
                <x-slot:action>
                    <x-button variant="outline" size="sm">Clear Filters</x-button>
                </x-slot:action>
            </x-emptystate>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Table</h2></x-slot:header>
            <x-table :header="['Name', 'Email', 'Status']">
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">John Doe</td>
                    <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">john@example.com</td>
                    <td class="px-4 py-3"><span class="text-xs px-2 py-0.5 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300">Active</span></td>
                </tr>
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">Jane Smith</td>
                    <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">jane@example.com</td>
                    <td class="px-4 py-3"><span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400">Inactive</span></td>
                </tr>
            </x-table>
        </x-card>
    </div>
</x-layouts-admin>
