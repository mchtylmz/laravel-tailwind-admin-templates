<div x-data="tab" {{ $attributes->merge(['class' => '']) }}>
    <div class="flex border-b border-gray-200 dark:border-gray-800 gap-1" role="tablist">
        {{ $tabs }}
    </div>
    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
