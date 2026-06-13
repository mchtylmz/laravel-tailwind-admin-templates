<x-layouts-admin>
    <x-slot:title>Calendar</x-slot:title>

    <div class="mb-6">
        <x-breadcrumbs :crumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Calendar']]" />
    </div>

    <div class="flex items-center justify-between mb-6" x-data="calendarApp">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white" x-text="monthYear"></h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Schedule and events</p>
        </div>
        <div class="flex items-center gap-2">
            <x-button variant="outline" size="sm" @click="prevMonth">
                <x-heroicon-o-chevron-left class="w-4 h-4" />
            </x-button>
            <x-button variant="outline" size="sm" @click="today">Today</x-button>
            <x-button variant="outline" size="sm" @click="nextMonth">
                <x-heroicon-o-chevron-right class="w-4 h-4" />
            </x-button>
            <x-button size="sm">+ Add Event</x-button>
        </div>
    </div>

    <x-card>
        <div class="grid grid-cols-7 gap-px bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden">
            @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                <div class="bg-gray-50 dark:bg-gray-900 px-3 py-2 text-center text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ $day }}</div>
            @endforeach

            @for ($i = 1; $i <= 35; $i++)
                @php
                    $dayNum = $i - 4; // Adjust for month start offset
                    $isToday = $dayNum === (int) date('j');
                    $isCurrentMonth = $dayNum >= 1 && $dayNum <= 31;
                    $events = $dayNum === 15 ? [['title' => 'Team meeting', 'color' => 'indigo']] : ($dayNum === 22 ? [['title' => 'Project deadline', 'color' => 'red']] : ($dayNum === 5 ? [['title' => 'Design review', 'color' => 'emerald']] : ($dayNum === 12 ? [['title' => 'Sprint planning', 'color' => 'amber'], ['title' => 'Client call', 'color' => 'purple']] : [])));
                @endphp
                <div @class([
                    'bg-white dark:bg-gray-900 min-h-[100px] p-2 transition-colors cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800/50',
                    'opacity-40' => !$isCurrentMonth,
                ])>
                    <span @class([
                        'inline-flex items-center justify-center w-7 h-7 text-sm rounded-full',
                        'bg-indigo-600 text-white font-medium' => $isToday,
                        'text-gray-700 dark:text-gray-300' => !$isToday,
                    ])>{{ $dayNum >= 1 && $dayNum <= 31 ? $dayNum : '' }}</span>
                    @if ($dayNum >= 1 && $dayNum <= 31)
                        @foreach ($events as $event)
                            <div class="mt-1 px-1.5 py-0.5 rounded text-xs font-medium truncate text-white bg-{{ $event['color'] }}-500">{{ $event['title'] }}</div>
                        @endforeach
                    @endif
                </div>
            @endfor
        </div>
    </x-card>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <div class="lg:col-span-2">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Upcoming Events</h2></x-slot:header>
                @php
                    $upcomingEvents = [
                        ['title' => 'Team standup', 'date' => 'Today, 9:00 AM', 'color' => 'indigo'],
                        ['title' => 'Design review', 'date' => 'Today, 2:00 PM', 'color' => 'emerald'],
                        ['title' => 'Sprint planning', 'date' => 'Tomorrow, 10:00 AM', 'color' => 'amber'],
                        ['title' => 'Client call', 'date' => 'Jun 12, 3:00 PM', 'color' => 'purple'],
                        ['title' => 'Project deadline', 'date' => 'Jun 22, 5:00 PM', 'color' => 'red'],
                    ];
                @endphp
                <div class="divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach ($upcomingEvents as $event)
                        <div class="flex items-center gap-3 py-3">
                            <span class="w-2 h-2 rounded-full bg-{{ $event['color'] }}-500"></span>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $event['title'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $event['date'] }}</p>
                            </div>
                            <x-button variant="ghost" size="xs">Edit</x-button>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
        <div>
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Quick Stats</h2></x-slot:header>
                <div class="space-y-4">
                    @foreach ([
                        ['label' => 'Total Events', 'value' => '14', 'color' => 'indigo'],
                        ['label' => 'This Week', 'value' => '5', 'color' => 'emerald'],
                        ['label' => 'Completed', 'value' => '8', 'color' => 'gray'],
                    ] as $stat)
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $stat['label'] }}</span>
                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $stat['value'] }}</span>
                        </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('calendarApp', () => ({
                month: new Date().getMonth(),
                year: new Date().getFullYear(),
                get monthYear() {
                    return new Date(this.year, this.month).toLocaleDateString('en-US', { month: 'long', year: 'numeric' })
                },
                prevMonth() { this.month--; if (this.month < 0) { this.month = 11; this.year-- } },
                nextMonth() { this.month++; if (this.month > 11) { this.month = 0; this.year++ } },
                today() { const d = new Date(); this.month = d.getMonth(); this.year = d.getFullYear() }
            }))
        })
    </script>
</x-layouts-admin>
