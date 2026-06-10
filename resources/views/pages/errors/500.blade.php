<x-layouts-admin>
    <x-slot:title>500 Server Error</x-slot:title>
    <div class="flex flex-col items-center justify-center py-16 text-center">
        <h1 class="text-8xl font-bold text-gray-200 dark:text-gray-800">500</h1>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">Server Error</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-2 max-w-md">Something went wrong on our end. Please try again later.</p>
        <div class="flex gap-3 mt-6">
            <x-button onclick="location.reload()" variant="outline">Try Again</x-button>
            <a href="{{ url('/') }}"><x-button>Go to Dashboard</x-button></a>
        </div>
    </div>
</x-layouts-admin>
