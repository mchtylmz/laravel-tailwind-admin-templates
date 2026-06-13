<span {{ $attributes->class([
    'inline-flex items-center justify-center rounded-full font-semibold shrink-0',
    'w-6 h-6 text-xs' => ($size ?? 'md') === 'xs',
    'w-8 h-8 text-sm' => ($size ?? 'md') === 'sm',
    'w-10 h-10 text-base' => ($size ?? 'md') === 'md',
    'w-12 h-12 text-lg' => ($size ?? 'md') === 'lg',
    'w-16 h-16 text-xl' => ($size ?? 'md') === 'xl',
]) }}
x-data="{ color: '{{ $color ?? 'indigo' }}' }"
x-bind:class="{
    'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300': color === 'indigo',
    'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300': color === 'emerald',
    'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300': color === 'amber',
    'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300': color === 'red',
    'bg-cyan-100 dark:bg-cyan-900/30 text-cyan-700 dark:text-cyan-300': color === 'cyan',
    'bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300': color === 'purple',
    'bg-pink-100 dark:bg-pink-900/30 text-pink-700 dark:text-pink-300': color === 'pink',
    'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300': color === 'gray',
}">
    @if($src ?? false)
        <img src="{{ $src }}" alt="{{ $alt ?? '' }}" class="w-full h-full rounded-full object-cover">
    @else
        {{ $slot }}
    @endif
    @if($status ?? false)
        <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 rounded-full border-2 border-white dark:border-gray-900"
              x-bind:class="{
                  'bg-emerald-500': '{{ $status }}' === 'online',
                  'bg-amber-500': '{{ $status }}' === 'away',
                  'bg-red-500': '{{ $status }}' === 'offline',
                  'bg-gray-400': '{{ $status }}' === 'busy',
              }"></span>
    @endif
</span>
