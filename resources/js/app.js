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

window.Alpine = Alpine
Alpine.start()
