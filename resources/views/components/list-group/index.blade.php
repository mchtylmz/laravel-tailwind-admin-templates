@props(['items' => []])
<div {{ $attributes->except(['items'])->merge(['class' => 'divide-y divide-gray-200 dark:divide-gray-800 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden']) }}>
    @foreach($items as $item)
        <div class="flex items-center gap-3 px-4 py-3 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
            @isset($item['icon'])
                <div class="w-9 h-9 rounded-lg flex items-center justify-center shrink-0 text-sm"
                     x-bind:class="{
                         'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400': '{{ $item['color'] ?? 'indigo' }}' === 'indigo',
                         'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400': '{{ $item['color'] ?? 'indigo' }}' === 'emerald',
                         'bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400': '{{ $item['color'] ?? 'indigo' }}' === 'amber',
                         'bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400': '{{ $item['color'] ?? 'indigo' }}' === 'red',
                         'bg-cyan-100 dark:bg-cyan-900/30 text-cyan-600 dark:text-cyan-400': '{{ $item['color'] ?? 'indigo' }}' === 'cyan',
                         'bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400': '{{ $item['color'] ?? 'indigo' }}' === 'purple',
                     }">
                    {!! $item['icon'] !!}
                </div>
            @endisset
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $item['title'] ?? '' }}</p>
                @isset($item['description'])
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $item['description'] }}</p>
                @endisset
            </div>
            @isset($item['badge'])
                <x-badge :color="$item['badge']['color'] ?? 'gray'" size="sm">{{ $item['badge']['text'] ?? '' }}</x-badge>
            @endisset
            @isset($item['action'])
                <div class="shrink-0">{{ $item['action'] }}</div>
            @endisset
        </div>
    @endforeach
    {{ $slot }}
</div>
