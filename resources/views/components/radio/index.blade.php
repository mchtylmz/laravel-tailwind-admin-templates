<label class="inline-flex items-center gap-2 cursor-pointer">
    <input type="radio" {{ $attributes->class([
        'border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm',
        'focus:ring-2 focus:ring-indigo-500/20 focus:ring-offset-2 dark:focus:ring-offset-gray-900',
        'disabled:opacity-50 disabled:cursor-not-allowed',
    ]) }}>
    @if(isset($label))
        <span class="text-sm text-gray-700 dark:text-gray-300 select-none">{{ $label }}</span>
    @endif
</label>
