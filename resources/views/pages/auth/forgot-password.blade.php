<x-layouts-guest>
    <x-slot:title>Forgot Password</x-slot:title>
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">Reset password</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Enter your email and we'll send you a reset link</p>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input type="email" class="w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500">
            </div>
            <x-button class="w-full">Send Reset Link</x-button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-500 dark:text-gray-400">
            Remember your password? <a href="{{ url('/login') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Sign in</a>
        </p>
    </div>
</x-layouts-guest>
