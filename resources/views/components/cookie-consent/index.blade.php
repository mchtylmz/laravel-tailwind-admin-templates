<div x-data="cookieConsent" x-show="show" x-transition class="fixed bottom-0 inset-x-0 z-50 p-4">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-900 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-800 p-4 flex items-center justify-between gap-4">
        <div class="flex items-start gap-3">
            <x-heroicon-o-shield-exclamation class="w-6 h-6 text-amber-500 flex-shrink-0 mt-0.5" />
            <div>
                <p class="text-sm font-medium text-gray-900 dark:text-white">We use cookies</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">This site uses cookies to improve your experience. By continuing, you agree to our cookie policy.</p>
            </div>
        </div>
        <div class="flex gap-2 flex-shrink-0">
            <x-button variant="outline" size="sm" @click="decline">Decline</x-button>
            <x-button size="sm" @click="accept">Accept All</x-button>
        </div>
    </div>
</div>
