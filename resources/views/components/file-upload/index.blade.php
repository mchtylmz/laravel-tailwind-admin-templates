<div x-data="fileUpload" class="w-full" {{ $attributes }}>
    <div @click="select" @dragover.prevent="dragover = true" @dragleave.prevent="dragover = false" @drop.prevent="handleDrop($event)"
         class="border-2 border-dashed rounded-xl p-8 text-center cursor-pointer transition-colors"
         :class="dragover ? 'border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20' : 'border-gray-300 dark:border-gray-700 hover:border-gray-400 dark:hover:border-gray-600'">
        <x-heroicon-o-cloud-arrow-up class="w-10 h-10 mx-auto mb-3 text-gray-400" />
        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Drag & drop files here or <span class="text-indigo-600 dark:text-indigo-400">browse</span></p>
    </div>
    <input type="file" x-ref="fileInput" @change="handleFiles($event.target.files)" class="hidden" multiple accept="image/*,.pdf,.doc,.docx">
    <div class="mt-3 space-y-2" x-show="files.length > 0">
        <template x-for="(file, i) in files" :key="i">
            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                <div class="w-10 h-10 rounded bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-xs font-medium text-gray-500 overflow-hidden">
                    <img x-show="file.preview" :src="file.preview" class="w-full h-full object-cover">
                    <span x-show="!file.preview" x-text="file.name.split('.').pop().toUpperCase()"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate" x-text="file.name"></p>
                    <p class="text-xs text-gray-500" x-text="formatSize(file.size)"></p>
                </div>
                <button @click="remove(i)" class="text-gray-400 hover:text-red-500 transition-colors">
                    <x-heroicon-o-x-mark class="w-4 h-4" />
                </button>
            </div>
        </template>
    </div>
</div>
