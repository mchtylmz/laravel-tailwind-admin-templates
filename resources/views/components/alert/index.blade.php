<div x-data="{ visible: true }" x-show="visible" {{ $attributes->merge(['class' => 'flex items-start gap-3 p-4 rounded-lg border']) }}
     x-bind:class="{
         'bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800 text-green-800 dark:text-green-300': '{{ $type ?? 'info' }}' === 'success',
         'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800 text-red-800 dark:text-red-300': '{{ $type ?? 'info' }}' === 'danger',
         'bg-amber-50 dark:bg-amber-900/20 border-amber-200 dark:border-amber-800 text-amber-800 dark:text-amber-300': '{{ $type ?? 'info' }}' === 'warning',
         'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800 text-blue-800 dark:text-blue-300': '{{ $type ?? 'info' }}' === 'info',
     }">
    <div class="flex-1 text-sm">{{ $slot }}</div>
    @if($dismissible ?? true)
        <button @click="visible = false" class="flex-shrink-0 p-1 rounded hover:bg-black/5 dark:hover:bg-white/10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    @endif
</div>
