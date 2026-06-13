<div x-data="searchStore" class="relative max-w-md w-full" @keydown.down.prevent="next()" @keydown.up.prevent="prev()" @keydown.enter.prevent="select()" @keydown.escape="close()">
    <x-heroicon-o-magnifying-glass class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" />
    <input type="text" x-model="query" @input="search()" @focus="open = true" placeholder="Search pages..." class="w-full pl-10 pr-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
    <div x-show="open && query.length > 0" @click.outside="close()" x-transition class="absolute top-full left-0 right-0 mt-1 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden z-50">
        <template x-if="results.length > 0">
            <div>
                <template x-for="(r, i) in results" :key="r.url">
                    <a :href="r.url" class="flex items-center gap-3 px-4 py-2.5 text-sm transition-colors"
                        :class="i === activeIndex ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                        @mouseenter="activeIndex = i">
                        <span class="text-gray-400 shrink-0" x-html="r.icon"></span>
                        <span class="font-medium" x-text="r.title"></span>
                        <span class="ml-auto text-xs text-gray-400" x-text="r.badge"></span>
                    </a>
                </template>
            </div>
        </template>
        <template x-if="results.length === 0">
            <div class="px-4 py-6 text-center text-sm text-gray-400">No results found for "<span x-text="query"></span>"</div>
        </template>
    </div>
</div>
