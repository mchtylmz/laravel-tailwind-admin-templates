<div x-data="treeselect({ items: {{ json_encode($items) ?? '[]' }} })" class="relative">
    <div class="relative">
        <div @click="open = !open" class="w-full min-h-[42px] px-3 py-2 text-sm rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 cursor-pointer flex flex-wrap gap-1">
            <template x-for="s in selected" :key="s.value">
                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 text-xs font-medium">
                    <span x-text="s.label"></span>
                    <button @click.stop="remove(s.value)" class="hover:text-indigo-900 dark:hover:text-indigo-100">
                        <x-heroicon-o-x-mark class="w-3 h-3" />
                    </button>
                </span>
            </template>
            <span x-show="selected.length === 0" class="text-gray-400">{{ $placeholder ?? 'Select items...' }}</span>
        </div>
        <x-heroicon-o-chevron-down class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" />
    </div>
    <div x-show="open" @click.outside="close()" x-transition class="absolute top-full left-0 right-0 mt-1 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden z-50 max-h-60 overflow-y-auto">
        <template x-for="item in flatItems" :key="item.value">
            <button @click="toggle(item)" class="w-full flex items-center gap-2 px-4 py-2 text-sm transition-colors"
                :class="isSelected(item.value) ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                :style="{ paddingLeft: (item.depth * 4 + 16) + 'px' }">
                <span x-show="item.children" class="text-gray-400 transition-transform" :class="{ 'rotate-90': item.open }">
                    <x-heroicon-o-chevron-right class="w-3 h-3" />
                </span>
                <span x-show="!item.children" class="w-3 h-3 rounded border-2 shrink-0"
                    :class="isSelected(item.value) ? 'bg-indigo-600 border-indigo-600' : 'border-gray-300 dark:border-gray-600'">
                </span>
                <span x-text="item.label"></span>
            </button>
        </template>
    </div>
</div>
