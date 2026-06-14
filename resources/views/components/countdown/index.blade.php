<div x-data="countdown({ target: '{{ $target }}', label: '{{ $label ?? '' }}' })" {{ $attributes }}>
    <div class="flex items-center gap-3" x-show="!expired">
        <div class="text-center">
            <span class="block text-2xl font-bold text-gray-900 dark:text-white" x-text="String(days).padStart(2, '0')"></span>
            <span class="text-xs text-gray-500 dark:text-gray-400">Days</span>
        </div>
        <span class="text-2xl font-bold text-gray-400">:</span>
        <div class="text-center">
            <span class="block text-2xl font-bold text-gray-900 dark:text-white" x-text="String(hours).padStart(2, '0')"></span>
            <span class="text-xs text-gray-500 dark:text-gray-400">Hours</span>
        </div>
        <span class="text-2xl font-bold text-gray-400">:</span>
        <div class="text-center">
            <span class="block text-2xl font-bold text-gray-900 dark:text-white" x-text="String(minutes).padStart(2, '0')"></span>
            <span class="text-xs text-gray-500 dark:text-gray-400">Min</span>
        </div>
        <span class="text-2xl font-bold text-gray-400">:</span>
        <div class="text-center">
            <span class="block text-2xl font-bold text-gray-900 dark:text-white" x-text="String(seconds).padStart(2, '0')"></span>
            <span class="text-xs text-gray-500 dark:text-gray-400">Sec</span>
        </div>
    </div>
    <div x-show="expired" class="text-lg font-semibold text-gray-900 dark:text-white">
        {{ $expiredText ?? 'Time is up!' }}
    </div>
</div>
