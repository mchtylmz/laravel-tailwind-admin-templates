<x-layouts-admin>
    <x-slot:title>Gallery</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Gallery']]" />
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Gallery</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Browse and manage media assets</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">
                <x-heroicon-o-funnel class="w-4 h-4" />
            </x-button>
            <x-button size="sm">+ Upload</x-button>
        </div>
    </div>

    <div class="flex gap-2 mb-6 flex-wrap">
        @foreach (['All', 'Design', 'Development', 'Marketing', 'Screenshots', 'Icons'] as $filter)
            <button @class([
                'px-3 py-1.5 text-sm font-medium rounded-lg transition-colors',
                'bg-indigo-600 text-white' => $loop->first,
                'bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700' => !$loop->first,
            ])>{{ $filter }}</button>
        @endforeach
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @php
            $colors = ['indigo', 'emerald', 'amber', 'purple', 'rose', 'cyan', 'orange', 'teal', 'pink', 'blue', 'red', 'green', 'violet', 'lime', 'fuchsia'];
            $types = ['Design', 'Development', 'Marketing', 'Screenshots', 'Icons'];
        @endphp
        @for ($i = 1; $i <= 15; $i++)
            @php
                $color = $colors[($i - 1) % count($colors)];
                $type = $types[($i - 1) % count($types)];
            @endphp
            <div class="group relative bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden cursor-pointer hover:shadow-lg transition-all">
                <div class="aspect-square bg-gradient-to-br from-{{ $color }}-100 to-{{ $color }}-200 dark:from-{{ $color }}-900/30 dark:to-{{ $color }}-800/20 flex items-center justify-center">
                    <x-heroicon-o-photo class="w-12 h-12 text-{{ $color }}-400" />
                </div>
                <div class="p-2">
                    <p class="text-xs font-medium text-gray-900 dark:text-white truncate">Asset_{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}.png</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $type }}</p>
                </div>
                <div class="absolute inset-0 bg-gray-900/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-white/90 flex items-center justify-center text-gray-700">
                        <x-heroicon-o-eye class="w-4 h-4" />
                    </span>
                    <span class="w-8 h-8 rounded-full bg-white/90 flex items-center justify-center text-gray-700">
                        <x-heroicon-o-arrow-down-tray class="w-4 h-4" />
                    </span>
                    <span class="w-8 h-8 rounded-full bg-white/90 flex items-center justify-center text-gray-700">
                        <x-heroicon-o-trash class="w-4 h-4" />
                    </span>
                </div>
            </div>
        @endfor
    </div>

    <div class="mt-6">
        <x-pagination :total="42" :per-page="15" />
    </div>
</x-layouts-admin>
