<x-layouts-admin>
    <x-slot:title>File Manager</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'File Manager']]" />
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">File Manager</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your files and folders</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm">+ New Folder</x-button>
            <x-button size="sm">+ Upload File</x-button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-1">
            <x-card>
                <div class="space-y-1">
                    @foreach ([
                        ['name' => 'My Drive', 'icon' => 'folder', 'count' => '1,234'],
                        ['name' => 'Documents', 'icon' => 'document-text', 'count' => '342'],
                        ['name' => 'Images', 'icon' => 'photo', 'count' => '567'],
                        ['name' => 'Videos', 'icon' => 'video-camera', 'count' => '89'],
                        ['name' => 'Downloads', 'icon' => 'arrow-down-tray', 'count' => '156'],
                        ['name' => 'Trash', 'icon' => 'trash', 'count' => '23'],
                    ] as $folder)
                        <a href="#" @class([
                            'flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors',
                            'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' => $loop->first,
                            'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800' => !$loop->first,
                        ])>
                            <x-heroicon-o-{{ $folder['icon'] }} class="w-4 h-4" />
                            <span class="flex-1">{{ $folder['name'] }}</span>
                            <span class="text-xs text-gray-400">{{ $folder['count'] }}</span>
                        </a>
                    @endforeach
                </div>
            </x-card>

            <x-card class="mt-4">
                <x-slot:header><h3 class="text-sm font-semibold text-gray-900 dark:text-white">Storage</h3></x-slot:header>
                <div class="mb-3">
                    <div class="flex items-center justify-between text-sm mb-1">
                        <span class="text-gray-600 dark:text-gray-400">Used</span>
                        <span class="font-medium text-gray-900 dark:text-white">45.2 GB / 100 GB</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div class="space-y-2 pt-3 border-t border-gray-200 dark:border-gray-800">
                    @foreach ([
                        ['label' => 'Documents', 'value' => '18.5 GB', 'percent' => 40],
                        ['label' => 'Images', 'value' => '15.2 GB', 'percent' => 34],
                        ['label' => 'Videos', 'value' => '8.3 GB', 'percent' => 18],
                        ['label' => 'Other', 'value' => '3.2 GB', 'percent' => 8],
                    ] as $item)
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500 dark:text-gray-400">{{ $item['label'] }}</span>
                            <span class="text-gray-700 dark:text-gray-300">{{ $item['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>

        <div class="lg:col-span-3">
            <x-card>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-chevron-left class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600" />
                        <x-heroicon-o-chevron-right class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600" />
                        <span class="text-sm font-medium text-gray-900 dark:text-white ml-2">/ Projects / Web App</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-bars-3 class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600" />
                        <x-heroicon-o-squares-2x2 class="w-4 h-4 text-indigo-600 cursor-pointer" />
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800">
                                <th class="text-left px-3 py-2 font-semibold text-gray-900 dark:text-white">Name</th>
                                <th class="text-left px-3 py-2 font-semibold text-gray-900 dark:text-white">Type</th>
                                <th class="text-left px-3 py-2 font-semibold text-gray-900 dark:text-white">Size</th>
                                <th class="text-left px-3 py-2 font-semibold text-gray-900 dark:text-white">Modified</th>
                                <th class="text-right px-3 py-2 font-semibold text-gray-900 dark:text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $files = [
                                    ['name' => 'src', 'type' => 'Folder', 'size' => '--', 'modified' => 'Jun 12, 2026', 'icon' => 'folder', 'color' => 'amber'],
                                    ['name' => 'public', 'type' => 'Folder', 'size' => '--', 'modified' => 'Jun 10, 2026', 'icon' => 'folder', 'color' => 'amber'],
                                    ['name' => 'index.html', 'type' => 'HTML', 'size' => '2.4 KB', 'modified' => 'Jun 8, 2026', 'icon' => 'code-bracket', 'color' => 'blue'],
                                    ['name' => 'style.css', 'type' => 'CSS', 'size' => '12.8 KB', 'modified' => 'Jun 5, 2026', 'icon' => 'paint-brush', 'color' => 'indigo'],
                                    ['name' => 'app.js', 'type' => 'JavaScript', 'size' => '45.2 KB', 'modified' => 'Jun 3, 2026', 'icon' => 'code-bracket', 'color' => 'amber'],
                                    ['name' => 'logo.png', 'type' => 'Image', 'size' => '156 KB', 'modified' => 'May 28, 2026', 'icon' => 'photo', 'color' => 'emerald'],
                                    ['name' => 'screenshot.jpg', 'type' => 'Image', 'size' => '2.1 MB', 'modified' => 'May 25, 2026', 'icon' => 'photo', 'color' => 'emerald'],
                                    ['name' => 'README.md', 'type' => 'Markdown', 'size' => '3.6 KB', 'modified' => 'May 20, 2026', 'icon' => 'document-text', 'color' => 'gray'],
                                ];
                            @endphp
                            @foreach ($files as $file)
                                <tr class="border-b border-gray-100 dark:border-gray-800/50 hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors cursor-pointer">
                                    <td class="px-3 py-2.5">
                                        <div class="flex items-center gap-2">
                                            <x-dynamic-component :component="'heroicon-o-' . $file['icon']" class="w-4 h-4 text-{{ $file['color'] }}-500" />
                                            <span class="font-medium text-gray-900 dark:text-white text-sm">{{ $file['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2.5 text-xs text-gray-500 dark:text-gray-400">{{ $file['type'] }}</td>
                                    <td class="px-3 py-2.5 text-sm text-gray-600 dark:text-gray-400">{{ $file['size'] }}</td>
                                    <td class="px-3 py-2.5 text-sm text-gray-500 dark:text-gray-400">{{ $file['modified'] }}</td>
                                    <td class="px-3 py-2.5 text-right">
                                        <x-heroicon-o-ellipsis-horizontal class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600 ml-auto" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts-admin>
