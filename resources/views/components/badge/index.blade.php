<span {{ $attributes->class([
    'inline-flex items-center font-medium rounded-full transition-colors',
    'px-2 py-0.5 text-xs' => !isset($size) || $size === 'sm',
    'px-2.5 py-0.5 text-sm' => ($size ?? 'sm') === 'md',
    'px-3 py-1 text-sm' => ($size ?? 'sm') === 'lg',
    'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' => !isset($color) || $color === 'indigo',
    'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300' => ($color ?? '') === 'emerald',
    'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300' => ($color ?? '') === 'amber',
    'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300' => ($color ?? '') === 'red',
    'bg-cyan-100 dark:bg-cyan-900/30 text-cyan-700 dark:text-cyan-300' => ($color ?? '') === 'cyan',
    'bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300' => ($color ?? '') === 'purple',
    'bg-pink-100 dark:bg-pink-900/30 text-pink-700 dark:text-pink-300' => ($color ?? '') === 'pink',
    'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300' => ($color ?? '') === 'gray',
]) }}>
    @if($dot ?? false)
        <span class="w-1.5 h-1.5 rounded-full mr-1.5" x-bind:class="{
            'bg-indigo-600 dark:bg-indigo-400': '{{ $color ?? 'indigo' }}' === 'indigo',
            'bg-emerald-600 dark:bg-emerald-400': '{{ $color ?? 'indigo' }}' === 'emerald',
            'bg-amber-600 dark:bg-amber-400': '{{ $color ?? 'indigo' }}' === 'amber',
            'bg-red-600 dark:bg-red-400': '{{ $color ?? 'indigo' }}' === 'red',
            'bg-cyan-600 dark:bg-cyan-400': '{{ $color ?? 'indigo' }}' === 'cyan',
            'bg-purple-600 dark:bg-purple-400': '{{ $color ?? 'indigo' }}' === 'purple',
            'bg-pink-600 dark:bg-pink-400': '{{ $color ?? 'indigo' }}' === 'pink',
            'bg-gray-600 dark:bg-gray-400': '{{ $color ?? 'indigo' }}' === 'gray',
        }"></span>
    @endif
    {{ $slot }}
    @if(($dismissible ?? false) || ($count ?? false))
        <button @click="$el.parentElement.remove()" class="ml-1.5 p-0.5 rounded-full hover:bg-black/10 dark:hover:bg-white/10">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    @endif
</span>
