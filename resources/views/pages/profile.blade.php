<x-layouts-admin>
    <x-slot:title>Profile</x-slot:title>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Profile</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your profile information</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div>
            <x-card>
                <div class="text-center">
                    <div class="w-24 h-24 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-700 dark:text-indigo-300 text-3xl font-bold mx-auto mb-4">AD</div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Admin User</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Administrator</p>
                    <x-button variant="outline" size="sm" class="mt-4">Change Photo</x-button>
                </div>
            </x-card>
        </div>
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Personal Information</h2></x-slot:header>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">First Name</label>
                        <input type="text" value="Admin" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last Name</label>
                        <input type="text" value="User" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" value="admin@example.com" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                        <input type="text" value="+1 (555) 123-4567" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bio</label>
                        <textarea rows="3" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">Full-stack developer and open source enthusiast.</textarea>
                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <x-button>Save Changes</x-button>
                </div>
            </x-card>
        </div>
    </div>

    <div class="mt-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Activity</h2></x-slot:header>
            <div class="space-y-3">
                @foreach([
                    ['Updated profile picture', '2 hours ago'],
                    ['Changed password', '1 day ago'],
                    ['Logged in from new device', '3 days ago'],
                    ['Updated email settings', '1 week ago'],
                ] as $activity)
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 mt-2 rounded-full bg-indigo-500 flex-shrink-0"></div>
                        <div>
                            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $activity[0] }}</p>
                            <p class="text-xs text-gray-500">{{ $activity[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
    </div>
</x-layouts-admin>
