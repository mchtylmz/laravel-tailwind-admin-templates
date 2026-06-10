<x-layouts-admin>
    <x-slot:title>Settings</x-slot:title>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Settings</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your application settings</p>
    </div>

    <div x-data="tab" class="space-y-6">
        <div class="flex gap-1 border-b border-gray-200 dark:border-gray-800">
            <template x-for="(tab, i) in ['General', 'Password', 'Notifications', 'Security']" :key="i">
                <button @click="set('tab-' + i)" class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors"
                        x-bind:class="active === 'tab-' + i ? 'border-indigo-600 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 hover:text-gray-700 dark:hover:text-gray-300'"
                        x-text="tab"></button>
            </template>
        </div>

        <div x-show="active === 'tab-0'">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">General Settings</h2></x-slot:header>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Site Name</p>
                            <p class="text-xs text-gray-500">The name displayed throughout the admin panel</p>
                        </div>
                        <input type="text" value="Admin Panel" class="w-64 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Language</p>
                            <p class="text-xs text-gray-500">Default application language</p>
                        </div>
                        <select class="w-64 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                            <option>English</option>
                            <option>Turkish</option>
                            <option>German</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Timezone</p>
                            <p class="text-xs text-gray-500">Set your local timezone</p>
                        </div>
                        <select class="w-64 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                            <option>UTC (UTC+0)</option>
                            <option selected>Istanbul (UTC+3)</option>
                            <option>New York (UTC-5)</option>
                        </select>
                    </div>
                </div>
            </x-card>
        </div>

        <div x-show="active === 'tab-1'">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Change Password</h2></x-slot:header>
                <div class="space-y-4 max-w-md">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Current Password</label>
                        <input type="password" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">New Password</label>
                        <input type="password" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm New Password</label>
                        <input type="password" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <x-button>Update Password</x-button>
                </div>
            </x-card>
        </div>

        <div x-show="active === 'tab-2'">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Notification Preferences</h2></x-slot:header>
                <div class="space-y-4">
                    @foreach([
                        ['Email notifications', 'Receive email alerts for important updates', true],
                        ['Push notifications', 'Get push notifications in browser', false],
                        ['Weekly digest', 'Receive weekly summary email', true],
                        ['Marketing emails', 'Receive product updates and offers', false],
                    ] as $setting)
                        <div x-data="toggle({{ $setting[2] ? 'true' : 'false' }})" class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $setting[0] }}</p>
                                <p class="text-xs text-gray-500">{{ $setting[1] }}</p>
                            </div>
                            <button type="button" @click="toggle()" class="relative w-11 h-6 rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500/50"
                                    x-bind:class="on ? 'bg-indigo-600' : 'bg-gray-200 dark:bg-gray-700'" role="switch">
                                <span class="absolute top-0.5 left-0.5 w-5 h-5 rounded-full bg-white shadow-sm transition-transform"
                                      x-bind:class="on ? 'translate-x-5' : ''"></span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>

        <div x-show="active === 'tab-3'">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Security Settings</h2></x-slot:header>
                <div class="space-y-4">
                    <div x-data="toggle(false)" class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Two-Factor Authentication</p>
                            <p class="text-xs text-gray-500">Add an extra layer of security</p>
                        </div>
                        <button type="button" @click="toggle()" class="relative w-11 h-6 rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500/50"
                                x-bind:class="on ? 'bg-indigo-600' : 'bg-gray-200 dark:bg-gray-700'" role="switch">
                            <span class="absolute top-0.5 left-0.5 w-5 h-5 rounded-full bg-white shadow-sm transition-transform"
                                  x-bind:class="on ? 'translate-x-5' : ''"></span>
                        </button>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Active Sessions</p>
                            <p class="text-xs text-gray-500">Current active browser sessions: 2</p>
                        </div>
                        <x-button variant="outline" size="sm">Manage</x-button>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts-admin>
