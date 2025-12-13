<div align="center">

# 🏛️ SIMADESA - Sistem Informasi Administrasi Desa Sungai Meranti

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

**Platform Digital Terpadu untuk Pelayanan Administrasi Desa Sungai Meranti**

*Kabupaten Bengkalis, Provinsi Riau*

[Fitur](#-fitur-utama) • [Demo](#-demo) • [Instalasi](#-instalasi) • [Dokumentasi](#-dokumentasi) • [Kontribusi](#-kontribusi)

</div>

---

## 📋 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi-yang-digunakan)
- [Prasyarat](#-prasyarat)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Struktur Database](#-struktur-database)
- [Penggunaan](#-penggunaan)
- [Security Features](#-security-features)
- [API Documentation](#-api-documentation)
- [Screenshots](#-screenshots)
- [Roadmap](#-roadmap)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)
- [Tim Pengembang](#-tim-pengembang)

---

## 🎯 Tentang Proyek

**SIMADESA** (Sistem Informasi Administrasi Desa) adalah platform digital modern yang dirancang khusus untuk meningkatkan efisiensi dan transparansi pelayanan administrasi di Desa Sungai Meranti. Sistem ini memungkinkan masyarakat untuk mengajukan berbagai jenis surat dan dokumen secara online tanpa harus datang langsung ke kantor desa.

### 🎨 Visi
Mewujudkan pelayanan administrasi desa yang digital, transparan, efisien, dan mudah diakses oleh seluruh masyarakat.

### 🎯 Misi
- Digitalisasi proses administrasi desa
- Meningkatkan kualitas pelayanan publik
- Memberikan kemudahan akses layanan 24/7
- Menciptakan tata kelola yang transparan dan akuntabel

---

## ✨ Fitur Utama

### 👥 **Portal Warga**

#### 🔐 Sistem Autentikasi & Keamanan
- ✅ Registrasi akun dengan validasi NIK
- ✅ Login dengan rate limiting (max 3 percobaan)
- ✅ Countdown timer 2 menit setelah login gagal
- ✅ Reset password dengan OTP email
- ✅ Manajemen profil personal
- ✅ Session management yang aman

#### 📝 Pengajuan Surat Online
- ✅ Formulir pengajuan multi-step yang intuitif
- ✅ Upload dokumen persyaratan (KTP, KK, dll)
- ✅ Template surat otomatis (DOCX format)
- ✅ Real-time status tracking
- ✅ Notifikasi email untuk setiap update
- ✅ Download surat yang sudah disetujui

#### 📊 Dashboard Personal
- ✅ Statistik pengajuan (Pending, Diproses, Selesai, Ditolak)
- ✅ Riwayat lengkap pengajuan
- ✅ Quick action untuk pengajuan baru
- ✅ Notifikasi dan update terbaru

### 👨‍💼 **Panel Admin**

#### 📈 Dashboard Administrator
- ✅ Overview statistik real-time
- ✅ Grafik dan chart interaktif
- ✅ Quick stats (Total Pengajuan, User, Jenis Surat)
- ✅ Activity logs dan monitoring

#### 🗂️ Manajemen Pengajuan
- ✅ Daftar pengajuan dengan filter dan search
- ✅ Update status (Pending → Diproses → Selesai/Ditolak)
- ✅ Verifikasi dokumen
- ✅ Generate nomor surat otomatis
- ✅ Cetak/Download surat dalam format DOCX/PDF

#### ⚙️ Manajemen Master Data
- ✅ CRUD Jenis Surat
- ✅ Pengaturan template surat
- ✅ Konfigurasi form fields dinamis
- ✅ Manajemen syarat dokumen
- ✅ User management dan role assignment

### 🔍 **Fitur Tambahan**

#### 🎨 User Interface/Experience
- ✅ Responsive design (Mobile, Tablet, Desktop)
- ✅ Modern & clean interface dengan Tailwind CSS
- ✅ Smooth animations dan transitions
- ✅ Dark mode compatible components
- ✅ Accessibility (WCAG 2.1 compliant)

#### 📧 Sistem Notifikasi
- ✅ Email notifications untuk status updates
- ✅ Welcome email setelah registrasi
- ✅ OTP untuk reset password
- ✅ Reminder untuk pengajuan pending

#### 📤 Export & Import
- ✅ Export data ke Excel (PHPSpreadsheet)
- ✅ Generate dokumen Word (PHPWord)
- ✅ Bulk import dari template

---

## 🛠️ Teknologi yang Digunakan

### **Backend**
- **Framework:** Laravel 12.x
- **Language:** PHP 8.2+
- **Database:** MySQL 8.0+ / MariaDB
- **Authentication:** Laravel Sanctum
- **Cache:** File/Redis (configurable)
- **Queue:** Database/Redis (configurable)

### **Frontend**
- **CSS Framework:** Tailwind CSS 4.x
- **JavaScript:** Vanilla JS + Alpine.js
- **Build Tool:** Vite
- **Icons:** Heroicons

### **Libraries & Tools**
- **Document Processing:**
  - PHPWord - Generate DOCX documents
  - PHPSpreadsheet - Excel export/import
- **Email:** Laravel Mail with SMTP/Mailpit
- **Testing:** PHPUnit, Laravel Pint
- **Dev Tools:** Laravel Pail, Tinker, Sail

---

## 📦 Prasyarat

Sebelum memulai instalasi, pastikan sistem Anda memiliki:

### **Software Requirements**
```bash
✓ PHP >= 8.2
✓ Composer >= 2.5
✓ Node.js >= 18.x
✓ NPM >= 9.x
✓ MySQL >= 8.0 atau MariaDB >= 10.6
✓ Web Server (Apache/Nginx)
```

### **PHP Extensions**
```bash
✓ BCMath
✓ Ctype
✓ Fileinfo
✓ JSON
✓ Mbstring
✓ OpenSSL
✓ PDO
✓ Tokenizer
✓ XML
✓ GD (untuk image processing)
✓ Iconv (untuk character encoding)
```

### **Optional (Recommended)**
```bash
✓ Redis (untuk cache & queue)
✓ Supervisor (untuk queue workers)
✓ Git (untuk version control)
```

---

## 🚀 Instalasi

### **Metode 1: Clone Repository**

```bash
# 1. Clone repository
git clone https://github.com/Joko206/desa_sungai_meranti.git
cd desa_sungai_meranti

# 2. Install PHP dependencies
composer install

# 3. Install Node.js dependencies
npm install

# 4. Setup environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Konfigurasi database di file .env
# Edit DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 7. Jalankan migrasi database
php artisan migrate

# 8. (Optional) Seed data contoh
php artisan db:seed

# 9. Build assets frontend
npm run build

# 10. Setup storage link
php artisan storage:link

# 11. Jalankan aplikasi
php artisan serve
```

### **Metode 2: Quick Setup dengan Composer Script**

```bash
# Clone dan masuk ke direktori
git clone https://github.com/Joko206/desa_sungai_meranti.git
cd desa_sungai_meranti

# Edit .env untuk konfigurasi database
cp .env.example .env
nano .env

# Jalankan setup otomatis
composer setup

# Jalankan aplikasi
php artisan serve
```

Aplikasi akan berjalan di: **http://localhost:8000**

---

## ⚙️ Konfigurasi

### **1. Database Configuration**

Edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_sungai_meranti
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### **2. Mail Configuration**

Untuk development (Mailpit):
```env
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@desasungaimeranti.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Untuk production (SMTP):
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@desasungaimeranti.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### **3. Cache & Session Configuration**

```env
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

Untuk production gunakan Redis:
```env
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### **4. Admin Secret Code**

```env
ADMIN_SECRET_CODE=your_secret_code_here
```

Kode ini digunakan saat registrasi admin.

---

## 🗄️ Struktur Database

### **Tabel Utama**

#### **`role`** - Tabel Role Pengguna
```sql
- id (PK)
- nama_role (admin, warga)
- timestamps
```

#### **`user_desa`** - Tabel User/Warga
```sql
- id (PK)
- role_id (FK → role)
- nik (16 karakter, unique)
- nama
- email (unique)
- password
- tempat_lahir
- tanggal_lahir
- jenis_kelamin
- alamat
- no_telepon
- timestamps
```

#### **`jenis_surat`** - Tabel Master Jenis Surat
```sql
- id (PK)
- nama_surat
- deskripsi
- syarat (JSON)
- file_template (path)
- form_fields (JSON)
- butuh_tanda_tangan_pihak_lain
- is_active
- timestamps
```

#### **`pengajuan_surat`** - Tabel Pengajuan
```sql
- id (PK)
- user_id (FK → user_desa)
- jenis_surat_id (FK → jenis_surat)
- data_surat (JSON)
- dokumen_pendukung (JSON)
- status (pending, diproses, selesai, ditolak)
- catatan_admin
- file_tanda_tangan_pihak_lain
- tanggal_pengajuan
- tanggal_selesai
- timestamps
```

#### **`surat_terbit`** - Tabel Surat yang Diterbitkan
```sql
- id (PK)
- pengajuan_id (FK → pengajuan_surat)
- nomor_surat (unique)
- file_surat (path)
- tanggal_terbit
- timestamps
```

### **Relasi Database**

```
role ──┬─→ user_desa ──→ pengajuan_surat ──→ surat_terbit
       │                        ↑
       └────────────────────────┘
              jenis_surat
```

---

## 📖 Penggunaan

### **Untuk Warga**

1. **Registrasi Akun**
   - Akses `/register`
   - Isi NIK, nama, email, dan data diri
   - Verifikasi email

2. **Login**
   - Akses `/login`
   - Masukkan NIK dan password
   - Masuk ke dashboard warga

3. **Ajukan Surat**
   - Pilih jenis surat yang diinginkan
   - Isi formulir pengajuan
   - Upload dokumen persyaratan
   - Submit pengajuan

4. **Tracking Status**
   - Cek status di dashboard
   - Lihat detail pengajuan
   - Download surat jika sudah selesai

### **Untuk Admin**

1. **Login Admin**
   - Akses `/login`
   - Gunakan akun admin
   - Masuk ke panel admin

2. **Kelola Pengajuan**
   - Lihat daftar pengajuan di `/admin/pengajuan`
   - Verifikasi dokumen
   - Update status (Diproses/Selesai/Ditolak)
   - Generate nomor surat

3. **Kelola Master Data**
   - Tambah/Edit jenis surat di `/admin/jenis-surat`
   - Upload template dokumen
   - Konfigurasi form fields
   - Atur syarat dokumen

---

## 🔒 Security Features

### **Authentication & Authorization**
- ✅ **Rate Limiting** - Maksimal 3 percobaan login gagal
- ✅ **Account Lockout** - Blokir 2 menit setelah 3x gagal login
- ✅ **Password Hashing** - BCrypt dengan cost factor 12
- ✅ **CSRF Protection** - Token CSRF pada semua form
- ✅ **XSS Prevention** - Input sanitization & output encoding
- ✅ **SQL Injection Protection** - Eloquent ORM & prepared statements

### **Data Security**
- ✅ **File Upload Validation** - Whitelist file types & size limits
- ✅ **Secure File Storage** - Files stored outside public directory
- ✅ **Session Security** - HTTP-only cookies, secure flag in production
- ✅ **Input Validation** - Server-side validation untuk semua input
- ✅ **Email Verification** - Verifikasi email pada registrasi

### **Rate Limiting Details**

```php
// Login Rate Limiting
Max Attempts: 3
Lockout Duration: 2 minutes
Key: nik + IP address
Features:
  - Countdown timer dengan progress bar
  - Auto reload setelah lockout habis
  - Peringatan sisa percobaan
```

---

## 📡 API Documentation

### **Authentication Endpoints**

#### **Register**
```http
POST /api/register
Content-Type: application/json

{
  "nik": "1234567890123456",
  "nama": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "tempat_lahir": "Jakarta",
  "tanggal_lahir": "1990-01-01",
  "jenis_kelamin": "L",
  "alamat": "Jl. Example No. 123",
  "no_telepon": "081234567890"
}
```

#### **Login**
```http
POST /api/login
Content-Type: application/json

{
  "nik": "1234567890123456",
  "password": "password123"
}

Response:
{
  "success": true,
  "message": "Login berhasil",
  "token": "1|xxxxxxxxxxxxx",
  "user": {
    "nik": "1234567890123456",
    "nama": "John Doe",
    "email": "john@example.com",
    "role_id": 2
  }
}
```

### **Pengajuan Endpoints** (Authenticated)

#### **Get All Pengajuan**
```http
GET /api/pengajuan
Authorization: Bearer {token}

Response:
{
  "data": [...]
}
```

#### **Create Pengajuan**
```http
POST /api/pengajuan
Authorization: Bearer {token}
Content-Type: multipart/form-data

{
  "jenis_surat_id": 1,
  "data_surat": {...},
  "dokumen_pendukung": [file1, file2]
}
```

---

## 📸 Screenshots

### **Landing Page**
<img src="docs/screenshots/landing.png" alt="Landing Page" width="800"/>

### **Login & Registration**
<img src="docs/screenshots/login.png" alt="Login Page" width="400"/> <img src="docs/screenshots/register.png" alt="Register Page" width="400"/>

### **Dashboard Warga**
<img src="docs/screenshots/warga-dashboard.png" alt="Warga Dashboard" width="800"/>

### **Dashboard Admin**
<img src="docs/screenshots/admin-dashboard.png" alt="Admin Dashboard" width="800"/>

---

## 🗺️ Roadmap

### **Version 1.0** ✅ (Current)
- [x] Sistem autentikasi & registrasi
- [x] Dashboard warga & admin
- [x] Pengajuan surat online
- [x] Tracking status real-time
- [x] Rate limiting & security
- [x] Email notifications

### **Version 1.1** 🚧 (In Progress)
- [ ] Multi-language support (ID/EN)
- [ ] Advanced reporting & analytics
- [ ] Export to PDF
- [ ] Mobile app (Flutter)
- [ ] Push notifications
- [ ] QR Code verification

### **Version 2.0** 📋 (Planned)
- [ ] E-signature integration
- [ ] Payment gateway (Midtrans)
- [ ] SMS notifications
- [ ] WhatsApp bot integration
- [ ] AI-powered document verification
- [ ] Blockchain for document authenticity

---

## 🤝 Kontribusi

Kami menerima kontribusi dari siapa saja! Berikut cara berkontribusi:

### **1. Fork Repository**
```bash
# Fork di GitHub, lalu clone
git clone https://github.com/YOUR_USERNAME/desa_sungai_meranti.git
cd desa_sungai_meranti
```

### **2. Buat Branch Baru**
```bash
git checkout -b feature/fitur-baru
# atau
git checkout -b fix/perbaikan-bug
```

### **3. Commit Perubahan**
```bash
git add .
git commit -m "feat: menambahkan fitur baru"
# atau
git commit -m "fix: memperbaiki bug pada login"
```

### **4. Push & Pull Request**
```bash
git push origin feature/fitur-baru
```
Kemudian buat Pull Request di GitHub.

### **Commit Convention**
Gunakan [Conventional Commits](https://www.conventionalcommits.org/):
- `feat:` - Fitur baru
- `fix:` - Perbaikan bug
- `docs:` - Perubahan dokumentasi
- `style:` - Perubahan format code
- `refactor:` - Refactoring code
- `test:` - Menambah test
- `chore:` - Maintenance

---

## 📄 Lisensi

Project ini dilisensikan under **MIT License**. Lihat file [LICENSE](LICENSE) untuk detail.

```
MIT License

Copyright (c) 2025 Desa Sungai Meranti

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction...
```

---

## 👥 Tim Pengembang

### **Core Team**

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/Joko206">
        <img src="https://github.com/Joko206.png" width="100px;" alt="Joko206"/>
        <br />
        <sub><b>Joko206</b></sub>
      </a>
      <br />
      <sub>Project Lead & Full Stack Developer</sub>
    </td>
  </tr>
</table>

### **Contributors**

Terima kasih kepada semua kontributor yang telah membantu project ini! 🙏

<a href="https://github.com/Joko206/desa_sungai_meranti/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Joko206/desa_sungai_meranti" />
</a>

---

## 📞 Kontak & Support

### **Kantor Desa Sungai Meranti**
- 📍 **Alamat:** Desa Sungai Meranti, Kec. Siak Kecil, Kab. Bengkalis, Riau
- 📧 **Email:** desasungaimeranti@gmail.com
- 📱 **Telepon:** (0766) XXX-XXXX
- 🌐 **Website:** https://desasungaimeranti.go.id

### **Developer Support**
- 💬 **Discussions:** [GitHub Discussions](https://github.com/Joko206/desa_sungai_meranti/discussions)
- 🐛 **Bug Reports:** [GitHub Issues](https://github.com/Joko206/desa_sungai_meranti/issues)
- 📖 **Documentation:** [Wiki](https://github.com/Joko206/desa_sungai_meranti/wiki)

---

## 🌟 Acknowledgments

Terima kasih kepada:
- **Laravel Team** - Framework yang luar biasa
- **Tailwind Labs** - CSS framework yang powerful
- **PHPOffice** - Library document processing
- **Masyarakat Desa Sungai Meranti** - Dukungan dan feedback
- **Open Source Community** - Inspirasi dan pembelajaran

---

## 📊 Project Statistics

![GitHub stars](https://img.shields.io/github/stars/Joko206/desa_sungai_meranti?style=social)
![GitHub forks](https://img.shields.io/github/forks/Joko206/desa_sungai_meranti?style=social)
![GitHub issues](https://img.shields.io/github/issues/Joko206/desa_sungai_meranti)
![GitHub pull requests](https://img.shields.io/github/issues-pr/Joko206/desa_sungai_meranti)
![GitHub last commit](https://img.shields.io/github/last-commit/Joko206/desa_sungai_meranti)
![GitHub contributors](https://img.shields.io/github/contributors/Joko206/desa_sungai_meranti)

---

<div align="center">

**Made with ❤️ for Desa Sungai Meranti**

**⭐ Star this repository if you find it helpful!**

[⬆ Back to Top](#-simadesa---sistem-informasi-administrasi-desa-sungai-meranti)

</div>
