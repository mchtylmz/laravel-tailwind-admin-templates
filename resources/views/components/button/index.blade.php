<button {{ $attributes->merge(['type' => 'button'])->class([
    'inline-flex items-center justify-center font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-900',
    'px-4 py-2 text-sm' => !isset($size) || $size === 'md',
    'px-3 py-1.5 text-xs' => ($size ?? 'md') === 'sm',
    'px-5 py-2.5 text-base' => ($size ?? 'md') === 'lg',
    'px-6 py-3 text-lg' => ($size ?? 'md') === 'xl',
    'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500' => !isset($variant) || $variant === 'primary',
    'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500' => ($variant ?? '') === 'secondary',
    'bg-emerald-600 text-white hover:bg-emerald-700 focus:ring-emerald-500' => ($variant ?? '') === 'success',
    'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500' => ($variant ?? '') === 'danger',
    'bg-amber-500 text-white hover:bg-amber-600 focus:ring-amber-500' => ($variant ?? '') === 'warning',
    'border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 focus:ring-indigo-500' => ($variant ?? '') === 'outline',
    'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:ring-gray-500' => ($variant ?? '') === 'ghost',
]) }}>
    {{ $slot }}
</button>
