<div x-data="drawer({ side: '{{ $side ?? 'right' }}' })">
    <div x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-gray-900/50" @click="close"></div>
    <div x-show="open"
         x-transition:enter="transition-transform duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition-transform duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed inset-y-0 right-0 z-50 w-80 max-w-full bg-white dark:bg-gray-900 shadow-xl border-l border-gray-200 dark:border-gray-800"
         {{ $attributes }}>
        <div class="flex items-center justify-between px-4 h-14 border-b border-gray-200 dark:border-gray-800">
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ $title ?? 'Drawer' }}</h3>
            <button @click="close" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <x-heroicon-o-x-mark class="w-5 h-5" />
            </button>
        </div>
        <div class="p-4 overflow-y-auto h-[calc(100%-3.5rem)]">
            {{ $slot }}
        </div>
    </div>
</div>
