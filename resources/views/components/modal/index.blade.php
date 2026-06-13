<div x-data="modal({ size: '{{ $size ?? 'md' }}', closable: {{ ($closable ?? true) ? 'true' : 'false' }} })" {{ $attributes->merge(['class' => '']) }}>
    {{ $trigger ?? '' }}
    <template x-teleport="body">
        <div x-show="open" x-transition.opacity.duration.200ms
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50 backdrop-blur-sm"
             @click="close()"
             @keydown.window.escape="close()">
            <div @click.stop
                 class="bg-white dark:bg-gray-900 rounded-xl shadow-xl border border-gray-200 dark:border-gray-800 w-full overflow-hidden"
                 x-bind:class="{
                     'max-w-sm': size === 'sm',
                     'max-w-lg': size === 'md',
                     'max-w-2xl': size === 'lg',
                     'max-w-4xl': size === 'xl',
                     'max-w-full mx-4': size === 'full',
                 }"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">
                @isset($header)
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200 dark:border-gray-800">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $header }}</h3>
                        @if($closable ?? true)
                            <button @click="close()" class="p-1 rounded-lg text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        @endif
                    </div>
                @endisset
                <div class="px-5 py-4 max-h-[70vh] overflow-y-auto">
                    {{ $slot }}
                </div>
                @isset($footer)
                    <div class="flex items-center justify-end gap-2 px-5 py-3 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50">
                        {{ $footer }}
                    </div>
                @endisset
            </div>
        </div>
    </template>
</div>
