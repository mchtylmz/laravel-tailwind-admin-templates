<textarea {{ $attributes->class([
    'block w-full rounded-lg border px-3 py-2 text-sm shadow-sm transition-colors resize-vertical',
    'bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100',
    'border-gray-300 dark:border-gray-700',
    'placeholder:text-gray-400 dark:placeholder:text-gray-500',
    'focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500',
    'disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 dark:disabled:bg-gray-800/50',
    'border-red-500 dark:border-red-400' => $attributes->get('name') && $errors->has($attributes->get('name')),
]) }}></textarea>
