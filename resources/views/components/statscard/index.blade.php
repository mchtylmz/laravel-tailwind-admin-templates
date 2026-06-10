<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-5 shadow-sm']) }}>
    <div class="flex items-center justify-between mb-3">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $label ?? '' }}</p>
        @isset($icon)
            <div class="w-10 h-10 rounded-lg flex items-center justify-center"
                 x-bind:class="{
                     'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400': '{{ $color ?? 'indigo' }}' === 'indigo',
                     'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400': '{{ $color ?? 'indigo' }}' === 'emerald',
                     'bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400': '{{ $color ?? 'indigo' }}' === 'amber',
                     'bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400': '{{ $color ?? 'indigo' }}' === 'rose',
                     'bg-cyan-50 dark:bg-cyan-900/30 text-cyan-600 dark:text-cyan-400': '{{ $color ?? 'indigo' }}' === 'cyan',
                 }">
                {{ $icon }}
            </div>
        @endisset
    </div>
    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $value ?? '' }}</p>
    @isset($change)
        <p class="mt-1 text-sm" x-bind:class="{
            'text-emerald-600 dark:text-emerald-400': '{{ $trend ?? 'up' }}' === 'up',
            'text-red-600 dark:text-red-400': '{{ $trend ?? 'up' }}' === 'down',
        }">{{ $change }}</p>
    @endisset
</div>
