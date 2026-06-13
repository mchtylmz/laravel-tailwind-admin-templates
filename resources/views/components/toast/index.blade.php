<div
    x-data="toastStore"
    x-on:toast.window="add($event.detail)"
    class="fixed bottom-4 right-4 z-50 flex flex-col gap-2 pointer-events-none"
    style="max-width: 24rem;"
>
    <template x-for="(toast, i) in toasts" :key="toast.id">
        <div
            x-show="toast.show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-8 opacity-0"
            x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="translate-x-8 opacity-0"
            class="pointer-events-auto rounded-xl shadow-lg border p-4 flex items-start gap-3 backdrop-blur-sm"
            :class="{
                'bg-emerald-50 dark:bg-emerald-950 border-emerald-200 dark:border-emerald-800': toast.type === 'success',
                'bg-red-50 dark:bg-red-950 border-red-200 dark:border-red-800': toast.type === 'error',
                'bg-amber-50 dark:bg-amber-950 border-amber-200 dark:border-amber-800': toast.type === 'warning',
                'bg-blue-50 dark:bg-blue-950 border-blue-200 dark:border-blue-800': toast.type === 'info',
            }"
        >
            <template x-if="toast.type === 'success'">
                <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </template>
            <template x-if="toast.type === 'error'">
                <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </template>
            <template x-if="toast.type === 'warning'">
                <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
            </template>
            <template x-if="toast.type === 'info'">
                <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </template>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold" x-text="toast.title" :class="{
                    'text-emerald-800 dark:text-emerald-200': toast.type === 'success',
                    'text-red-800 dark:text-red-200': toast.type === 'error',
                    'text-amber-800 dark:text-amber-200': toast.type === 'warning',
                    'text-blue-800 dark:text-blue-200': toast.type === 'info',
                }"></p>
                <p class="text-sm mt-0.5" x-text="toast.message" :class="{
                    'text-emerald-700 dark:text-emerald-300': toast.type === 'success',
                    'text-red-700 dark:text-red-300': toast.type === 'error',
                    'text-amber-700 dark:text-amber-300': toast.type === 'warning',
                    'text-blue-700 dark:text-blue-300': toast.type === 'info',
                }"></p>
            </div>
            <button x-on:click="remove(toast.id)" class="shrink-0 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </template>
</div>
