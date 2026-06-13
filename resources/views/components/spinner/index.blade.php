<div {{ $attributes->merge(['class' => 'inline-flex items-center justify-center']) }}
     x-data="{ visible: {{ ($show ?? 'true') === 'true' ? 'true' : 'false' }} }"
     x-show="visible">
    <svg class="animate-spin text-indigo-600 dark:text-indigo-400"
         x-bind:class="{
             'w-4 h-4': '{{ $size ?? 'md' }}' === 'sm',
             'w-6 h-6': '{{ $size ?? 'md' }}' === 'md',
             'w-8 h-8': '{{ $size ?? 'md' }}' === 'lg',
             'w-12 h-12': '{{ $size ?? 'md' }}' === 'xl',
         }"
         fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    @if(isset($label))
        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">{{ $label }}</span>
    @endif
</div>
