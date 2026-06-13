<div x-data="editor({ value: '{{ $value ?? '' }}', placeholder: '{{ $placeholder ?? 'Write something...' }}' })" {{ $attributes->merge(['class' => 'relative']) }}>
    <div class="border border-gray-300 dark:border-gray-700 rounded-xl overflow-hidden">
        <div class="flex flex-wrap items-center gap-0.5 px-2 py-1.5 border-b border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50">
            <button @click="exec('bold')" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors font-bold text-sm" :class="{ 'bg-gray-200 dark:bg-gray-700': bold }">
                <span class="text-gray-600 dark:text-gray-400 w-4 h-4 flex items-center justify-center">B</span>
            </button>
            <button @click="exec('italic')" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors italic" :class="{ 'bg-gray-200 dark:bg-gray-700': italic }">
                <span class="text-gray-600 dark:text-gray-400 w-4 h-4 flex items-center justify-center">I</span>
            </button>
            <button @click="exec('underline')" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors underline" :class="{ 'bg-gray-200 dark:bg-gray-700': underline }">
                <span class="text-gray-600 dark:text-gray-400 w-4 h-4 flex items-center justify-center">U</span>
            </button>
            <span class="w-px h-5 bg-gray-300 dark:bg-gray-600 mx-1"></span>
            <button @click="exec('formatBlock', '<h2>')" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-xs font-bold">
                <span class="text-gray-600 dark:text-gray-400">H2</span>
            </button>
            <button @click="exec('insertUnorderedList')" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                <x-heroicon-o-list-bullet class="w-4 h-4 text-gray-600 dark:text-gray-400" />
            </button>
            <button @click="exec('insertOrderedList')" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                <x-heroicon-o-list-bullet class="w-4 h-4 text-gray-600 dark:text-gray-400" />
            </button>
            <span class="w-px h-5 bg-gray-300 dark:bg-gray-600 mx-1"></span>
            <button @click="exec('createLink', prompt('URL:'))" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                <x-heroicon-o-link class="w-4 h-4 text-gray-600 dark:text-gray-400" />
            </button>
            <button x-show="value" @click="exec('formatBlock', '<p>')" class="p-1.5 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                <x-heroicon-o-code-bracket class="w-4 h-4 text-gray-600 dark:text-gray-400" />
            </button>
        </div>
        <div x-ref="editor" contenteditable="true"
             @input="update()" @keydown="update()"
             x-html="value || ''"
             class="min-h-[150px] px-4 py-3 text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 focus:outline-none prose prose-sm dark:prose-invert max-w-none"
             :data-placeholder="placeholder"
             x-init="$el.innerHTML = value"></div>
    </div>
    <input type="hidden" name="{{ $name ?? 'content' }}" x-model="value">
</div>
