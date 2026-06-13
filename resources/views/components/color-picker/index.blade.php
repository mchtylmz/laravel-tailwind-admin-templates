<div x-data="colorpicker({ value: '{{ $value ?? '#6366f1' }}' })" {{ $attributes->merge(['class' => 'relative']) }}>
    <div class="flex items-center gap-2">
        <button @click="open = !open" class="w-10 h-10 rounded-lg border border-gray-300 dark:border-gray-700 shadow-sm cursor-pointer" x-bind:style="{ backgroundColor: value }"></button>
        <input type="text" x-model="value" @input="validate()" placeholder="#hex"
            class="w-28 px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 font-mono">
        <span class="text-xs text-gray-400" x-text="value.toUpperCase()"></span>
    </div>
    <div x-show="open" @click.outside="close()" x-transition class="absolute top-full left-0 mt-1 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden z-50 p-3 w-64">
        <div class="grid grid-cols-8 gap-1.5 mb-3">
            <template x-for="color in presets" :key="color">
                <button @click="select(color)" class="w-6 h-6 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer hover:scale-110 transition-transform"
                    :class="{ 'ring-2 ring-indigo-500 ring-offset-2 dark:ring-offset-gray-800': value === color }"
                    :style="{ backgroundColor: color }"></button>
            </template>
        </div>
        <div>
            <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Custom</label>
            <input type="color" x-model="value" @input="open = true" class="w-full h-8 rounded-lg border border-gray-300 dark:border-gray-700 cursor-pointer">
        </div>
        <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-200 dark:border-gray-800">
            <button @click="clear()" class="text-xs text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">Reset</button>
            <button @click="close()" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">Done</button>
        </div>
    </div>
</div>
