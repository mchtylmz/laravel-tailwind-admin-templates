<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel Admin Templates' }}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script>
        Alpine.store('sidebar', {
            open: window.innerWidth >= 1024,
            collapsed: false,
            toggle() {
                if (window.innerWidth >= 1024) { this.collapsed = !this.collapsed }
                else { this.open = !this.open }
            },
            close() { this.open = false }
        })
        Alpine.store('darkMode', {
            dark: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
            init() { if (this.dark) document.documentElement.classList.add('dark') },
            toggle() {
                this.dark = !this.dark
                document.documentElement.classList.toggle('dark', this.dark)
                localStorage.setItem('theme', this.dark ? 'dark' : 'light')
            }
        })
        Alpine.data('dropdown', () => ({
            open: false, align: 'left',
            toggle() { this.open = !this.open },
            close() { this.open = false },
            init() { this.align = this.$el.getAttribute('align') ?? 'left' }
        }))
        Alpine.data('modal', () => ({
            open: false,
            init() { this.$watch('open', v => document.body.classList.toggle('overflow-hidden', v)) }
        }))
        Alpine.data('tab', () => ({ active: 'tab-0', set(tab) { this.active = tab } }))
        Alpine.data('toggle', (i = false) => ({ on: i, toggle() { this.on = !this.on } }))
        Alpine.data('datatable', (config) => ({
            rows: config.rows, columns: config.columns,
            perPage: config.perPage || 10, searchable: config.searchable !== false,
            search: '', sortField: config.columns?.[0]?.key || '', sortDir: 'asc', currentPage: 1,
            get filteredRows() {
                let d = this.rows
                if (this.search) { const q = this.search.toLowerCase(); d = d.filter(r => Object.values(r).some(v => String(v).toLowerCase().includes(q))) }
                if (this.sortField) { d = [...d].sort((a, b) => { const va = String(a[this.sortField] ?? '').toLowerCase(), vb = String(b[this.sortField] ?? '').toLowerCase(); return this.sortDir === 'asc' ? va.localeCompare(vb) : vb.localeCompare(va) }) }
                return d
            },
            get totalPages() { return Math.max(1, Math.ceil(this.filteredRows.length / this.perPage)) },
            get paginatedRows() { const s = (this.currentPage - 1) * this.perPage; return this.filteredRows.slice(s, s + this.perPage) },
            get startEntry() { return this.filteredRows.length === 0 ? 0 : (this.currentPage - 1) * this.perPage + 1 },
            get endEntry() { return Math.min(this.currentPage * this.perPage, this.filteredRows.length) },
            get visiblePages() {
                const t = this.totalPages, c = this.currentPage, p = []; let s = Math.max(1, c - 2), e = Math.min(t, c + 2)
                if (e - s < 4) { if (s === 1) e = Math.min(t, s + 4); else s = Math.max(1, e - 4) }
                for (let i = s; i <= e; i++) p.push(i); return p
            },
            sort(f) { if (this.sortField === f) { this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc' } else { this.sortField = f; this.sortDir = 'asc' }; this.currentPage = 1 },
            prevPage() { if (this.currentPage > 1) this.currentPage-- },
            nextPage() { if (this.currentPage < this.totalPages) this.currentPage++ },
            goToPage(p) { this.currentPage = p },
            formatCell(r, k) { return r[k] ?? '' }
        }))
        Alpine.data('toastStore', () => ({
            toasts: [], nextId: 0,
            add({ type = 'info', title = '', message = '', duration = 4000 }) {
                const id = this.nextId++; this.toasts.push({ id, type, title, message, show: true })
                if (duration > 0) setTimeout(() => this.remove(id), duration)
            },
            remove(id) { const t = this.toasts.find(t => t.id === id); if (t) t.show = false; setTimeout(() => { this.toasts = this.toasts.filter(t => t.id !== id) }, 300) }
        }))
    </script>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100">
<div id="app" class="flex h-screen overflow-hidden">
    <x-sidebar/>
    <div class="flex flex-1 flex-col overflow-y-auto" x-bind:class="$store.sidebar.collapsed ? 'lg:ml-20' : 'lg:ml-64'">
        <x-navbar/>
        <main class="flex-1 p-4 lg:p-6">
            {{ $slot }}
        </main>
        <footer class="border-t border-gray-200 dark:border-gray-800 px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} Laravel Tailwind Admin Templates
        </footer>
    </div>
</div>
<x-toast />
</body>
</html>
