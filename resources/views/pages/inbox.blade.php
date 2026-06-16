<x-layouts-admin>
    <x-slot:title>Inbox</x-slot:title>

    <div class="mb-4 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Inbox</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your emails</p>
        </div>
        <x-button size="sm" @click="composeOpen = true">+ Compose</x-button>
    </div>

    @php
        $allEmails = [
            ['from' => 'Sarah Chen', 'email' => 'sarah@example.com', 'subject' => 'Deployment completed successfully', 'preview' => 'The new version has been deployed to production. All tests passed and everything looks good.', 'date' => '10:32 AM', 'read' => false, 'attachments' => 0, 'starred' => true],
            ['from' => 'James Wilson', 'email' => 'james@example.com', 'subject' => 'Q3 Budget Review Meeting', 'preview' => 'Hi team, let\'s schedule the quarterly budget review for next week. Please come prepared with your department numbers.', 'date' => '9:15 AM', 'read' => false, 'attachments' => 2, 'starred' => false],
            ['from' => 'Emily Davis', 'email' => 'emily@example.com', 'subject' => 'Design mockups for new landing page', 'preview' => 'I\'ve attached the latest mockups for the new landing page redesign. Let me know what you think about the hero section layout.', 'date' => 'Yesterday', 'read' => true, 'attachments' => 3, 'starred' => false],
            ['from' => 'Michael Brown', 'email' => 'michael@example.com', 'subject' => 'Server maintenance scheduled', 'preview' => 'We need to schedule maintenance for the database servers. I\'m proposing this Saturday at 2 AM PST.', 'date' => 'Yesterday', 'read' => false, 'attachments' => 0, 'starred' => false],
            ['from' => 'Diana Ross', 'email' => 'diana@example.com', 'subject' => 'New feature request: dark mode toggle', 'preview' => 'Several enterprise clients have requested dark mode support. Let\'s discuss implementation options in tomorrow\'s standup.', 'date' => '2 days ago', 'read' => true, 'attachments' => 0, 'starred' => true],
            ['from' => 'Alex Morgan', 'email' => 'alex@example.com', 'subject' => 'PR #284 ready for review', 'preview' => 'Hey, the API integration branch is ready. Could you take a look when you get a chance? There are some changes to the auth flow.', 'date' => '2 days ago', 'read' => true, 'attachments' => 0, 'starred' => false],
            ['from' => 'GitHub', 'email' => 'noreply@github.com', 'subject' => '[frontend] New comment on PR #281', 'preview' => '@johndoe commented: "The loading states look great. Can we add error handling for the API calls?"', 'date' => '3 days ago', 'read' => true, 'attachments' => 0, 'starred' => false],
            ['from' => 'Figma', 'email' => 'updates@figma.com', 'subject' => 'Sarah shared "Dashboard v3" with you', 'preview' => 'Sarah Chen has shared a new prototype with you. Click to view the latest design iteration.', 'date' => '3 days ago', 'read' => true, 'attachments' => 0, 'starred' => false],
            ['from' => 'Stripe', 'email' => 'notifications@stripe.com', 'subject' => 'New payment received - $1,299.00', 'preview' => 'A payment of $1,299.00 from Acme Corp has been successfully processed. Receipt attached.', 'date' => '4 days ago', 'read' => true, 'attachments' => 1, 'starred' => false],
        ];
    @endphp

    <div class="flex h-[calc(100vh-12rem)] rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900" x-data="inboxApp">
        <div class="w-56 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50 p-3 flex flex-col gap-1">
            @foreach ([
                ['name' => 'Inbox', 'icon' => 'inbox', 'count' => 12],
                ['name' => 'Sent', 'icon' => 'paper-airplane', 'count' => 3],
                ['name' => 'Drafts', 'icon' => 'pencil', 'count' => 2],
                ['name' => 'Trash', 'icon' => 'trash', 'count' => 0],
            ] as $f)
                <button @click="folder = '{{ $f['name'] }}'; selected = null"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors text-left"
                        :class="folder === '{{ $f['name'] }}' ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800'">
                    <x-heroicon-o-{{ $f['icon'] }} class="w-4 h-4 flex-shrink-0" />
                    <span class="flex-1">{{ $f['name'] }}</span>
                    @if ($f['count'] > 0)
                        <span class="text-xs px-1.5 py-0.5 rounded-full bg-indigo-100 dark:bg-indigo-900/40 text-indigo-700 dark:text-indigo-300">{{ $f['count'] }}</span>
                    @endif
                </button>
            @endforeach
        </div>

        <div class="flex-1 flex flex-col min-w-0">
            <div class="flex items-center gap-2 px-4 py-2.5 border-b border-gray-200 dark:border-gray-800">
                <div class="flex-1">
                    <x-input placeholder="Search emails..." class="w-full" x-model="search" />
                </div>
                <x-heroicon-o-adjustments-horizontal class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600" />
            </div>

            <div class="flex-1 flex min-h-0">
                <div class="w-full overflow-y-auto" x-show="!selected">
                    <template x-for="(e, i) in filteredEmails" :key="i">
                        <div class="flex items-center gap-3 px-4 py-3 cursor-pointer transition-colors border-b border-gray-100 dark:border-gray-800/50"
                             :class="{'bg-indigo-50 dark:bg-indigo-900/20': e.read === false, 'hover:bg-gray-50 dark:hover:bg-gray-800/30': true}"
                             x-on:click="openEmail(i)">
                            <div class="flex items-center gap-1" x-on:click.stop>
                                <x-heroicon-o-star class="w-4 h-4 cursor-pointer transition-colors"
                                    :class="e.starred ? 'text-amber-400 [&>path]:fill-amber-400' : 'text-gray-300 dark:text-gray-600 hover:text-amber-400'"
                                    x-on:click="e.starred = !e.starred" />
                            </div>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold text-white flex-shrink-0"
                                 :style="'background-color: ' + ['#6366f1','#10b981','#f59e0b','#ef4444','#8b5cf6','#ec4899','#06b6d4','#f97316','#14b8a6'][i % 9]"
                                 x-text="e.from.charAt(0)"></div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium truncate"
                                       :class="e.read ? 'text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white font-semibold'"
                                       x-text="e.from"></p>
                                    <span class="text-xs text-gray-400 flex-shrink-0 ml-2" x-text="e.date"></span>
                                </div>
                                <p class="text-sm truncate" :class="e.read ? 'text-gray-600 dark:text-gray-400' : 'text-gray-700 dark:text-gray-300 font-medium'" x-text="e.subject"></p>
                                <p class="text-xs text-gray-400 truncate" x-text="e.preview"></p>
                            </div>
                        </div>
                    </template>
                    <div x-show="filteredEmails.length === 0" class="flex items-center justify-center h-32 text-sm text-gray-400">No emails found</div>
                </div>

                <div class="w-full overflow-y-auto" x-show="selected !== null">
                    <template x-if="selected !== null">
                        <div>
                            <div class="flex items-center gap-2 px-4 py-2.5 border-b border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/30">
                                <x-button size="sm" variant="ghost" x-on:click="selected = null">
                                    <x-heroicon-o-arrow-left class="w-4 h-4" />
                                </x-button>
                                <div class="flex-1"></div>
                                <x-heroicon-o-trash class="w-4 h-4 text-gray-400 cursor-pointer hover:text-red-500" x-on:click="selected = null" />
                            </div>
                            <div class="p-6 max-w-3xl mx-auto">
                                <div class="flex items-start gap-4 mb-6">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-lg font-bold text-white flex-shrink-0"
                                         :style="'background-color: ' + ['#6366f1','#10b981','#f59e0b','#ef4444','#8b5cf6','#ec4899','#06b6d4','#f97316','#14b8a6'][emailIndex % 9]"
                                         x-text="currentEmail.from.charAt(0)"></div>
                                    <div class="flex-1">
                                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2" x-text="currentEmail.subject"></h2>
                                        <div class="flex items-center gap-2 text-sm">
                                            <span class="font-medium text-gray-900 dark:text-white" x-text="currentEmail.from"></span>
                                            <span class="text-gray-400">&lt;<span x-text="currentEmail.email"></span>&gt;</span>
                                        </div>
                                        <p class="text-xs text-gray-400 mt-1" x-text="currentEmail.date"></p>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed" x-text="currentEmail.preview"></div>
                                <template x-if="currentEmail.attachments > 0">
                                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-800">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white mb-3">Attachments</p>
                                        <div class="flex flex-wrap gap-3">
                                            <template x-for="a in currentEmail.attachments" :key="a">
                                                <div class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-sm">
                                                    <x-heroicon-o-paper-clip class="w-4 h-4 text-gray-400" />
                                                    <span class="text-gray-600 dark:text-gray-400" x-text="'file_' + a + '.pdf'"></span>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div x-show="composeOpen"
             x-transition.opacity.duration.200ms
             class="fixed inset-0 z-50 flex items-start justify-center pt-16 p-4 bg-gray-900/50 backdrop-blur-sm"
             x-on:click="composeOpen = false">
            <div x-on:click.stop
                 class="w-full max-w-lg bg-white dark:bg-gray-900 rounded-xl shadow-xl border border-gray-200 dark:border-gray-800 overflow-hidden"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200 dark:border-gray-800">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">New Message</h3>
                    <button x-on:click="composeOpen = false" class="p-1 rounded-lg text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <x-heroicon-o-x-mark class="w-5 h-5" />
                    </button>
                </div>
                <div class="p-5 space-y-4">
                    <div>
                        <input type="text" placeholder="To" value="sarah@example.com"
                               class="w-full px-0 py-2 border-0 border-b border-gray-200 dark:border-gray-700 bg-transparent text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:ring-0 focus:border-indigo-500">
                    </div>
                    <div>
                        <input type="text" placeholder="Subject"
                               class="w-full px-0 py-2 border-0 border-b border-gray-200 dark:border-gray-700 bg-transparent text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:ring-0 focus:border-indigo-500">
                    </div>
                    <div>
                        <textarea rows="8" placeholder="Write your message..."
                                  class="w-full px-0 py-2 border-0 bg-transparent text-sm text-gray-900 dark:text-white placeholder-gray-400 resize-none focus:ring-0"></textarea>
                    </div>
                </div>
                <div class="flex items-center justify-between px-5 py-3 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-paper-clip class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600" />
                        <x-heroicon-o-photo class="w-4 h-4 text-gray-400 cursor-pointer hover:text-gray-600" />
                    </div>
                    <div class="flex items-center gap-2">
                        <x-button variant="ghost" size="sm" x-on:click="composeOpen = false">Discard</x-button>
                        <x-button size="sm" x-on:click="composeOpen = false; $dispatch('toast', { type: 'success', title: 'Sent', message: 'Your message has been sent.' })">Send</x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('inboxApp', () => ({
                folder: 'Inbox',
                search: '',
                selected: null,
                composeOpen: false,
                emails: @json($allEmails),

                get filteredEmails() {
                    let list = this.emails
                    if (this.folder === 'Sent') return []
                    if (this.folder === 'Drafts') return []
                    if (this.folder === 'Trash') return []
                    if (this.search) {
                        const q = this.search.toLowerCase()
                        list = list.filter(e => e.from.toLowerCase().includes(q) || e.subject.toLowerCase().includes(q) || e.preview.toLowerCase().includes(q))
                    }
                    return list
                },

                get emailIndex() {
                    return this.emails.indexOf(this.currentEmail)
                },

                get currentEmail() {
                    return this.selected !== null ? this.emails[this.selected] : { from: '', email: '', subject: '', preview: '', date: '', read: true, attachments: 0, starred: false }
                },

                openEmail(i) {
                    this.selected = i
                    this.emails[i].read = true
                }
            }))
        })
    </script>
</x-layouts-admin>
