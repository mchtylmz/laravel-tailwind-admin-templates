<x-layouts-admin>
    <x-slot:title>403 Forbidden</x-slot:title>
    <div class="flex flex-col items-center justify-center py-16 text-center">
        <h1 class="text-8xl font-bold text-gray-200 dark:text-gray-800">403</h1>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-4">Access Denied</h2>
        <p class="text-gray-500 dark:text-gray-400 mt-2 max-w-md">You don't have permission to access this resource. Please contact your administrator.</p>
        <div class="flex gap-3 mt-6">
            <x-button onclick="history.back()" variant="outline">Go Back</x-button>
            <a href="{{ url('/') }}"><x-button>Go to Dashboard</x-button></a>
        </div>
    </div>
</x-layouts-admin>
