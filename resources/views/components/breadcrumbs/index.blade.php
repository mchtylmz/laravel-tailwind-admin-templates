<nav {{ $attributes->merge(['class' => 'flex items-center gap-1.5 text-sm']) }}>
    @foreach($crumbs as $i => $crumb)
        @if($i > 0)
            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        @endif
        @if($loop->last)
            <span class="font-semibold text-gray-900 dark:text-white">{{ $crumb['label'] ?? $crumb }}</span>
        @else
            <a href="{{ $crumb['url'] ?? '#' }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">{{ $crumb['label'] ?? $crumb }}</a>
        @endif
    @endforeach
    {{ $slot }}
</nav>
