<div {{ $attributes->class(['animate-pulse rounded-lg bg-gray-200 dark:bg-gray-700']) }}
     x-bind:class="{
         'h-4': '{{ $size ?? 'text' }}' === 'text',
         'h-8': '{{ $size ?? 'text' }}' === 'title',
         'h-24': '{{ $size ?? 'text' }}' === 'card',
         'w-10 h-10 rounded-full': '{{ $size ?? 'text' }}' === 'avatar',
         'w-full h-48': '{{ $size ?? 'text' }}' === 'image',
     }">
</div>
