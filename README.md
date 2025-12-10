# HIMKA UMRAH - Company Profile

Website company profile untuk **Himpunan Mahasiswa Kimia (HIMKA)** Fakultas Teknik dan Teknologi Kemaritiman, Universitas Maritim Raja Ali Haji.

## 🎨 Design Update v2.0.0

Website ini telah diperbarui dengan:
- ✅ **Color Palette Baru** berbasis Cream yang lebih hangat dan profesional
- ✅ **Hero Section** dengan background image bertema kimia
- ✅ **Responsive Design** untuk semua device
- ✅ **Admin Dashboard** dengan UI yang lebih modern

### Color Scheme
- **Main**: Cream (#F5E6D3) - Background utama
- **Secondary**: Blue-Teal (#2C5F7C) - Navbar, footer, text
- **Accent**: Orange-Terracotta (#D97642) - Buttons, highlights

## 📚 Dokumentasi

Untuk informasi lengkap tentang design system dan perubahan terbaru:

- **[RINGKASAN_PERUBAHAN.md](RINGKASAN_PERUBAHAN.md)** - Ringkasan lengkap dalam Bahasa Indonesia ⭐
- **[COLOR_PALETTE.md](COLOR_PALETTE.md)** - Panduan color palette
- **[HERO_SECTION_GUIDE.md](HERO_SECTION_GUIDE.md)** - Cara mengganti background hero
- **[QUICK_REFERENCE.md](QUICK_REFERENCE.md)** - Quick reference untuk developer
- **[VISUAL_GUIDE.md](VISUAL_GUIDE.md)** - Visual guide layout dan components
- **[CHANGELOG_DESIGN.md](CHANGELOG_DESIGN.md)** - Changelog detail

## 🚀 Quick Start

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/MariaDB

### Installation

1. Clone repository
```bash
git clone [repository-url]
cd himka-umrah
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database di `.env`
```
DB_DATABASE=himka_db
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations
```bash
php artisan migrate
```

6. Build assets
```bash
npm run build
```

7. Start server
```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

## 🎯 Features

### Landing Page
- ✅ Hero section dengan background kimia
- ✅ About section
- ✅ Vision & Mission cards
- ✅ Division showcase
- ✅ Gallery grid
- ✅ Contact form
- ✅ Responsive navbar & footer

### Admin Dashboard
- ✅ Overview statistics
- ✅ Visitor chart
- ✅ Recent activities
- ✅ Content management (coming soon)
- ✅ Modern sidebar navigation

## 🛠️ Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS 4.0
- **Build Tool**: Vite
- **Icons**: Material Icons
- **Charts**: Chart.js
- **Fonts**: Outfit, Playfair Display

## 📁 Project Structure

```
himka-umrah/
├── app/                    # Laravel application
├── resources/
│   ├── css/
│   │   └── app.css        # Tailwind + Color definitions
│   ├── views/
│   │   ├── home.blade.php           # Landing page
│   │   ├── layouts/
│   │   │   ├── app.blade.php        # Frontend layout
│   │   │   └── admin.blade.php      # Admin layout
│   │   └── admin/
│   │       └── dashboard.blade.php  # Dashboard
├── public/
│   └── assets/
│       └── img/           # Images
├── routes/
│   └── web.php           # Routes
└── vite.config.js        # Vite configuration
```

## 🎨 Customization

### Mengganti Warna

Edit `resources/css/app.css`:
```css
@theme {
    --color-himka-cream: #F5E6D3;
    --color-himka-secondary: #2C5F7C;
    --color-himka-accent: #D97642;
}
```

### Mengganti Background Hero

Edit `resources/views/home.blade.php`:
```html
<div style="background-image: url('YOUR_IMAGE_URL');"></div>
```

Lihat [HERO_SECTION_GUIDE.md](HERO_SECTION_GUIDE.md) untuk detail lengkap.

## 🔧 Development

### Watch mode (auto-reload)
```bash
npm run dev
```

### Build for production
```bash
npm run build
```

### Clear cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 📱 Responsive Breakpoints

- Mobile: < 768px
- Tablet: 768px - 1024px
- Desktop: > 1024px

## 🎯 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## 📝 License

This project is proprietary software for HIMKA UMRAH.

## 👥 Team

**HIMKA UMRAH**
- Email: himkafttkumrah@gmail.com
- Instagram: @himka.umrah
- Website: [Coming Soon]

## 🙏 Credits

- Design & Development: HIMKA IT Team
- Images: Unsplash
- Icons: Material Icons
- Fonts: Google Fonts

---

**Version**: 2.0.0  
**Last Updated**: 11 Desember 2024  
**Status**: ✅ Production Ready
