<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm']) }}>
    @isset($header)
        <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-800">
            {{ $header }}
        </div>
    @endisset
    <div class="px-5 py-4">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="px-5 py-3 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50 rounded-b-xl">
            {{ $footer }}
        </div>
    @endisset
</div>
