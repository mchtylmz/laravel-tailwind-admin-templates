<div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false" @focusin="show = true" @focusout="show = false"
     {{ $attributes->merge(['class' => 'relative inline-flex']) }}>
    {{ $trigger ?? $slot }}
    <div x-show="show" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         x-cloak
         class="absolute z-50 px-2.5 py-1.5 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 rounded-lg shadow-lg whitespace-nowrap pointer-events-none"
         x-bind:class="{
             'bottom-full left-1/2 -translate-x-1/2 mb-2': '{{ $position ?? 'top' }}' === 'top',
             'top-full left-1/2 -translate-x-1/2 mt-2': '{{ $position ?? 'top' }}' === 'bottom',
             'right-full top-1/2 -translate-y-1/2 mr-2': '{{ $position ?? 'top' }}' === 'left',
             'left-full top-1/2 -translate-y-1/2 ml-2': '{{ $position ?? 'top' }}' === 'right',
         }">
        {{ $slot }}
        <div class="absolute w-2 h-2 bg-gray-900 dark:bg-gray-700 rotate-45"
             x-bind:class="{
                 'top-full left-1/2 -translate-x-1/2 -mt-1': '{{ $position ?? 'top' }}' === 'top',
                 'bottom-full left-1/2 -translate-x-1/2 -mb-1': '{{ $position ?? 'top' }}' === 'bottom',
                 'right-full top-1/2 -translate-y-1/2 -mr-1': '{{ $position ?? 'top' }}' === 'left',
                 'left-full top-1/2 -translate-y-1/2 -ml-1': '{{ $position ?? 'top' }}' === 'right',
             }">
        </div>
    </div>
</div>
