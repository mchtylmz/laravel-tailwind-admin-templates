<x-layouts-admin>
    <x-slot:title>Chat</x-slot:title>

    <div class="flex h-[calc(100vh-10rem)]" x-data="chatApp">
        <div class="w-80 flex-shrink-0 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 rounded-l-xl overflow-hidden">
            <div class="p-3 border-b border-gray-200 dark:border-gray-800">
                <x-input placeholder="Search conversations..." class="w-full" />
            </div>
            <div class="overflow-y-auto h-[calc(100%-4rem)]">
                @php
                    $conversations = [
                        ['name' => 'Alex Morgan', 'avatar' => 'AM', 'color' => 'indigo', 'lastMsg' => 'Sure, I\'ll review the PR today', 'time' => '2 min ago', 'unread' => 2, 'online' => true],
                        ['name' => 'Sarah Chen', 'avatar' => 'SC', 'color' => 'emerald', 'lastMsg' => 'The deployment is complete', 'time' => '15 min ago', 'unread' => 0, 'online' => true],
                        ['name' => 'James Wilson', 'avatar' => 'JW', 'color' => 'amber', 'lastMsg' => 'Can we schedule a meeting?', 'time' => '1 hour ago', 'unread' => 0, 'online' => false],
                        ['name' => 'Emily Davis', 'avatar' => 'ED', 'color' => 'purple', 'lastMsg' => 'Thanks for the feedback!', 'time' => '3 hours ago', 'unread' => 0, 'online' => true],
                        ['name' => 'Michael Brown', 'avatar' => 'MB', 'color' => 'pink', 'lastMsg' => 'I\'ll update the wireframes', 'time' => '5 hours ago', 'unread' => 0, 'online' => false],
                        ['name' => 'Diana Ross', 'avatar' => 'DR', 'color' => 'red', 'lastMsg' => 'Meeting at 3pm tomorrow', 'time' => '1 day ago', 'unread' => 0, 'online' => true],
                    ];
                @endphp
                @foreach ($conversations as $i => $conv)
                    <div class="flex items-center gap-3 px-3 py-3 cursor-pointer transition-colors hover:bg-gray-50 dark:hover:bg-gray-800/50 border-b border-gray-100 dark:border-gray-800/50"
                         :class="active === {{ $i }} ? 'bg-indigo-50 dark:bg-indigo-900/20' : ''"
                         @click="active = {{ $i }}">
                        <div class="relative">
                            <x-avatar size="sm" :color="$conv['color']">{{ $conv['avatar'] }}</x-avatar>
                            <span @class([
                                'absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 rounded-full border-2 border-white dark:border-gray-900',
                                'bg-emerald-500' => $conv['online'],
                                'bg-gray-400' => !$conv['online'],
                            ])></span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $conv['name'] }}</p>
                                <span class="text-xs text-gray-400 flex-shrink-0">{{ $conv['time'] }}</span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ $conv['lastMsg'] }}</p>
                        </div>
                        @if ($conv['unread'] > 0)
                            <span class="flex-shrink-0 w-5 h-5 rounded-full bg-indigo-600 text-white text-xs flex items-center justify-center">{{ $conv['unread'] }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex-1 flex flex-col bg-white dark:bg-gray-900 rounded-r-xl">
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-3">
                    <x-avatar size="sm" color="indigo">AM</x-avatar>
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Alex Morgan</p>
                        <p class="text-xs text-emerald-500">Online</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <x-heroicon-o-phone class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600 dark:hover:text-gray-300" />
                    <x-heroicon-o-video-camera class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600 dark:hover:text-gray-300" />
                    <x-heroicon-o-ellipsis-horizontal class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600 dark:hover:text-gray-300" />
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-4">
                @php
                    $messages = [
                        ['text' => 'Hey, have you reviewed the latest PR?', 'time' => '10:24 AM', 'side' => 'right'],
                        ['text' => 'Not yet, I\'ll check it out now', 'time' => '10:26 AM', 'side' => 'left'],
                        ['text' => 'Great, there are some changes to the API endpoints', 'time' => '10:27 AM', 'side' => 'right'],
                        ['text' => 'Sure, I\'ll review the PR today', 'time' => '10:30 AM', 'side' => 'left'],
                        ['text' => 'Let me know if you need any context', 'time' => '10:31 AM', 'side' => 'right'],
                        ['text' => 'Will do, thanks!', 'time' => '10:32 AM', 'side' => 'left'],
                    ];
                @endphp
                @foreach ($messages as $msg)
                    <div class="flex {{ $msg['side'] === 'right' ? 'justify-end' : 'justify-start' }}">
                        <div @class([
                            'max-w-[70%] rounded-2xl px-4 py-2.5',
                            'bg-indigo-600 text-white rounded-br-sm' => $msg['side'] === 'right',
                            'bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-bl-sm' => $msg['side'] === 'left',
                        ])>
                            <p class="text-sm">{{ $msg['text'] }}</p>
                            <p class="text-xs {{ $msg['side'] === 'right' ? 'text-indigo-200' : 'text-gray-400' }} mt-1">{{ $msg['time'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="p-3 border-t border-gray-200 dark:border-gray-800">
                <div class="flex items-center gap-2">
                    <div class="flex-1">
                        <x-input placeholder="Type a message..." class="w-full" />
                    </div>
                    <x-button size="sm">
                        <x-heroicon-o-paper-airplane class="w-4 h-4" />
                    </x-button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('chatApp', () => ({
                active: 0
            }))
        })
    </script>
</x-layouts-admin>
