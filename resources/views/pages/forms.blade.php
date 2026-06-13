<x-layouts-admin>
    <x-slot:title>Forms</x-slot:title>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Forms</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Form elements showcase</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Input Fields</h2></x-slot:header>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Text Input</label>
                    <input type="text" placeholder="Enter text..." class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" placeholder="email@example.com" class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input type="password" placeholder="••••••••" class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Textarea</label>
                    <textarea rows="3" placeholder="Enter description..." class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select</label>
                    <select class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
            </div>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Input Variations</h2></x-slot:header>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">With Icon</label>
                    <div class="relative">
                        <x-heroicon-o-envelope class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" />
                        <input type="email" placeholder="email@example.com" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Error State</label>
                    <input type="text" value="Invalid value" class="w-full rounded-xl border border-red-300 dark:border-red-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-red-900 dark:text-red-100 focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500">
                    <p class="mt-1 text-xs text-red-600">This field is required.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Disabled</label>
                    <input type="text" value="Disabled field" disabled class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 px-3 py-2.5 text-sm text-gray-400 dark:text-gray-500 cursor-not-allowed">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">With Help Text</label>
                    <input type="text" placeholder="Enter username" class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    <p class="mt-1 text-xs text-gray-500">Must be at least 3 characters.</p>
                </div>
            </div>
        </x-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Checkboxes & Radios</h2></x-slot:header>
            <div class="space-y-4">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Checkboxes</p>
                @foreach(['Option A', 'Option B', 'Option C'] as $i => $opt)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" {{ $i === 0 ? 'checked' : '' }} class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">{{ $opt }}</span>
                    </label>
                @endforeach
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Radio Buttons</p>
                @foreach(['Yes', 'No', 'Maybe'] as $i => $opt)
                    <label class="flex items-center gap-2">
                        <input type="radio" name="radio-group" {{ $i === 0 ? 'checked' : '' }} class="border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">{{ $opt }}</span>
                    </label>
                @endforeach
            </div>
        </x-card>
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Toggle Switches</h2></x-slot:header>
            <div class="space-y-4">
                @foreach([
                    ['Notifications', true],
                    ['Dark Mode', false],
                    ['Auto Save', true],
                    ['Two-Factor Auth', false],
                ] as $switch)
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-700 dark:text-gray-300">{{ $switch[0] }}</span>
                        <button type="button" class="relative w-11 h-6 rounded-full transition-colors {{ $switch[1] ? 'bg-indigo-600' : 'bg-gray-200 dark:bg-gray-700' }}" role="switch">
                            <span class="absolute top-0.5 left-0.5 w-5 h-5 rounded-full bg-white shadow-sm transition-transform {{ $switch[1] ? 'translate-x-5' : '' }}"></span>
                        </button>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>

    <div class="mt-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Form Layout Example</h2></x-slot:header>
            <form class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">First Name</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last Name</label>
                        <input type="text" class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                    <textarea rows="3" class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500"></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <x-button variant="outline">Cancel</x-button>
                    <x-button>Submit</x-button>
                </div>
            </form>
        </x-card>
    </div>
</x-layouts-admin>
