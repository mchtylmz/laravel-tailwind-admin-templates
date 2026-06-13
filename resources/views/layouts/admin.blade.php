<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel Admin Templates' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100">
<div id="app" class="flex h-screen overflow-hidden">
    <x-sidebar/>
    <div class="flex flex-1 flex-col overflow-y-auto" x-bind:class="$store.sidebar.collapsed ? 'lg:ml-20' : 'lg:ml-64'">
        <x-navbar/>
        <main class="flex-1 p-4 lg:p-6">
            {{ $slot }}
        </main>
        <footer class="border-t border-gray-200 dark:border-gray-800 px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} Laravel Tailwind Admin Templates
        </footer>
    </div>
</div>
<x-toast />
</body>
</html>
