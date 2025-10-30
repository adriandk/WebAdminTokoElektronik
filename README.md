# BNSP Project - Product Management System

Sistem manajemen produk yang dibangun dengan Laravel untuk tugas sertifikasi BNSP (Badan Nasional Sertifikasi Profesi).

## Fitur Utama

- **Authentication System**: Login dan Register pengguna
- **Product Management**: CRUD (Create, Read, Update, Delete) produk
- **Dashboard**: Statistik dan overview data produk
- **Report Generation**: Export laporan produk ke PDF
- **File Upload**: Upload thumbnail produk
- **Data Tables**: Pencarian dan pagination data produk

## Persyaratan Sistem

Sebelum menginstal project ini, pastikan komputer Anda sudah memiliki:

- **PHP** >= 8.1
- **Composer** (latest version)
- **Node.js** & **NPM** (untuk asset compilation)
- **MySQL** atau **MariaDB**
- **Web Server** (Apache/Nginx) atau menggunakan Laragon/XAMPP

## Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/adriandk/WebAdminTokoElektronik
cd bnspProject
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install JavaScript Dependencies

```bash
npm install
```

### 4. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Konfigurasi Database

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bnsp_project
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Setup Database

```bash
CREATE DATABASE bnsp_project;
```

### 7. Jalankan migrasi

```bash
php artisan migrate
```

### 8. Import data dari data.sql ke Database MySQL

### 9. Setup Storage

```bash
php artisan storage:link
```

### 10. Compile Asset

```bash
npm run build
```

### 11. Jalankan Server

```bash
php artisan serve
```

### Struktur Project

bnspProject/
├── app/
│   ├── Http/Controllers/
│   │   └── AdminController.php    # Controller utama
│   └── Models/
│       ├── Product.php            # Model produk
│       └── User.php               # Model user
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php    # Halaman login
│       │   └── signup.blade.php   # Halaman register
│       ├── dashboard/
│       │   └── dashboard.blade.php # Dashboard utama
│       ├── layout/
│       │   ├── app.blade.php      # Layout utama
│       │   ├── sidebar.blade.php  # Sidebar
│       │   └── navbar.blade.php   # Navigation bar
│       ├── product/
│       │   ├── index.blade.php    # Daftar produk
│       │   ├── create.blade.php   # Form tambah produk
│       │   └── edit.blade.php     # Form edit produk
│       └── report/
│           └── report.blade.php   # Template laporan PDF
└── routes/
    └── web.php                    # Route definitions
