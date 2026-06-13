<div {{ $attributes->merge(['class' => 'w-full']) }}>
    @if(isset($label) || isset($value))
        <div class="flex items-center justify-between mb-1.5">
            @isset($label)
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $label }}</span>
            @endisset
            @isset($value)
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $value }}{{ $suffix ?? '%' }}</span>
            @endisset
        </div>
    @endif
    <div class="w-full rounded-full overflow-hidden"
         x-bind:class="{
             'h-1.5': '{{ $size ?? 'md' }}' === 'sm',
             'h-2.5': '{{ $size ?? 'md' }}' === 'md',
             'h-4': '{{ $size ?? 'md' }}' === 'lg',
         }"
         x-data="{ percent: 0 }"
         x-init="setTimeout(() => percent = {{ $percent ?? 0 }}, 50)">
        <div class="h-full rounded-full transition-all duration-700 ease-out"
             x-bind:style="'width: ' + percent + '%'"
             x-bind:class="{
                 'bg-indigo-500': '{{ $color ?? 'indigo' }}' === 'indigo',
                 'bg-emerald-500': '{{ $color ?? 'indigo' }}' === 'emerald',
                 'bg-amber-500': '{{ $color ?? 'indigo' }}' === 'amber',
                 'bg-red-500': '{{ $color ?? 'indigo' }}' === 'red',
                 'bg-cyan-500': '{{ $color ?? 'indigo' }}' === 'cyan',
                 'bg-purple-500': '{{ $color ?? 'indigo' }}' === 'purple',
                 'bg-gray-500 dark:bg-gray-400': '{{ $color ?? 'indigo' }}' === 'gray',
             }">
        </div>
    </div>
</div>
