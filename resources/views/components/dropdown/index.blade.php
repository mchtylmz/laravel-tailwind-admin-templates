<div x-data="dropdown" {{ $attributes->merge(['class' => 'relative inline-block']) }}>
    <div @click="toggle()">
        {{ $trigger }}
    </div>
    <div x-show="open" @click.outside="close()" x-transition class="absolute z-40 mt-2 min-w-[12rem] rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg py-1"
         x-bind:class="{
             'left-0': (align ?? 'left') === 'left',
             'right-0': align === 'right'
         }">
        {{ $slot }}
    </div>
</div>
