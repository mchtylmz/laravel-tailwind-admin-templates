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
                <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" />
            </template>
            <template x-if="toast.type === 'error'">
                <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 shrink-0 mt-0.5" />
            </template>
            <template x-if="toast.type === 'warning'">
                <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" />
            </template>
            <template x-if="toast.type === 'info'">
                <x-heroicon-o-information-circle class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" />
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
                <x-heroicon-o-x-mark class="w-4 h-4" />
            </button>
        </div>
    </template>
</div>
