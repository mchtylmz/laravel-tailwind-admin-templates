<x-layouts-admin>
    <x-slot:title>404 Not Found</x-slot:title>
    <div class="flex flex-col items-center justify-center py-16 text-center">
        <h1 class="text-8xl font-bold text-gray-200 dark:text-gray-800">404</h1>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">Page Not Found</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-2 max-w-md">The page you are looking for doesn't exist or has been moved.</p>
        <div class="flex gap-3 mt-6">
            <x-button onclick="history.back()" variant="outline">Go Back</x-button>
            <a href="{{ url('/') }}"><x-button>Go to Dashboard</x-button></a>
        </div>
    </div>
</x-layouts-admin>
