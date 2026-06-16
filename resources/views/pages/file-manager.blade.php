<x-layouts-admin>
    <x-slot:title>File Manager</x-slot:title>

    @php
        $folders = [
            ['name' => 'Documents', 'icon' => 'document-text', 'count' => 342, 'size' => '18.5 GB'],
            ['name' => 'Images', 'icon' => 'photo', 'count' => 567, 'size' => '15.2 GB'],
            ['name' => 'Videos', 'icon' => 'video-camera', 'count' => 89, 'size' => '8.3 GB'],
            ['name' => 'Downloads', 'icon' => 'arrow-down-tray', 'count' => 156, 'size' => '3.2 GB'],
            ['name' => 'Projects', 'icon' => 'folder', 'count' => 23, 'size' => '1.1 GB'],
            ['name' => 'Trash', 'icon' => 'trash', 'count' => 23, 'size' => '0.5 GB'],
        ];
        $files = [
            ['name' => 'Project Proposal', 'type' => 'Folder', 'size' => '--', 'modified' => 'Jun 15, 2026', 'icon' => 'folder', 'color' => 'amber'],
            ['name' => 'Design Assets', 'type' => 'Folder', 'size' => '--', 'modified' => 'Jun 14, 2026', 'icon' => 'folder', 'color' => 'amber'],
            ['name' => 'index.html', 'type' => 'HTML', 'size' => '2.4 KB', 'modified' => 'Jun 12, 2026', 'icon' => 'code-bracket', 'color' => 'blue'],
            ['name' => 'style.css', 'type' => 'CSS', 'size' => '12.8 KB', 'modified' => 'Jun 10, 2026', 'icon' => 'paint-brush', 'color' => 'indigo'],
            ['name' => 'app.js', 'type' => 'JavaScript', 'size' => '45.2 KB', 'modified' => 'Jun 8, 2026', 'icon' => 'code-bracket', 'color' => 'amber'],
            ['name' => 'logo.png', 'type' => 'Image', 'size' => '156 KB', 'modified' => 'Jun 5, 2026', 'icon' => 'photo', 'color' => 'emerald'],
            ['name' => 'screenshot.jpg', 'type' => 'Image', 'size' => '2.1 MB', 'modified' => 'Jun 3, 2026', 'icon' => 'photo', 'color' => 'emerald'],
            ['name' => 'README.md', 'type' => 'Markdown', 'size' => '3.6 KB', 'modified' => 'Jun 1, 2026', 'icon' => 'document-text', 'color' => 'gray'],
            ['name' => 'budget.xlsx', 'type' => 'Spreadsheet', 'size' => '89 KB', 'modified' => 'May 28, 2026', 'icon' => 'table-cells', 'color' => 'green'],
            ['name' => 'presentation.pptx', 'type' => 'Presentation', 'size' => '4.5 MB', 'modified' => 'May 25, 2026', 'icon' => 'presentation-chart-bar', 'color' => 'red'],
        ];
    @endphp

    <div class="mb-4 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">File Manager</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your files and folders</p>
        </div>
        <div class="flex gap-2">
            <x-button variant="outline" size="sm" x-on:click="showNewFolder = true">+ New Folder</x-button>
            <x-button size="sm" x-on:click="$refs.uploadInput.click()">+ Upload</x-button>
            <input type="file" multiple class="hidden" x-ref="uploadInput" x-on:change="handleUpload($event)">
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6" x-data="fileManager">
        <div class="lg:col-span-1 space-y-4">
            <x-card>
                <div class="space-y-1">
                    <a href="#" @click.prevent="breadcrumbs = []; activeFolder = null"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors"
                       :class="!activeFolder ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'">
                        <x-heroicon-o-folder class="w-4 h-4" />
                        <span class="flex-1">My Drive</span>
                        <span class="text-xs text-gray-400">1,234</span>
                    </a>
                    @foreach ($folders as $folder)
                        <a href="#" @click.prevent="activeFolder = '{{ $folder['name'] }}'; breadcrumbs = [activeFolder]"
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors"
                           :class="activeFolder === '{{ $folder['name'] }}' ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'">
                            <x-heroicon-o-{{ $folder['icon'] }} class="w-4 h-4" />
                            <span class="flex-1">{{ $folder['name'] }}</span>
                            <span class="text-xs text-gray-400">{{ $folder['count'] }}</span>
                        </a>
                    @endforeach
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h3 class="text-sm font-semibold text-gray-900 dark:text-white">Storage</h3></x-slot:header>
                <div class="mb-3">
                    <div class="flex items-center justify-between text-sm mb-1">
                        <span class="text-gray-600 dark:text-gray-400">Used</span>
                        <span class="font-medium text-gray-900 dark:text-white">46.8 GB / 100 GB</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 47%"></div>
                    </div>
                </div>
                <div class="space-y-2 pt-3 border-t border-gray-200 dark:border-gray-800">
                    @foreach ($folders as $folder)
                        @if ($folder['name'] !== 'Trash')
                            <div class="flex items-center justify-between text-xs">
                                <span class="text-gray-500 dark:text-gray-400">{{ $folder['name'] }}</span>
                                <span class="text-gray-700 dark:text-gray-300">{{ $folder['size'] }}</span>
                            </div>
                        @endif
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
                        <span class="text-sm font-medium text-gray-900 dark:text-white ml-2" x-text="breadcrumbs.length ? '/ ' + breadcrumbs.join(' / ') : '/ My Drive'"></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-bars-3 class="w-4 h-4 cursor-pointer transition-colors"
                            :class="viewMode === 'list' ? 'text-indigo-600' : 'text-gray-400 hover:text-gray-600'"
                            x-on:click="viewMode = 'list'" />
                        <x-heroicon-o-squares-2x2 class="w-4 h-4 cursor-pointer transition-colors"
                            :class="viewMode === 'grid' ? 'text-indigo-600' : 'text-gray-400 hover:text-gray-600'"
                            x-on:click="viewMode = 'grid'" />
                    </div>
                </div>

                <div class="relative">
                    <div x-show="viewMode === 'list'">
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
                                    @foreach ($files as $i => $file)
                                        <tr class="border-b border-gray-100 dark:border-gray-800/50 transition-colors cursor-pointer"
                                            :class="contextTarget === {{ $i }} ? 'bg-indigo-50 dark:bg-indigo-900/20' : 'hover:bg-gray-50 dark:hover:bg-gray-800/30'"
                                            x-on:contextmenu.prevent="openContext($event, {{ $i }})"
                                            x-on:click="renameIndex = -1; contextTarget = -1">
                                            <td class="px-3 py-2.5">
                                                <div class="flex items-center gap-2">
                                                    <x-dynamic-component :component="'heroicon-o-' . $file['icon']" class="w-4 h-4 text-{{ $file['color'] }}-500" />
                                                    <span x-show="renameIndex !== {{ $i }}" class="font-medium text-gray-900 dark:text-white text-sm">{{ $file['name'] }}</span>
                                                    <input x-show="renameIndex === {{ $i }}" x-ref="renameInput" type="text"
                                                           class="text-sm font-medium text-gray-900 dark:text-white bg-transparent border-b border-indigo-500 outline-none px-0 py-0"
                                                           x-model="renameValue" x-on:click.stop
                                                           x-on:keydown.enter="confirmRename({{ $i }})"
                                                           x-on:click.outside="renameIndex = -1">
                                                </div>
                                            </td>
                                            <td class="px-3 py-2.5 text-xs text-gray-500 dark:text-gray-400">{{ $file['type'] }}</td>
                                            <td class="px-3 py-2.5 text-sm text-gray-600 dark:text-gray-400">{{ $file['size'] }}</td>
                                            <td class="px-3 py-2.5 text-sm text-gray-500 dark:text-gray-400">{{ $file['modified'] }}</td>
                                            <td class="px-3 py-2.5 text-right">
                                                <x-heroicon-o-ellipsis-vertical class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600 ml-auto"
                                                    x-on:click.stop="openContext($event, {{ $i }})" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div x-show="viewMode === 'grid'" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                        @foreach ($files as $i => $file)
                            <div class="rounded-xl border border-gray-200 dark:border-gray-800 p-4 flex flex-col items-center gap-2 cursor-pointer transition-all hover:shadow-md"
                                 :class="contextTarget === {{ $i }} ? 'border-indigo-400 bg-indigo-50 dark:bg-indigo-900/20' : 'hover:border-gray-300 dark:hover:border-gray-700'"
                                 x-on:contextmenu.prevent="openContext($event, {{ $i }})"
                                 x-on:click="renameIndex = -1; contextTarget = -1">
                                @php $hexMap = ['amber' => '#f59e0b', 'blue' => '#3b82f6', 'indigo' => '#6366f1', 'emerald' => '#10b981', 'gray' => '#6b7280', 'green' => '#22c55e', 'red' => '#ef4444']; @endphp
                                @if ($file['type'] === 'Folder')
                                    <x-heroicon-o-folder class="w-12 h-12 text-amber-400" />
                                @else
                                    <div class="w-16 h-16 rounded-xl flex items-center justify-center text-xs font-bold text-gray-400" style="background-color: {{ $hexMap[$file['color']] ?? '#6366f1' }}22">
                                        <x-dynamic-component :component="'heroicon-o-' . $file['icon']" class="w-8 h-8" style="color: {{ $hexMap[$file['color']] ?? '#6366f1' }}" />
                                    </div>
                                @endif
                                <div class="text-center min-w-0 w-full">
                                    <span x-show="renameIndex !== {{ $i }}" class="text-xs font-medium text-gray-900 dark:text-white truncate block" x-text="'{{ $file['name'] }}'"></span>
                                    <input x-show="renameIndex === {{ $i }}" x-ref="renameInputG" type="text"
                                           class="text-xs font-medium text-gray-900 dark:text-white bg-transparent border-b border-indigo-500 outline-none w-full text-center px-0 py-0"
                                           x-model="renameValue" x-on:click.stop
                                           x-on:keydown.enter="confirmRename({{ $i }})"
                                           x-on:click.outside="renameIndex = -1">
                                </div>
                                <span class="text-xs text-gray-400">{{ $file['size'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div x-show="isDragging"
                         class="absolute inset-0 z-10 rounded-xl border-2 border-dashed border-indigo-400 bg-indigo-50/80 dark:bg-indigo-900/40 flex items-center justify-center"
                         x-on:dragover.prevent x-on:drop.prevent="handleDrop"
                         x-transition.opacity>
                        <div class="text-center">
                            <x-heroicon-o-cloud-arrow-up class="w-12 h-12 text-indigo-500 mx-auto mb-2" />
                            <p class="text-sm font-medium text-indigo-700 dark:text-indigo-300">Drop files here to upload</p>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

        <div x-show="contextTarget !== -1"
             class="fixed inset-0 z-50" x-on:click="contextTarget = -1">
            <div class="absolute w-48 bg-white dark:bg-gray-900 rounded-xl shadow-xl border border-gray-200 dark:border-gray-800 py-1 overflow-hidden"
                 :style="'left: ' + contextX + 'px; top: ' + contextY + 'px'"
                 x-on:click.stop>
                <button x-on:click="startRename(contextTarget)" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors text-left">
                    <x-heroicon-o-pencil class="w-4 h-4 text-gray-400" /> Rename
                </button>
                <button x-on:click="duplicateItem(contextTarget)" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors text-left">
                    <x-heroicon-o-document-duplicate class="w-4 h-4 text-gray-400" /> Duplicate
                </button>
                <button x-on:click="moveItem(contextTarget)" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors text-left">
                    <x-heroicon-o-arrow-right-start-on-rectangle class="w-4 h-4 text-gray-400" /> Move to
                </button>
                <hr class="my-1 border-gray-200 dark:border-gray-700">
                <button x-on:click="downloadItem(contextTarget)" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors text-left">
                    <x-heroicon-o-arrow-down-tray class="w-4 h-4 text-gray-400" /> Download
                </button>
                <button x-on:click="deleteItem(contextTarget)" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors text-left">
                    <x-heroicon-o-trash class="w-4 h-4" /> Delete
                </button>
            </div>
        </div>

        <div x-show="showNewFolder"
             x-transition.opacity.duration.200ms
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50"
             x-on:click="showNewFolder = false">
            <div x-on:click.stop class="w-full max-w-sm bg-white dark:bg-gray-900 rounded-xl shadow-xl border border-gray-200 dark:border-gray-800 p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">New Folder</h3>
                <input type="text" placeholder="Folder name" x-model="newFolderName"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-transparent text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 mb-4"
                       x-on:keydown.enter="createFolder">
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" size="sm" x-on:click="showNewFolder = false">Cancel</x-button>
                    <x-button size="sm" x-on:click="createFolder">Create</x-button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('fileManager', () => ({
                viewMode: 'list',
                showNewFolder: false,
                newFolderName: '',
                contextTarget: -1,
                contextX: 0,
                contextY: 0,
                renameIndex: -1,
                renameValue: '',
                isDragging: false,
                breadcrumbs: [],
                activeFolder: null,
                items: @json($files),

                openContext(e, i) {
                    this.contextTarget = i
                    const rect = e.target.closest('.rounded-xl, tr')?.getBoundingClientRect()
                    if (this.viewMode === 'grid') {
                        this.contextX = e.clientX
                        this.contextY = e.clientY
                    } else {
                        this.contextX = e.clientX
                        this.contextY = e.clientY
                    }
                    const menuW = 192, menuH = 260
                    if (this.contextX + menuW > window.innerWidth) this.contextX = window.innerWidth - menuW - 10
                    if (this.contextY + menuH > window.innerHeight) this.contextY = window.innerHeight - menuH - 10
                },

                startRename(i) {
                    this.renameIndex = i
                    this.renameValue = this.items[i].name
                    this.contextTarget = -1
                    this.$nextTick(() => {
                        const el = this.$refs.renameInput || this.$refs.renameInputG
                        if (el) { el.focus(); el.select() }
                    })
                },

                confirmRename(i) {
                    if (this.renameValue.trim()) {
                        this.items[i].name = this.renameValue.trim()
                        this.$dispatch('toast', { type: 'success', title: 'Renamed', message: 'File renamed successfully.' })
                    }
                    this.renameIndex = -1
                },

                duplicateItem(i) {
                    const orig = { ...this.items[i] }
                    orig.name = orig.name.replace(/(\.[^.]+)?$/, '-copy$1')
                    this.items.push(orig)
                    this.contextTarget = -1
                    this.$dispatch('toast', { type: 'success', title: 'Duplicated', message: 'File duplicated.' })
                },

                moveItem(i) {
                    this.contextTarget = -1
                    this.$dispatch('toast', { type: 'info', title: 'Move', message: 'Select a destination folder from the sidebar.' })
                },

                downloadItem(i) {
                    this.contextTarget = -1
                    this.$dispatch('toast', { type: 'info', title: 'Download', message: 'Downloading ' + this.items[i].name + '...' })
                },

                deleteItem(i) {
                    this.items.splice(i, 1)
                    this.contextTarget = -1
                    this.$dispatch('toast', { type: 'success', title: 'Deleted', message: 'File moved to trash.' })
                },

                createFolder() {
                    if (this.newFolderName.trim()) {
                        this.items.unshift({
                            name: this.newFolderName.trim(),
                            type: 'Folder',
                            size: '--',
                            modified: new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }),
                            icon: 'folder',
                            color: 'amber'
                        })
                        this.newFolderName = ''
                        this.showNewFolder = false
                        this.$dispatch('toast', { type: 'success', title: 'Created', message: 'Folder created.' })
                    }
                },

                handleUpload(e) {
                    const files = e.target.files
                    if (files.length) {
                        this.$dispatch('toast', { type: 'success', title: 'Uploaded', message: files.length + ' file(s) uploaded.' })
                    }
                    e.target.value = ''
                },

                handleDrop(e) {
                    this.isDragging = false
                    const files = e.dataTransfer.files
                    if (files.length) {
                        this.$dispatch('toast', { type: 'success', title: 'Uploaded', message: files.length + ' file(s) uploaded.' })
                    }
                }
            }))

            document.addEventListener('dragenter', () => {
                const fm = document.querySelector('[x-data="fileManager"]')
                if (fm) fm.__x.$data.isDragging = true
            })
            document.addEventListener('dragleave', (e) => {
                if (e.target === document.body) {
                    const fm = document.querySelector('[x-data="fileManager"]')
                    if (fm) fm.__x.$data.isDragging = false
                }
            })
        })
    </script>
</x-layouts-admin>
