<div x-data="notificationStore" class="relative">
    <button @click="toggle()" class="relative p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
        <x-heroicon-o-bell class="w-5 h-5" />
        <span x-show="unreadCount > 0" class="absolute top-1.5 right-1.5 w-4 h-4 rounded-full bg-red-500 text-white text-[10px] font-bold flex items-center justify-center" x-text="unreadCount"></span>
    </button>
    <div x-show="open" @click.outside="close()" x-transition class="absolute right-0 mt-2 w-80 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-gray-800">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Notifications</h3>
            <button @click="markAllRead()" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">Mark all read</button>
        </div>
        <div class="max-h-72 overflow-y-auto divide-y divide-gray-100 dark:divide-gray-800">
            <template x-for="(notif, i) in notifications" :key="notif.id">
                <button @click="markRead(notif.id)" class="w-full text-left px-4 py-3 transition-colors"
                    :class="notif.read ? 'bg-white dark:bg-gray-800' : 'bg-indigo-50/50 dark:bg-indigo-900/10'">
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 mt-1.5 rounded-full flex-shrink-0"
                            :class="notif.read ? 'bg-transparent' : 'bg-indigo-500'"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate" x-text="notif.title"></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 line-clamp-2" x-text="notif.message"></p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1" x-text="notif.time"></p>
                        </div>
                        <x-heroicon-o-x-mark class="w-3.5 h-3.5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 shrink-0 mt-0.5" @click.stop="remove(notif.id)" />
                    </div>
                </button>
            </template>
        </div>
        <template x-if="notifications.length === 0">
            <div class="px-4 py-8 text-center text-sm text-gray-400">No notifications</div>
        </template>
        <a href="#" class="block px-4 py-2.5 text-center text-sm text-indigo-600 dark:text-indigo-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 border-t border-gray-200 dark:border-gray-800 font-medium">
            View all notifications
        </a>
    </div>
</div>
