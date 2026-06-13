<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel Admin Templates' }}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
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
        Alpine.data('modal', ({ size = 'md', closable = true } = {}) => ({
            open: false, size, closable,
            init() {
                this.$watch('open', v => document.body.classList.toggle('overflow-hidden', v))
            },
            close() {
                if (this.closable) this.open = false
            }
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
        Alpine.data('rating', (val = 0, max = 5, interactive = false) => ({
            value: val, max, interactive,
            set(v) { if (this.interactive) this.value = v }
        }))
        Alpine.data('editor', ({ value = '', placeholder = 'Write something...' } = {}) => ({
            value, placeholder, bold: false, italic: false, underline: false,
            init() {
                const el = this.$refs.editor
                if (!el.innerHTML) el.innerHTML = ''
                el.addEventListener('keydown', e => {
                    if (e.key === 'Tab') { e.preventDefault(); document.execCommand('insertHTML', false, '&nbsp;&nbsp;&nbsp;&nbsp;') }
                })
            },
            exec(cmd, val = null) {
                document.execCommand(cmd, false, val)
                this.update()
                this.$refs.editor.focus()
            },
            update() {
                this.value = this.$refs.editor.innerHTML
                this.bold = document.queryCommandState('bold')
                this.italic = document.queryCommandState('italic')
                this.underline = document.queryCommandState('underline')
            }
        }))
        Alpine.data('colorpicker', ({ value = '#6366f1' } = {}) => ({
            open: false, value,
            presets: ['#ef4444','#f97316','#f59e0b','#22c55e','#10b981','#06b6d4','#3b82f6','#6366f1','#8b5cf6','#ec4899','#f43f5e','#64748b','#1e293b','#ffffff','#000000','#78716c'],
            select(v) { this.value = v; this.open = false },
            validate() { if (/^#[0-9a-fA-F]{6}$/.test(this.value)) { this.open = false } },
            clear() { this.value = '#6366f1' },
            close() { this.open = false }
        }))
        Alpine.data('treeselect', ({ items = [] } = {}) => ({
            open: false, selected: [], expanded: {},
            get flatItems() {
                const flatten = (arr, depth = 0) => {
                    let r = []
                    arr.forEach(item => {
                        const isOpen = this.expanded[item.value] ?? false
                        r.push({ ...item, depth, open: isOpen })
                        if (item.children && isOpen) r.push(...flatten(item.children, depth + 1))
                    })
                    return r
                }
                return flatten(items)
            },
            isSelected(v) { return this.selected.some(s => s.value === v) },
            toggle(item) {
                if (item.children) { this.expanded[item.value] = !(this.expanded[item.value] ?? false); return }
                const idx = this.selected.findIndex(s => s.value === item.value)
                if (idx > -1) this.selected.splice(idx, 1)
                else this.selected.push({ value: item.value, label: item.label })
            },
            remove(v) { this.selected = this.selected.filter(s => s.value !== v) },
            close() { this.open = false }
        }))
        Alpine.data('commandPalette', () => ({
            open: false, query: '', activeIndex: 0, results: [],
            pages: [
                { title: 'Analytics', url: '/', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>', badge: 'Dashboard' },
                { title: 'Ecommerce', url: '/dashboard/ecommerce', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>', badge: 'Dashboard' },
                { title: 'CRM', url: '/dashboard/crm', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>', badge: 'Dashboard' },
                { title: 'Projects', url: '/dashboard/project-management', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>', badge: 'Dashboard' },
                { title: 'Minimal', url: '/dashboard/minimal', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.375 6A2.625 2.625 0 016 3.375h12A2.625 2.625 0 0120.625 6v12A2.625 2.625 0 0118 20.625H6A2.625 2.625 0 013.375 18V6z"/></svg>', badge: 'Dashboard' },
                { title: 'Users', url: '/users', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>', badge: 'Pages' },
                { title: 'Profile', url: '/profile', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>', badge: 'Pages' },
                { title: 'Settings', url: '/settings', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>', badge: 'Pages' },
                { title: 'Components', url: '/components', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.01M6 18h.01M18 6h.01M18 18h.01M6 12h.01M12 6h.01M12 18h.01M18 12h.01M12 12h.01"/></svg>', badge: 'Pages' },
                { title: 'Forms', url: '/forms', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>', badge: 'Pages' },
                { title: 'Example', url: '/example', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>', badge: 'Pages' },
                { title: 'Login', url: '/login', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>', badge: 'Auth' },
                { title: 'Register', url: '/register', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM3 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 019.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>', badge: 'Auth' },
            ],
            quickActions: [
                { label: 'Toggle dark mode', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>', action() { window.Alpine.store('darkMode').toggle() } },
                { label: 'Go to Analytics', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605"/></svg>', action() { window.location.href = '/' } },
            ],
            search() {
                this.activeIndex = 0
                if (!this.query) { this.results = []; return }
                const q = this.query.toLowerCase()
                this.results = this.pages.filter(p => p.title.toLowerCase().includes(q) || p.badge.toLowerCase().includes(q))
            },
            toggle() { this.open = !this.open; if (this.open) this.$nextTick(() => { this.$el.querySelector('input')?.focus() }); this.query = ''; this.results = [] },
            close() { this.open = false },
            next() { if (this.activeIndex < this.results.length - 1) this.activeIndex++ },
            prev() { if (this.activeIndex > 0) this.activeIndex-- },
            select() { if (this.results[this.activeIndex]) window.location.href = this.results[this.activeIndex].url }
        }))
        Alpine.data('datepicker', ({ value = '' } = {}) => ({
            open: false, value,
            get display() { return this.value || '' },
            get today() { return new Date().getDate() },
            get todayMonth() { return new Date().getMonth() },
            get todayYear() { return new Date().getFullYear() },
            month: new Date().getMonth(),
            year: new Date().getFullYear(),
            selectedDay: value ? new Date(value).getDate() : null,
            get currentMonth() { return this.month },
            get currentYear() { return this.year },
            get monthYear() {
                const d = new Date(this.year, this.month)
                return d.toLocaleDateString('en-US', { month: 'long', year: 'numeric' })
            },
            get daysInMonth() { return new Date(this.year, this.month + 1, 0).getDate() },
            get firstDayOfMonth() { return (new Date(this.year, this.month, 1).getDay() + 6) % 7 },
            get days() {
                const arr = new Array(this.firstDayOfMonth).fill(0)
                for (let i = 1; i <= this.daysInMonth; i++) arr.push(i)
                return arr
            },
            prevMonth() { this.month--; if (this.month < 0) { this.month = 11; this.year-- } },
            nextMonth() { this.month++; if (this.month > 11) { this.month = 0; this.year++ } },
            selectDay(day) {
                this.selectedDay = day
                const d = new Date(this.year, this.month, day)
                this.value = d.toISOString().split('T')[0]
                this.open = false
            },
            clear() { this.value = ''; this.selectedDay = null; this.open = false },
            today() { const d = new Date(); this.month = d.getMonth(); this.year = d.getFullYear(); this.selectDay(d.getDate()) },
            close() { this.open = false }
        }))
        Alpine.data('searchStore', () => ({
            open: false, query: '', activeIndex: 0, results: [],
            pages: [
                { title: 'Analytics', url: '/', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>', badge: 'Dashboard' },
                { title: 'Ecommerce', url: '/dashboard/ecommerce', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>', badge: 'Dashboard' },
                { title: 'CRM', url: '/dashboard/crm', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>', badge: 'Dashboard' },
                { title: 'Projects', url: '/dashboard/project-management', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>', badge: 'Dashboard' },
                { title: 'Minimal', url: '/dashboard/minimal', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.375 6A2.625 2.625 0 016 3.375h12A2.625 2.625 0 0120.625 6v12A2.625 2.625 0 0118 20.625H6A2.625 2.625 0 013.375 18V6z"/></svg>', badge: 'Dashboard' },
                { title: 'Users', url: '/users', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>', badge: 'Pages' },
                { title: 'Profile', url: '/profile', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>', badge: 'Pages' },
                { title: 'Settings', url: '/settings', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>', badge: 'Pages' },
                { title: 'Components', url: '/components', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.01M6 18h.01M18 6h.01M18 18h.01M6 12h.01M12 6h.01M12 18h.01M18 12h.01M12 12h.01"/></svg>', badge: 'Pages' },
                { title: 'Forms', url: '/forms', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>', badge: 'Pages' },
                { title: 'Example', url: '/example', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>', badge: 'Pages' },
                { title: 'Login', url: '/login', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>', badge: 'Auth' },
                { title: 'Register', url: '/register', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM3 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 019.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>', badge: 'Auth' },
                { title: 'Forgot Password', url: '/forgot-password', icon: '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>', badge: 'Auth' },
            ],
            search() {
                this.activeIndex = 0
                if (!this.query) { this.results = []; return }
                const q = this.query.toLowerCase()
                this.results = this.pages.filter(p => p.title.toLowerCase().includes(q) || p.badge.toLowerCase().includes(q))
            },
            next() { if (this.activeIndex < this.results.length - 1) this.activeIndex++ },
            prev() { if (this.activeIndex > 0) this.activeIndex-- },
            select() { if (this.results[this.activeIndex]) window.location.href = this.results[this.activeIndex].url },
            close() { this.open = false; this.query = ''; this.results = [] }
        }))
        Alpine.data('notificationStore', () => ({
            open: false,
            notifications: [
                { id: 1, title: 'New order received', message: 'Order #1289 for $249.00 has been placed.', time: '2 min ago', read: false },
                { id: 2, title: 'Payment failed', message: 'Payment for order #1287 failed. Customer notified.', time: '15 min ago', read: false },
                { id: 3, title: 'New user registered', message: 'Sarah Chen created an account.', time: '1 hour ago', read: false },
                { id: 4, title: 'Server alert', message: 'CPU usage exceeded 90% on production server.', time: '3 hours ago', read: true },
                { id: 5, title: 'Weekly report ready', message: 'Your weekly analytics report is ready to view.', time: '5 hours ago', read: true },
            ],
            get unreadCount() { return this.notifications.filter(n => !n.read).length },
            toggle() { this.open = !this.open },
            close() { this.open = false },
            markRead(id) { const n = this.notifications.find(n => n.id === id); if (n) n.read = true },
            markAllRead() { this.notifications.forEach(n => n.read = true) },
            remove(id) { this.notifications = this.notifications.filter(n => n.id !== id) }
        }))
        Alpine.data('chart', (config) => ({
            chart: null,
            type: config.type || 'line',
            labels: config.labels || [],
            datasets: config.datasets || [],
            options: config.options || {},
            init() {
                this.$nextTick(() => {
                    const ctx = this.$el.querySelector('canvas').getContext('2d')
                    const isDark = document.documentElement.classList.contains('dark')
                    const textColor = isDark ? '#9ca3af' : '#6b7280'
                    const gridColor = isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)'
                    this.chart = new Chart(ctx, {
                        type: this.type,
                        data: { labels: this.labels, datasets: this.datasets },
                        options: {
                            responsive: true, maintainAspectRatio: false,
                            plugins: {
                                legend: { labels: { color: textColor, font: { size: 12 } } },
                                tooltip: { mode: 'index', intersect: false }
                            },
                            scales: this.type !== 'pie' && this.type !== 'doughnut' ? {
                                x: { grid: { color: gridColor }, ticks: { color: textColor } },
                                y: { beginAtZero: true, grid: { color: gridColor }, ticks: { color: textColor } }
                            } : undefined,
                            ...this.options
                        }
                    })
                })
            },
            destroy() { if (this.chart) { this.chart.destroy(); this.chart = null } }
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
<x-command-palette />
</body>
</html>
