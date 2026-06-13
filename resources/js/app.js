import Alpine from 'alpinejs'

Alpine.store('sidebar', {
    open: window.innerWidth >= 1024,
    collapsed: false,
    init() {
        this.open = window.innerWidth >= 1024
    },
    toggle() {
        if (window.innerWidth >= 1024) {
            this.collapsed = !this.collapsed
        } else {
            this.open = !this.open
        }
    },
    close() {
        this.open = false
    }
})

Alpine.store('darkMode', {
    dark: false,
    init() {
        this.dark = localStorage.getItem('theme') === 'dark' ||
            (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
        if (this.dark) {
            document.documentElement.classList.add('dark')
        }
    },
    toggle() {
        this.dark = !this.dark
        document.documentElement.classList.toggle('dark', this.dark)
        localStorage.setItem('theme', this.dark ? 'dark' : 'light')
    }
})

Alpine.data('dropdown', () => ({
    open: false,
    toggle() { this.open = !this.open },
    close() { this.open = false }
}))

Alpine.data('modal', () => ({
    open: false,
    init() {
        this.$watch('open', value => {
            document.body.classList.toggle('overflow-hidden', value)
        })
    }
}))

Alpine.data('tab', () => ({
    active: 'tab-0',
    set(tab) { this.active = tab }
}))

Alpine.data('toggle', (initial = false) => ({
    on: initial,
    toggle() { this.on = !this.on }
}))

Alpine.data('datatable', (config) => ({
    rows: config.rows,
    columns: config.columns,
    perPage: config.perPage || 10,
    searchable: config.searchable !== false,
    search: '',
    sortField: config.columns?.[0]?.key || '',
    sortDir: 'asc',
    currentPage: 1,

    get filteredRows() {
        let data = this.rows
        if (this.search) {
            const q = this.search.toLowerCase()
            data = data.filter(row =>
                Object.values(row).some(v => String(v).toLowerCase().includes(q))
            )
        }
        const field = this.sortField
        if (field) {
            data = [...data].sort((a, b) => {
                const va = String(a[field] ?? '').toLowerCase()
                const vb = String(b[field] ?? '').toLowerCase()
                return this.sortDir === 'asc' ? va.localeCompare(vb) : vb.localeCompare(va)
            })
        }
        return data
    },

    get totalPages() {
        return Math.max(1, Math.ceil(this.filteredRows.length / this.perPage))
    },

    get paginatedRows() {
        const start = (this.currentPage - 1) * this.perPage
        return this.filteredRows.slice(start, start + this.perPage)
    },

    get startEntry() {
        return this.filteredRows.length === 0 ? 0 : (this.currentPage - 1) * this.perPage + 1
    },

    get endEntry() {
        return Math.min(this.currentPage * this.perPage, this.filteredRows.length)
    },

    get visiblePages() {
        const total = this.totalPages
        const curr = this.currentPage
        const pages = []
        let start = Math.max(1, curr - 2)
        let end = Math.min(total, curr + 2)
        if (end - start < 4) {
            if (start === 1) end = Math.min(total, start + 4)
            else start = Math.max(1, end - 4)
        }
        for (let i = start; i <= end; i++) pages.push(i)
        return pages
    },

    sort(field) {
        if (this.sortField === field) {
            this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc'
        } else {
            this.sortField = field
            this.sortDir = 'asc'
        }
        this.currentPage = 1
    },

    prevPage() {
        if (this.currentPage > 1) this.currentPage--
    },

    nextPage() {
        if (this.currentPage < this.totalPages) this.currentPage++
    },

    goToPage(page) {
        this.currentPage = page
    },

    formatCell(row, key) {
        return row[key] ?? ''
    }
}))

Alpine.data('toastStore', () => ({
    toasts: [],
    nextId: 0,

    add({ type = 'info', title = '', message = '', duration = 4000 }) {
        const id = this.nextId++
        this.toasts.push({ id, type, title, message, show: true })
        if (duration > 0) {
            setTimeout(() => this.remove(id), duration)
        }
    },

    remove(id) {
        const toast = this.toasts.find(t => t.id === id)
        if (toast) toast.show = false
        setTimeout(() => { this.toasts = this.toasts.filter(t => t.id !== id) }, 300)
    }
}))

window.Alpine = Alpine
Alpine.start()
