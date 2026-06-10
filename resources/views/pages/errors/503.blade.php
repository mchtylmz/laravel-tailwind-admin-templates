<x-layouts-admin>
    <x-slot:title>503 Service Unavailable</x-slot:title>
    <div class="flex flex-col items-center justify-center py-16 text-center">
        <h1 class="text-8xl font-bold text-gray-200 dark:text-gray-800">503</h1>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">Service Unavailable</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-2 max-w-md">We are currently undergoing maintenance. Please check back shortly.</p>
        <div class="flex gap-3 mt-6">
            <a href="{{ url('/') }}"><x-button>Try Again</x-button></a>
        </div>
    </div>
</x-layouts-admin>
