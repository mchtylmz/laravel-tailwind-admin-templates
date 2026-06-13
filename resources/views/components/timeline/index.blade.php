@props(['items' => []])
<ol {{ $attributes->except(['items'])->merge(['class' => 'relative border-l border-gray-200 dark:border-gray-800 ml-3 space-y-6']) }}>
    @foreach($items as $item)
        <li class="relative pl-6">
            <span class="absolute -left-[17px] top-1 w-[6px] h-[6px] rounded-full border-2 border-indigo-500 bg-white dark:bg-gray-900"></span>
            <div class="flex items-start gap-3">
                @isset($item['icon'])
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0 mt-0.5"
                         x-bind:class="{
                             'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600': '{{ $item['color'] ?? 'indigo' }}' === 'indigo',
                             'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600': '{{ $item['color'] ?? 'indigo' }}' === 'emerald',
                             'bg-amber-100 dark:bg-amber-900/30 text-amber-600': '{{ $item['color'] ?? 'indigo' }}' === 'amber',
                         }">
                        {!! $item['icon'] !!}
                    </div>
                @endisset
                <div class="flex-1 min-w-0">
                    @isset($item['title'])
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $item['title'] }}</p>
                    @endisset
                    @isset($item['description'])
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item['description'] }}</p>
                    @endisset
                    @isset($item['time'])
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $item['time'] }}</p>
                    @endisset
                </div>
                @isset($item['end'])
                    <div class="shrink-0">{{ $item['end'] }}</div>
                @endisset
            </div>
        </li>
    @endforeach
    {{ $slot }}
</ol>
