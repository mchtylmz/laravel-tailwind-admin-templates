<nav class="sticky top-0 z-10 flex items-center h-16 gap-4 px-4 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
    <button @click="$store.sidebar.toggle()" class="lg:hidden p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
        <x-heroicon-o-bars-3 class="w-5 h-5" />
    </button>
    <div class="flex-1">
        <div class="relative max-w-md">
            <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" />
            <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
        </div>
    </div>
    <div class="flex items-center gap-2">
        <button class="relative p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
            <x-heroicon-o-bell class="w-5 h-5" />
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-red-500"></span>
        </button>
        <button @click="$store.darkMode.toggle()" class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
            <x-heroicon-o-moon x-show="!$store.darkMode.dark" class="w-5 h-5" />
            <x-heroicon-o-sun x-show="$store.darkMode.dark" class="w-5 h-5" />
        </button>
        <div class="h-6 w-px bg-gray-200 dark:bg-gray-700 mx-1"></div>
        <div x-data="dropdown" class="relative">
            <button @click="toggle()" class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-700 dark:text-indigo-300 text-sm font-semibold">AD</div>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 hidden sm:block">Admin</span>
                <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400" />
            </button>
            <div x-show="open" @click.outside="close()" x-transition class="absolute right-0 mt-2 w-48 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg py-1">
                <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                <a href="{{ url('/settings') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>
                <hr class="my-1 border-gray-200 dark:border-gray-700">
                <a href="{{ url('/login') }}" class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">Sign out</a>
            </div>
        </div>
    </div>
</nav>
