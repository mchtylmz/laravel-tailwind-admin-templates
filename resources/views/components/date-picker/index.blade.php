<div x-data="datepicker({ value: '{{ $value ?? '' }}' })" {{ $attributes->merge(['class' => 'relative']) }}>
    <div class="relative">
        <x-heroicon-o-calendar-days class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" />
        <input type="text" x-model="display" @focus="open = true" @click="open = !open" readonly
            placeholder="{{ $placeholder ?? 'Select date...' }}"
            class="w-full pl-10 pr-4 py-2.5 text-sm rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 cursor-pointer">
    </div>
    <div x-show="open" @click.outside="close()" x-transition class="absolute top-full left-0 right-0 mt-1 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg overflow-hidden z-50 p-3 w-72">
        <div class="flex items-center justify-between mb-2">
            <button @click="prevMonth()" class="p-1 rounded-lg text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <x-heroicon-o-chevron-left class="w-4 h-4" />
            </button>
            <span class="text-sm font-semibold text-gray-900 dark:text-white" x-text="monthYear"></span>
            <button @click="nextMonth()" class="p-1 rounded-lg text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <x-heroicon-o-chevron-right class="w-4 h-4" />
            </button>
        </div>
        <div class="grid grid-cols-7 gap-0.5 text-center mb-1">
            <template x-for="day in ['Mo','Tu','We','Th','Fr','Sa','Su']" :key="day">
                <span class="text-xs font-medium text-gray-400 py-1" x-text="day"></span>
            </template>
        </div>
        <div class="grid grid-cols-7 gap-0.5">
            <template x-for="(day, i) in days" :key="i">
                <button x-show="day !== 0"
                    @click="selectDay(day)"
                    class="text-sm rounded-lg py-1.5 transition-colors"
                    :class="day === selectedDay && month === currentMonth && year === currentYear
                        ? 'bg-indigo-600 text-white'
                        : day === today && month === todayMonth && year === todayYear
                            ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 font-semibold'
                            : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'"
                    x-text="day !== 0 ? day : ''">
                </button>
            </template>
        </div>
        <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-200 dark:border-gray-800">
            <button @click="clear()" class="text-xs text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">Clear</button>
            <button @click="today()" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">Today</button>
        </div>
    </div>
</div>
