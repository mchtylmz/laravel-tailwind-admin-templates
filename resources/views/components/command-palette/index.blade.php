<div x-data="commandPalette" @keydown.cmd.k.prevent="toggle()" @keydown.ctrl.k.prevent="toggle()" @toggle-cmd-k.window="toggle()">
    <template x-teleport="body">
        <div x-show="open" x-transition.opacity.duration.150 class="fixed inset-0 z-[100] flex items-start justify-center pt-[15vh]"
             @click="close()" @keydown.escape="close()">
            <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm"></div>
            <div @click.stop
                 class="relative w-full max-w-xl rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-2xl overflow-hidden">
                <div class="flex items-center border-b border-gray-200 dark:border-gray-700 px-4">
                    <x-heroicon-o-magnifying-glass class="w-4 h-4 text-gray-400 shrink-0" />
                    <input type="text" id="cmd-palette-input" x-model="query" @input="search()" @keydown.down.prevent="next()" @keydown.up.prevent="prev()" @keydown.enter.prevent="select()"
                        placeholder="Search pages..."
                        class="w-full px-3 py-3.5 text-sm bg-transparent text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none">
                    <kbd class="hidden sm:inline-flex text-[10px] font-medium px-1.5 py-0.5 rounded bg-gray-100 dark:bg-gray-700 text-gray-400">ESC</kbd>
                </div>
                <div class="max-h-80 overflow-y-auto">
                    <template x-if="query && results.length > 0">
                        <div>
                            <div class="px-3 py-1.5 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Pages</div>
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
                    <template x-if="!query">
                        <div>
                            <div class="px-3 py-1.5 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Quick Actions</div>
                            <template x-for="(action, i) in quickActions" :key="action.label">
                                <button @click="action.action()" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                    <span class="text-gray-400 shrink-0" x-html="action.icon"></span>
                                    <span x-text="action.label"></span>
                                </button>
                            </template>
                        </div>
                    </template>
                    <template x-if="query && results.length === 0">
                        <div class="px-4 py-8 text-center text-sm text-gray-400">
                            No results for "<span x-text="query" class="text-gray-600 dark:text-gray-300"></span>"
                        </div>
                    </template>
                </div>
                <div class="flex items-center gap-4 px-4 py-2 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 text-[11px] text-gray-400">
                    <span><kbd class="px-1 py-0.5 rounded bg-gray-200 dark:bg-gray-700 font-medium">↑↓</kbd> navigate</span>
                    <span><kbd class="px-1 py-0.5 rounded bg-gray-200 dark:bg-gray-700 font-medium">↵</kbd> select</span>
                    <span><kbd class="px-1 py-0.5 rounded bg-gray-200 dark:bg-gray-700 font-medium">ESC</kbd> close</span>
                </div>
            </div>
        </div>
    </template>
</div>
