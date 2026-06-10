# Laravel Tailwind Admin Templates

Laravel projelerinizde kullanabileceğiniz hazır Blade + TailwindCSS admin panel layout, component ve sayfa şablonları koleksiyonu. Herhangi bir JavaScript framework gerektirmez — saf Laravel Blade componentleri ve Alpine.js ile etkileşim.

**GitHub Repository:** [laravel-tailwind-admin-templates](https://github.com/mmucahityilmazz/laravel-tailwind-admin-templates)

## Özellikler

- 5 farklı dashboard layout (Analytics, Ecommerce, CRM, Project Management, Minimal)
- Sidebar (geniş/dar/mobil) + Navbar (arama, bildirim, profil dropdown)
- Giriş sayfaları (Login, Register, Forgot Password)
- 10+ yeniden kullanılabilir Blade component (Button, Card, Alert, Modal, Dropdown, Table, Tabs, StatsCard, EmptyState)
- Profil ve Ayarlar sayfaları (tab navigasyonlu)
- Kullanıcı tablosu (arama ve filtreleme ile)
- Form gösterim sayfası (input, select, checkbox, radio, toggle)
- Component gösterim sayfası (canlı önizlemeli)
- Hata sayfaları (403, 404, 500, 503)
- Dark mode (class-based, geçiş butonlu)
- Tam responsive (mobil, tablet, masaüstü)
- Docker geliştirme ortamı
- Alpine.js ile güçlendirilmiş etkileşimler (sidebar, dropdown, modal, tab, dark mode)

## Template Önizlemeleri

| Template | Açıklama |
|----------|----------|
| **Analytics** | Grafikler, istatistik kartları, aktivite akışı |
| **Ecommerce** | Satış grafiği, popüler ürünler, son siparişler |
| **CRM** | Müşteri istatistikleri, satış pipeline'ı |
| **Project Management** | Proje kartları, görev listesi, zaman çizelgesi |
| **Minimal** | Sade ve temel metrikler |

## Component Listesi

- **Alert** — success/warning/danger/info, kapatılabilir
- **Button** — 7 varyant (primary/secondary/success/danger/warning/outline/ghost), 4 boyut
- **Card** — başlık, içerik, footer bölümleri
- **Dropdown** — tıklama ile açılan menü
- **EmptyState** — ikon, başlık, açıklama, buton
- **Modal** — 3 boyut (sm/md/lg), başlık/içerik/footer
- **Navbar** — logo, arama, bildirim, dark mode, profil
- **Sidebar** — geniş/dar/mobil görünüm, navigasyon grupları
- **StatsCard** — ikon, değer, etiket, trend göstergesi
- **Tab** — yatay sekme değiştirme
- **Table** — striped, hover, responsive

## Kurulum

### Docker ile (Önerilen)

```bash
# Repository'yi klonla
git clone https://github.com/mmucahityilmazz/laravel-tailwind-admin-templates.git
cd laravel-tailwind-admin-templates

# Ortam dosyasını kopyala
cp .env.example .env

# Docker container'ları başlat
docker compose up -d

# PHP bağımlılıklarını yükle ve migration'ları çalıştır
docker compose exec app composer install
docker compose exec app php artisan migrate

# Frontend asset'leri derle (başka bir terminalde)
docker compose exec node npm install
docker compose exec node npm run build
```

Uygulama şu adreste çalışacak: [http://localhost:8080](http://localhost:8080)

### Lokal Geliştirme

```bash
# Repository'yi klonla
git clone https://github.com/mmucahityilmazz/laravel-tailwind-admin-templates.git
cd laravel-tailwind-admin-templates

# PHP bağımlılıklarını yükle
composer install

# Node bağımlılıklarını yükle
npm install

# Ortam dosyasını kopyala ve key oluştur
cp .env.example .env
php artisan key:generate

# Geliştirme sunucusunu başlat
php artisan serve

# Asset'leri derle (başka bir terminalde)
npm run dev
```

Uygulama şu adreste çalışacak: [http://localhost:8000](http://localhost:8000)

## Kullanım Örnekleri

Tüm componentleri Blade şablonlarınızda doğrudan kullanabilirsiniz:

```blade
<x-button variant="primary" size="md">Tıkla</x-button>
<x-button variant="danger" size="sm">Sil</x-button>
<x-button variant="outline">İptal</x-button>

<x-alert type="success">İşlem başarıyla tamamlandı!</x-alert>
<x-alert type="danger">Bir hata oluştu.</x-alert>

<x-card>
    <x-slot:header>Kart Başlığı</x-slot:header>
    <p>Kart içeriği buraya gelir.</p>
</x-card>

<x-statscard label="Gelir" value="48.250 $" change="+%12,5" trend="up" color="emerald">
    <x-slot:icon>
        <svg class="w-5 h-5">...</svg>
    </x-slot:icon>
</x-statscard>
```

## Ekran Görüntüleri

### Dashboard Analytics
![Analytics Dashboard](docs/screenshots/dashboard-analytics.svg)

### Dashboard Ecommerce
![Ecommerce Dashboard](docs/screenshots/dashboard-ecommerce.svg)

### Dashboard CRM
![CRM Dashboard](docs/screenshots/dashboard-crm.svg)

### Component Gösterimi
![Components Showcase](docs/screenshots/components.svg)

### Form Gösterimi
![Forms Showcase](docs/screenshots/forms.svg)

### Kullanıcı Tablosu
![Users Table](docs/screenshots/tables.svg)

### Karanlık Tema
![Dark Mode](docs/screenshots/dark-mode.svg)

## Özelleştirme

### Renkler
Template standart TailwindCSS renk paletini kullanır. Renkleri `app.css` içinde `@theme` direktifi ile özelleştirebilirsiniz.

### Layout Kullanımı
Sayfalarınızda admin layout kullanmak için:

```blade
<x-layouts-admin>
    <h1>İçeriğiniz buraya</h1>
</x-layouts-admin>
```

Giriş sayfaları için:

```blade
<x-layouts-guest>
    <h1>Giriş içeriği</h1>
</x-layouts-guest>
```

### Dark Mode
Dark mode class-based'dir. Navigasyon çubuğundaki ay/güneş ikonu ile geçiş yapabilirsiniz:

```javascript
localStorage.setItem('theme', 'dark')
document.documentElement.classList.add('dark')
```

## Yol Haritası

- [ ] Renk tema varyantları (mavi, yeşil, mor)
- [ ] Canlı tema düzenleyici
- [ ] Filament entegrasyon paketi
- [ ] 10+ dashboard layout
- [ ] Canlı önizleme sayfası

## Lisans

MIT Lisansı — detaylar için [LICENSE](LICENSE) dosyasına bakın.

## Geliştirici

**M. Mücahit Yılmaz**

- LinkedIn: [https://www.linkedin.com/in/mmucahityilmazz/](https://www.linkedin.com/in/mmucahityilmazz/)
- GitHub: [mmucahityilmazz](https://github.com/mmucahityilmazz)
