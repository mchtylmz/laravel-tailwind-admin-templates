<div x-data="carousel({ items: $el.children.length, autoplay: $el.getAttribute('autoplay') !== null })" class="relative overflow-hidden rounded-xl" {{ $attributes }}>
    <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + current * 100 + '%)'">
        {{ $slot }}
    </div>
    <button @click="prev" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/80 dark:bg-gray-900/80 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-900 transition-colors shadow">
        <x-heroicon-o-chevron-left class="w-4 h-4" />
    </button>
    <button @click="next" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white/80 dark:bg-gray-900/80 flex items-center justify-center text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-900 transition-colors shadow">
        <x-heroicon-o-chevron-right class="w-4 h-4" />
    </button>
    <div class="absolute bottom-2 left-1/2 -translate-x-1/2 flex gap-1.5">
        <template x-for="(_, i) in Array.from({ length: total })" :key="i">
            <button @click="goTo(i)" class="w-2 h-2 rounded-full transition-all" :class="i === current ? 'bg-white w-4' : 'bg-white/50 hover:bg-white/70'"></button>
        </template>
    </div>
</div>
