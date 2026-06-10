<x-layouts-guest>
    <x-slot:title>Login</x-slot:title>
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Welcome back</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Sign in to your account</p>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input type="email" value="admin@example.com" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                <input type="password" value="password" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2">
                    <input type="checkbox" checked class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
                <a href="{{ url('/forgot-password') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Forgot password?</a>
            </div>
            <x-button class="w-full">Sign in</x-button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-500 dark:text-gray-400">
            Don't have an account? <a href="{{ url('/register') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Register</a>
        </p>
    </div>
</x-layouts-guest>
