<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 px-4 text-center']) }}>
    @isset($icon)
        <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-400 dark:text-gray-500 mb-4">
            {{ $icon }}
        </div>
    @endisset
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">{{ $title ?? 'No data' }}</h3>
    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 max-w-sm">{{ $description ?? '' }}</p>
    @isset($action)
        {{ $action }}
    @endisset
</div>
