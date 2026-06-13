<div x-data="datatable({
    rows: {{ json_encode($rows) }},
    columns: {{ json_encode($columns) }},
    perPage: {{ $perPage ?? 10 }},
    searchable: {{ ($searchable ?? true) ? 'true' : 'false' }}
})" class="space-y-4">
    @if($searchable ?? true)
        <div class="relative max-w-sm">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" x-model="search" placeholder="Search..." class="w-full pl-10 pr-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-800">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-800/50">
                <tr>
                    @foreach($columns as $col)
                        <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer select-none"
                            @if($col['sortable'] ?? true) x-on:click="sort('{{ $col['key'] }}')" @endif>
                            <span class="inline-flex items-center gap-1">
                                {{ $col['label'] }}
                                @if($col['sortable'] ?? true)
                                    <template x-if="sortField === '{{ $col['key'] }}'">
                                        <span x-text="sortDir === 'asc' ? '↑' : '↓'" class="text-indigo-500"></span>
                                    </template>
                                    <template x-if="sortField !== '{{ $col['key'] }}'">
                                        <span class="text-gray-300 dark:text-gray-600">↕</span>
                                    </template>
                                @endif
                            </span>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-800 bg-white dark:bg-gray-900">
                <template x-if="paginatedRows.length === 0">
                    <tr>
                        <td :colspan="{{ count($columns) }}" class="px-4 py-12 text-center text-sm text-gray-400">No results found.</td>
                    </tr>
                </template>
                <template x-for="(row, i) in paginatedRows" :key="i">
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                        @foreach($columns as $col)
                            <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400" x-html="formatCell(row, '{{ $col['key'] }}')"></td>
                        @endforeach
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500" x-text="`Showing ${startEntry} to ${endEntry} of ${filteredRows.length} entries`"></p>
        <div class="flex gap-1">
            <button x-on:click="prevPage" x-bind:disabled="currentPage === 1"
                class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 dark:border-gray-700 transition disabled:opacity-40 disabled:cursor-not-allowed"
                :class="currentPage === 1 ? 'text-gray-400 bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800'">Previous</button>
            <template x-for="page in visiblePages" :key="page">
                <button x-on:click="goToPage(page)"
                    class="px-3 py-1.5 text-sm rounded-lg border transition"
                    :class="page === currentPage ? 'bg-indigo-600 text-white border-indigo-600' : 'border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800'"
                    x-text="page"></button>
            </template>
            <button x-on:click="nextPage" x-bind:disabled="currentPage === totalPages"
                class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 dark:border-gray-700 transition disabled:opacity-40 disabled:cursor-not-allowed"
                :class="currentPage === totalPages ? 'text-gray-400 bg-gray-50 dark:bg-gray-800' : 'text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800'">Next</button>
        </div>
    </div>
</div>
