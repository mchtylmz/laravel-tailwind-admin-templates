<div x-data="{ open: '{{ $first ?? '' }}' }" {{ $attributes->except(['items', 'first'])->merge(['class' => 'divide-y divide-gray-200 dark:divide-gray-800 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden']) }}>
    @foreach($items as $key => $item)
        <div x-data="{ id: '{{ $key }}' }" class="bg-white dark:bg-gray-900">
            <button @click="open = (open === id ? '' : id)" class="flex items-center justify-between w-full px-5 py-4 text-left text-sm font-semibold text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                <span>{{ $item['title'] ?? $item }}</span>
                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     x-bind:class="{ 'rotate-180': open === id }">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div x-show="open === id" x-collapse.duration.200ms>
                <div class="px-5 pb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ $item['content'] ?? '' }}
                </div>
            </div>
        </div>
    @endforeach
    {{ $slot }}
</div>
