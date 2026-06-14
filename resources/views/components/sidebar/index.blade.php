<aside class="fixed inset-y-0 left-0 z-30 flex flex-col bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 transition-all duration-300 lg:translate-x-0"
       x-bind:class="{
           'w-20': $store.sidebar.collapsed,
           'w-64': !$store.sidebar.collapsed,
           'translate-x-0': $store.sidebar.open,
           '-translate-x-full': !$store.sidebar.open
       }"
       @keydown.window.escape="if (window.innerWidth < 1024) $store.sidebar.close()">
    <div class="flex items-center h-16 px-4 border-b border-gray-200 dark:border-gray-800">
        <div class="flex items-center gap-3" x-show="!$store.sidebar.collapsed">
            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white text-sm font-bold">L</div>
            <span class="font-bold text-gray-900 dark:text-white text-sm">Admin Panel</span>
        </div>
        <div class="flex items-center justify-center w-full" x-show="$store.sidebar.collapsed">
            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white text-sm font-bold">L</div>
        </div>
    </div>
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
        <div>
            <p class="px-3 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2" x-show="!$store.sidebar.collapsed">Dashboard</p>
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('/') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-squares-2x2 class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Analytics</span>
            </a>
            <a href="{{ url('/dashboard/ecommerce') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('dashboard/ecommerce') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-shopping-cart class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Ecommerce</span>
            </a>
            <a href="{{ url('/dashboard/crm') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('dashboard/crm') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-users class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">CRM</span>
            </a>
            <a href="{{ url('/dashboard/project-management') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('dashboard/project-management') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-chart-bar-square class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Projects</span>
            </a>
            <a href="{{ url('/dashboard/minimal') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('dashboard/minimal') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-rectangle-stack class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Minimal</span>
            </a>
        </div>
        <div class="pt-4">
            <p class="px-3 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2" x-show="!$store.sidebar.collapsed">Pages</p>
            <a href="{{ url('/users') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('users') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-user-group class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Users</span>
            </a>
            <a href="{{ url('/profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('profile') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-user class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Profile</span>
            </a>
            <a href="{{ url('/settings') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('settings') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-cog-6-tooth class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Settings</span>
            </a>
        </div>
        <div class="pt-4">
            <p class="px-3 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2" x-show="!$store.sidebar.collapsed">Apps</p>
            <a href="{{ url('/kanban') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('kanban') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-view-columns class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Kanban</span>
            </a>
            <a href="{{ url('/chat') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('chat') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-chat-bubble-oval-left-ellipsis class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Chat</span>
            </a>
            <a href="{{ url('/calendar') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('calendar') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-calendar class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Calendar</span>
            </a>
            <a href="{{ url('/invoices') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('invoices') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-document-text class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Invoices</span>
            </a>
            <a href="{{ url('/pricing') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('pricing') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-currency-dollar class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Pricing</span>
            </a>
            <a href="{{ url('/faq') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('faq') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-question-mark-circle class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">FAQ</span>
            </a>
            <a href="{{ url('/gallery') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('gallery') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-photo class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Gallery</span>
            </a>
            <a href="{{ url('/files') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('files') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-folder class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Files</span>
            </a>
            <a href="{{ url('/timeline') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('timeline') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-clock class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Timeline</span>
            </a>
            <a href="{{ url('/product') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('product') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-shopping-bag class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Products</span>
            </a>
            <a href="{{ url('/cart') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('cart') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-shopping-cart class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Cart</span>
            </a>
            <a href="{{ url('/checkout') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('checkout') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-credit-card class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Checkout</span>
            </a>
            <a href="{{ url('/help') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('help') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-lifebuoy class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Help</span>
            </a>
        </div>
        <div class="pt-4">
            <p class="px-3 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2" x-show="!$store.sidebar.collapsed">Components</p>
            <a href="{{ url('/components') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('components') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-cube class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Components</span>
            </a>
            <a href="{{ url('/forms') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('forms') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-document-text class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Forms</span>
            </a>
            <a href="{{ url('/example') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->is('example') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                <x-heroicon-o-document-text class="w-5 h-5 flex-shrink-0" />
                <span x-show="!$store.sidebar.collapsed">Example</span>
            </a>
        </div>
    </nav>
    <div class="border-t border-gray-200 dark:border-gray-800 p-3">
        <button @click="$store.sidebar.toggle()" class="flex items-center justify-center w-full gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <x-heroicon-o-chevron-double-left class="w-5 h-5 flex-shrink-0" />
            <span x-show="!$store.sidebar.collapsed">Collapse</span>
        </button>
    </div>
</aside>
<div class="fixed inset-0 z-20 bg-gray-900/50 lg:hidden"
     x-show="$store.sidebar.open"
     x-transition.opacity
     @click="$store.sidebar.close()">
</div>
