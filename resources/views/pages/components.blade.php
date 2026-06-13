<x-layouts-admin>
    <x-slot:title>Components</x-slot:title>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Components</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">UI component showcase</p>
    </div>

    <div class="space-y-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Buttons</h2></x-slot:header>
            <div class="flex flex-wrap gap-3 items-center">
                <x-button variant="primary">Primary</x-button>
                <x-button variant="secondary">Secondary</x-button>
                <x-button variant="success">Success</x-button>
                <x-button variant="danger">Danger</x-button>
                <x-button variant="warning">Warning</x-button>
                <x-button variant="outline">Outline</x-button>
                <x-button variant="ghost">Ghost</x-button>
            </div>
            <div class="flex flex-wrap gap-3 items-center mt-4">
                <x-button size="sm">Small</x-button>
                <x-button size="md">Medium</x-button>
                <x-button size="lg">Large</x-button>
                <x-button size="xl">Extra Large</x-button>
            </div>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Alerts</h2></x-slot:header>
            <div class="space-y-3">
                <x-alert type="success">Your changes have been saved successfully.</x-alert>
                <x-alert type="danger">There was an error processing your request.</x-alert>
                <x-alert type="warning">Your session will expire in 5 minutes.</x-alert>
                <x-alert type="info">A new version is available. Please update.</x-alert>
            </div>
        </x-card>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Cards</h2></x-slot:header>
                <div class="grid grid-cols-1 gap-4">
                    <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Hover Card</h3>
                        <p class="text-xs text-gray-500 mt-1">This card has hover shadow effect.</p>
                    </div>
                    <div class="p-4 rounded-lg bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800">
                        <h3 class="text-sm font-semibold text-indigo-900 dark:text-indigo-200">Highlighted Card</h3>
                        <p class="text-xs text-indigo-700 dark:text-indigo-300 mt-1">This card has a colored background.</p>
                    </div>
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Modals</h2></x-slot:header>
                <div class="space-y-4">
                    <div class="flex flex-wrap gap-3">
                        <x-button @click="$dispatch('open-modal', { size: 'sm', title: 'Small Modal' })">Small</x-button>
                        <x-button @click="$dispatch('open-modal', { size: 'md', title: 'Medium Modal' })">Medium</x-button>
                        <x-button @click="$dispatch('open-modal', { size: 'lg', title: 'Large Modal' })">Large</x-button>
                        <x-button @click="$dispatch('open-modal', { size: 'xl', title: 'XL Modal' })">XL</x-button>
                        <x-button @click="$dispatch('open-modal', { size: 'full', title: 'Full Screen Modal' })">Full</x-button>
                    </div>
                    <p class="text-xs text-gray-500">Click a button to open a modal with different sizes.</p>
                </div>
            </x-card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Tabs</h2></x-slot:header>
                <div x-data="tab">
                    <div class="flex border-b border-gray-200 dark:border-gray-800 gap-1">
                        @foreach(['Tab 1', 'Tab 2', 'Tab 3'] as $i => $t)
                            <button @click="set('tab-' + {{ $i }})" class="px-4 py-2 text-sm font-medium border-b-2 transition-colors"
                                    x-bind:class="active === 'tab-' + {{ $i }} ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700'">{{ $t }}</button>
                        @endforeach
                    </div>
                    @foreach(['First tab content', 'Second tab content', 'Third tab content'] as $i => $content)
                        <div x-show="active === 'tab-' + {{ $i }}" class="mt-4 text-sm text-gray-600 dark:text-gray-400">{{ $content }}</div>
                    @endforeach
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Dropdowns</h2></x-slot:header>
                <div class="flex gap-2">
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button variant="outline">Actions ▾</x-button>
                        </x-slot:trigger>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Edit</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Duplicate</a>
                        <hr class="my-1 border-gray-200 dark:border-gray-700">
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">Delete</a>
                    </x-dropdown>
                    <p class="text-xs text-gray-500 self-center">Click to toggle dropdown</p>
                </div>
            </x-card>
        </div>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Empty State</h2></x-slot:header>
            <x-emptystate title="No results found" description="Try adjusting your search or filter to find what you're looking for.">
                <x-slot:icon>
                    <x-heroicon-o-inbox class="w-8 h-8" />
                </x-slot:icon>
                <x-slot:action>
                    <x-button variant="outline" size="sm">Clear Filters</x-button>
                </x-slot:action>
            </x-emptystate>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Toast Notifications</h2></x-slot:header>
            <div class="flex flex-wrap gap-3">
                <x-button @click="$dispatch('toast', { type: 'success', title: 'Success', message: 'Your changes have been saved.' })">Success</x-button>
                <x-button variant="danger" @click="$dispatch('toast', { type: 'error', title: 'Error', message: 'Something went wrong.' })">Error</x-button>
                <x-button variant="warning" @click="$dispatch('toast', { type: 'warning', title: 'Warning', message: 'Your session is about to expire.' })">Warning</x-button>
                <x-button variant="outline" @click="$dispatch('toast', { type: 'info', title: 'Info', message: 'A new version is available.' })">Info</x-button>
            </div>
            <p class="text-xs text-gray-500 mt-3">Click a button to trigger a toast (appears bottom-right).</p>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Table</h2></x-slot:header>
            <x-table :header="['Name', 'Email', 'Status']">
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">John Doe</td>
                    <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">john@example.com</td>
                    <td class="px-4 py-3"><span class="text-xs px-2 py-0.5 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300">Active</span></td>
                </tr>
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-4 py-3 text-sm font-medium text-gray-900 dark:text-white">Jane Smith</td>
                    <td class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">jane@example.com</td>
                    <td class="px-4 py-3"><span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400">Inactive</span></td>
                </tr>
            </x-table>
        </x-card>
    </div>

    <div class="space-y-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Form Inputs</h2></x-slot:header>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <x-label>Text Input</x-label>
                        <x-input name="text" placeholder="Enter text..." />
                    </div>
                    <div>
                        <x-label>Password</x-label>
                        <x-input type="password" name="password" placeholder="Enter password..." />
                    </div>
                    <div>
                        <x-label>Email</x-label>
                        <x-input type="email" name="email" placeholder="email@example.com" />
                    </div>
                    <div>
                        <x-label>Number</x-label>
                        <x-input type="number" name="number" placeholder="0" />
                    </div>
                    <div>
                        <x-label>Select</x-label>
                        <x-select name="select">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </x-select>
                    </div>
                    <div>
                        <x-label>Textarea</x-label>
                        <x-textarea name="textarea" rows="3" placeholder="Write something..." />
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <x-label>Checkboxes</x-label>
                        <div class="space-y-2 mt-1">
                            <x-checkbox name="check1" label="Option A" />
                            <x-checkbox name="check2" label="Option B" />
                            <x-checkbox name="check3" label="Option C (disabled)" disabled />
                        </div>
                    </div>
                    <div>
                        <x-label>Radio Buttons</x-label>
                        <div class="space-y-2 mt-1">
                            <x-radio name="radio" value="1" label="Choice 1" />
                            <x-radio name="radio" value="2" label="Choice 2" />
                            <x-radio name="radio" value="3" label="Choice 3 (disabled)" disabled />
                        </div>
                    </div>
                    <div>
                        <x-label>File Upload</x-label>
                        <x-file-upload name="file" help="PNG, JPG up to 2MB" />
                    </div>
                    <div>
                        <x-label>With Error</x-label>
                        <x-input name="error" placeholder="This has an error..." />
                        <x-form-error>This field is required.</x-form-error>
                    </div>
                    <div>
                        <x-label>Disabled</x-label>
                        <x-input name="disabled" value="Cannot edit" disabled />
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    <div class="space-y-6">
        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Badges</h2></x-slot:header>
            <div class="space-y-4">
                <div class="flex flex-wrap gap-2 items-center">
                    <x-badge color="indigo">Indigo</x-badge>
                    <x-badge color="emerald">Emerald</x-badge>
                    <x-badge color="amber">Amber</x-badge>
                    <x-badge color="red">Red</x-badge>
                    <x-badge color="cyan">Cyan</x-badge>
                    <x-badge color="purple">Purple</x-badge>
                    <x-badge color="pink">Pink</x-badge>
                    <x-badge color="gray">Gray</x-badge>
                </div>
                <div class="flex flex-wrap gap-2 items-center">
                    <x-badge size="sm">Small</x-badge>
                    <x-badge size="md">Medium</x-badge>
                    <x-badge size="lg">Large</x-badge>
                </div>
                <div class="flex flex-wrap gap-2 items-center">
                    <x-badge dot color="emerald">Online</x-badge>
                    <x-badge dot color="amber">Away</x-badge>
                    <x-badge dot color="red">Offline</x-badge>
                    <x-badge :dismissible="true" color="indigo">Dismissible</x-badge>
                </div>
            </div>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Progress Bars</h2></x-slot:header>
            <div class="space-y-5">
                <x-progress label="Storage" :value="75" :percent="75" color="indigo" />
                <x-progress label="Bandwidth" :value="45" :percent="45" color="emerald" />
                <x-progress label="CPU" :value="60" :percent="60" color="amber" />
                <x-progress label="Memory" :value="85" :percent="85" color="red" />
                <div class="flex gap-4 pt-2">
                    <x-progress :percent="50" size="sm" class="flex-1" />
                    <x-progress :percent="50" size="md" class="flex-1" />
                    <x-progress :percent="50" size="lg" class="flex-1" />
                </div>
            </div>
        </x-card>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Spinner & Skeleton</h2></x-slot:header>
            <div class="space-y-4">
                <div class="flex flex-wrap gap-4 items-center">
                    <x-spinner size="sm" />
                    <x-spinner size="md" />
                    <x-spinner size="lg" />
                    <x-spinner size="xl" label="Loading..." />
                </div>
                <div class="grid grid-cols-4 gap-3">
                    <x-skeleton size="text" />
                    <x-skeleton size="title" />
                    <x-skeleton size="avatar" />
                    <x-skeleton size="card" />
                </div>
                <div>
                    <x-skeleton size="image" />
                </div>
            </div>
        </x-card>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Pagination</h2></x-slot:header>
                <div class="space-y-3">
                    <x-pagination :current="3" :total="10" />
                    <p class="text-xs text-gray-500 mt-2">Click buttons to dispatch page-changed event.</p>
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Breadcrumbs</h2></x-slot:header>
                <x-breadcrumbs :crumbs="[
                    ['label' => 'Home', 'url' => '/'],
                    ['label' => 'Users', 'url' => '/users'],
                    ['label' => 'Settings'],
                ]" />
                <p class="text-xs text-gray-500 mt-3">Deep linking example:</p>
                <x-breadcrumbs :crumbs="[
                    ['label' => 'Home', 'url' => '/'],
                    ['label' => 'Dashboard', 'url' => '/dashboard'],
                    ['label' => 'Analytics', 'url' => '/dashboard/analytics'],
                    ['label' => 'Reports'],
                ]" class="mt-2" />
            </x-card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Tooltips</h2></x-slot:header>
                <div class="flex flex-wrap gap-6 items-center py-8">
                    <x-tooltip position="top" trigger="true">
                        <x-slot:trigger>
                            <x-button variant="outline" size="sm">Top</x-button>
                        </x-slot:trigger>
                        Top tooltip
                    </x-tooltip>
                    <x-tooltip position="bottom">
                        <x-slot:trigger>
                            <x-button variant="outline" size="sm">Bottom</x-button>
                        </x-slot:trigger>
                        Bottom tooltip
                    </x-tooltip>
                    <x-tooltip position="left">
                        <x-slot:trigger>
                            <x-button variant="outline" size="sm">Left</x-button>
                        </x-slot:trigger>
                        Left tooltip
                    </x-tooltip>
                    <x-tooltip position="right">
                        <x-slot:trigger>
                            <x-button variant="outline" size="sm">Right</x-button>
                        </x-slot:trigger>
                        Right tooltip
                    </x-tooltip>
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Accordion</h2></x-slot:header>
                <x-accordion :items="[
                    ['title' => 'What is this template?', 'content' => 'This is a Laravel admin template built with Tailwind CSS v4 and Alpine.js.'],
                    ['title' => 'How do I use components?', 'content' => 'Use the x- prefix followed by component name. Example: &lt;x-button&gt;Click&lt;/x-button&gt;.'],
                    ['title' => 'Is dark mode supported?', 'content' => 'Yes, all components support dark mode out of the box. Toggle with the sun/moon icon in the navbar.'],
                    ['title' => 'Can I customize colors?', 'content' => 'You can customize Tailwind colors in your app.css file or override component classes via attributes.'],
                ]" />
            </x-card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Avatars</h2></x-slot:header>
                <div class="space-y-4">
                    <div class="flex flex-wrap gap-3 items-center">
                        <x-avatar size="xs">A</x-avatar>
                        <x-avatar size="sm">B</x-avatar>
                        <x-avatar size="md">C</x-avatar>
                        <x-avatar size="lg">D</x-avatar>
                        <x-avatar size="xl">E</x-avatar>
                    </div>
                    <div class="flex flex-wrap gap-3 items-center">
                        <x-avatar color="indigo">ID</x-avatar>
                        <x-avatar color="emerald">EM</x-avatar>
                        <x-avatar color="amber">AM</x-avatar>
                        <x-avatar color="red">RD</x-avatar>
                        <x-avatar color="cyan">CY</x-avatar>
                        <x-avatar color="purple">PR</x-avatar>
                        <x-avatar color="pink">PK</x-avatar>
                        <x-avatar color="gray">GY</x-avatar>
                    </div>
                    <div class="flex flex-wrap gap-3 items-center">
                        <div class="relative inline-flex">
                            <x-avatar size="md" status="online">ON</x-avatar>
                        </div>
                        <div class="relative inline-flex">
                            <x-avatar size="md" status="away">AW</x-avatar>
                        </div>
                        <div class="relative inline-flex">
                            <x-avatar size="md" status="offline">OF</x-avatar>
                        </div>
                        <div class="relative inline-flex">
                            <x-avatar size="md" status="busy">BS</x-avatar>
                        </div>
                    </div>
                </div>
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Rating</h2></x-slot:header>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 mb-2">Interactive</p>
                        <div x-data="{ rating: 3 }">
                            <x-rating x-bind:value="rating" :interactive="true" size="md" />
                            <p class="text-xs text-gray-500 mt-1" x-text="'Rating: ' + rating + '/5'"></p>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-2">Read-only sizes</p>
                        <div class="flex flex-col gap-2">
                            <x-rating :value="4" size="sm" />
                            <x-rating :value="3" size="md" />
                            <x-rating :value="5" size="lg" label="Excellent" />
                        </div>
                    </div>
                </div>
            </x-card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Timeline</h2></x-slot:header>
                @php
                    $timelineItems = [
                        ['title' => 'Order placed', 'description' => 'Order #1234 has been placed successfully.', 'time' => '2 min ago', 'color' => 'emerald',
                         'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'],
                        ['title' => 'Payment received', 'description' => 'Payment of $249.00 confirmed.', 'time' => '1 hour ago', 'color' => 'indigo',
                         'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z"/></svg>'],
                        ['title' => 'Processing started', 'description' => 'Order is being prepared for shipping.', 'time' => '3 hours ago', 'color' => 'amber',
                         'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>'],
                        ['title' => 'Shipped', 'description' => 'Package has been shipped via UPS.', 'time' => '1 day ago', 'color' => 'emerald',
                         'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>'],
                    ];
                @endphp
                <x-timeline :items="$timelineItems" />
            </x-card>

            <x-card>
                <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">List Group</h2></x-slot:header>
                @php
                    $listItems = [
                        ['icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>', 'title' => 'Messages', 'description' => '12 unread messages', 'color' => 'indigo', 'badge' => ['text' => '12', 'color' => 'red']],
                        ['icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>', 'title' => 'Notifications', 'description' => 'Push notifications settings', 'color' => 'amber', 'badge' => ['text' => '3', 'color' => 'amber']],
                        ['icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>', 'title' => 'Security', 'description' => 'Two-factor authentication', 'color' => 'emerald', 'badge' => ['text' => 'Active', 'color' => 'emerald']],
                        ['icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>', 'title' => 'Settings', 'description' => 'Account preferences', 'color' => 'purple'],
                    ];
                @endphp
                <x-list-group :items="$listItems" />
            </x-card>
        </div>

        <x-card>
            <x-slot:header><h2 class="text-lg font-semibold text-gray-900 dark:text-white">Charts</h2></x-slot:header>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Line Chart</p>
                    <x-chart type="line" :height="250"
                        :labels="['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug']"
                        :datasets="[[
                            'label' => 'Revenue 2025',
                            'data' => [300, 450, 380, 520, 490, 600, 550, 680],
                            'borderColor' => '#6366f1',
                            'backgroundColor' => 'rgba(99,102,241,0.1)',
                            'fill' => true,
                            'tension' => 0.4,
                        ], [
                            'label' => 'Revenue 2026',
                            'data' => [400, 520, 460, 600, 580, 700, 650, 780],
                            'borderColor' => '#10b981',
                            'backgroundColor' => 'rgba(16,185,129,0.1)',
                            'fill' => true,
                            'tension' => 0.4,
                        ]]" />
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Bar Chart</p>
                    <x-chart type="bar" :height="250"
                        :labels="['Mon','Tue','Wed','Thu','Fri','Sat','Sun']"
                        :datasets="[[
                            'label' => 'Visitors',
                            'data' => [1200, 1900, 1500, 2200, 1800, 2400, 2100],
                            'backgroundColor' => ['#6366f1','#10b981','#f59e0b','#ef4444','#06b6d4','#8b5cf6','#ec4899'],
                        ]]" />
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pie Chart</p>
                    <x-chart type="pie" :height="250"
                        :labels="['Direct', 'Organic', 'Social', 'Referral', 'Email']"
                        :datasets="[[
                            'label' => 'Traffic',
                            'data' => [35, 28, 20, 12, 5],
                            'backgroundColor' => ['#6366f1','#10b981','#f59e0b','#06b6d4','#ec4899'],
                        ]]" />
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Doughnut Chart</p>
                    <x-chart type="doughnut" :height="250"
                        :labels="['Desktop', 'Mobile', 'Tablet']"
                        :datasets="[[
                            'label' => 'Devices',
                            'data' => [55, 35, 10],
                            'backgroundColor' => ['#6366f1','#10b981','#f59e0b'],
                        ]]" />
                </div>
            </div>
        </x-card>
    </div>

    <div x-data="{ modalOpen: false, modalSize: 'md', modalTitle: 'Modal' }"
         @open-modal.window="modalSize = $event.detail.size; modalTitle = $event.detail.title || 'Modal ' + $event.detail.size.toUpperCase(); modalOpen = true"
         @keydown.window.escape="modalOpen = false">
        <div x-show="modalOpen" x-transition.opacity.duration.200ms
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50 backdrop-blur-sm"
             @click="modalOpen = false">
            <div @click.stop
                 class="bg-white dark:bg-gray-900 rounded-xl shadow-xl border border-gray-200 dark:border-gray-800 w-full overflow-hidden"
                 x-bind:class="{
                     'max-w-sm': modalSize === 'sm',
                     'max-w-lg': modalSize === 'md',
                     'max-w-2xl': modalSize === 'lg',
                     'max-w-4xl': modalSize === 'xl',
                     'max-w-full mx-4': modalSize === 'full',
                 }"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200 dark:border-gray-800">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" x-text="modalTitle"></h3>
                    <button @click="modalOpen = false" class="p-1 rounded-lg text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                        <x-heroicon-o-x-mark class="w-5 h-5" />
                    </button>
                </div>
                <div class="px-5 py-4 max-h-[70vh] overflow-y-auto text-sm text-gray-600 dark:text-gray-400">
                    <p>This is a <span x-text="modalSize"></span>-sized modal dialog.</p>
                    <p class="mt-2">You can close it by clicking the backdrop, the X button, or pressing Escape.</p>
                    <template x-if="modalSize === 'full'">
                        <div class="mt-4 grid grid-cols-3 gap-4">
                            <div class="h-24 rounded-lg bg-indigo-100 dark:bg-indigo-900/30"></div>
                            <div class="h-24 rounded-lg bg-emerald-100 dark:bg-emerald-900/30"></div>
                            <div class="h-24 rounded-lg bg-amber-100 dark:bg-amber-900/30"></div>
                            <div class="h-24 rounded-lg bg-rose-100 dark:bg-rose-900/30"></div>
                            <div class="h-24 rounded-lg bg-cyan-100 dark:bg-cyan-900/30"></div>
                            <div class="h-24 rounded-lg bg-purple-100 dark:bg-purple-900/30"></div>
                        </div>
                    </template>
                </div>
                <div class="flex items-center justify-end gap-2 px-5 py-3 border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50 rounded-b-xl">
                    <x-button variant="outline" size="sm" @click="modalOpen = false">Cancel</x-button>
                    <x-button size="sm" @click="modalOpen = false">Confirm</x-button>
                </div>
            </div>
        </div>
    </div>
</x-layouts-admin>
