<nav {{ $attributes->merge(['class' => 'flex items-center gap-1']) }}>
    <button @click="$dispatch('page-changed', { page: currentPage - 1 })"
            x-data="{ currentPage: {{ $current ?? 1 }} }"
            {{-- previous --}}
            class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-sm font-medium transition-colors
                   text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800
                   disabled:opacity-30 disabled:cursor-not-allowed"
            x-bind:disabled="currentPage <= 1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>

    <template x-data="{ current: {{ $current ?? 1 }}, total: {{ $total ?? 1 }} }" x-if="total > 0">
        <div class="flex items-center gap-1">
            <template x-for="page in total" :key="page">
                <button @click="$dispatch('page-changed', { page })"
                        class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-sm font-medium transition-colors"
                        x-bind:class="page === current
                            ? 'bg-indigo-600 text-white shadow-sm'
                            : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'"
                        x-text="page">
                </button>
            </template>
        </div>
    </template>

    <button @click="$dispatch('page-changed', { page: currentPage + 1 })"
            x-data="{ currentPage: {{ $current ?? 1 }} }"
            class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-sm font-medium transition-colors
                   text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800
                   disabled:opacity-30 disabled:cursor-not-allowed"
            x-bind:disabled="currentPage >= {{ $total ?? 1 }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>
</nav>
