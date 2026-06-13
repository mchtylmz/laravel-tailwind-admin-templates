<label class="flex flex-col items-center justify-center w-full p-6 rounded-lg border-2 border-dashed transition-colors cursor-pointer"
       x-bind:class="{
           'border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 hover:border-indigo-500 dark:hover:border-indigo-400': !dragover,
           'border-indigo-500 dark:border-indigo-400 bg-indigo-50 dark:bg-indigo-900/20': dragover,
       }"
       x-data="{ dragover: false, name: '' }"
       x-on:dragover.prevent="dragover = true"
       x-on:dragleave.prevent="dragover = false"
       x-on:drop.prevent="dragover = false; name = $event.dataTransfer.files[0]?.name || ''">
    <input type="file" {{ $attributes->class(['sr-only']) }} x-on:change="name = $event.target.files[0]?.name || ''">
    <template x-if="!name">
        <div class="text-center">
            <svg class="mx-auto w-10 h-10 text-gray-400 dark:text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                <span class="font-semibold text-indigo-600 dark:text-indigo-400">Click to upload</span> or drag and drop
            </p>
            @isset($help)
                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">{{ $help }}</p>
            @endisset
        </div>
    </template>
    <template x-if="name">
        <div class="flex items-center gap-3 text-sm text-gray-700 dark:text-gray-300">
            <svg class="w-8 h-8 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <span x-text="name" class="truncate"></span>
        </div>
    </template>
</label>
