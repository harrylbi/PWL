Berikut adalah **README** proyek toko online CodeIgniter 4 versi lengkap dan profesional, dengan struktur yang rapi serta penambahan detail:

---

# 🛒 Toko Online CodeIgniter 4

Proyek ini adalah aplikasi toko online yang dibangun menggunakan [CodeIgniter 4](https://codeigniter.com/). Aplikasi ini menyediakan fitur lengkap untuk **pengelolaan produk**, **keranjang belanja**, **sistem transaksi**, serta **dashboard admin** yang responsif menggunakan template **NiceAdmin**.

---

## 📑 Daftar Isi

* [✨ Fitur](#✨-fitur)
* [🧰 Persyaratan Sistem](#🧰-persyaratan-sistem)
* [🚀 Instalasi](#🚀-instalasi)
* [🗂️ Struktur Proyek](#🗂️-struktur-proyek)
* [📸 Tampilan UI](#📸-tampilan-ui)
* [📦 Seeder & Dummy Data](#📦-seeder--dummy-data)
* [🔐 Akun Default](#🔐-akun-default)
* [📄 Lisensi](#📄-lisensi)

---

## ✨ Fitur

### 👥 Autentikasi Pengguna

* Login dan register pengguna
* Manajemen akun dan sesi

### 🛍️ Katalog Produk

* Tampilkan produk dengan gambar, harga, dan detail
* Pencarian produk berdasarkan nama
* Kategori produk

### 🛒 Keranjang Belanja

* Tambah produk ke keranjang
* Hapus produk dari keranjang
* Edit jumlah produk
* Checkout & input alamat

### 💰 Transaksi & Diskon

* Perhitungan total otomatis (produk + ongkir)
* Penerapan diskon harian dari database
* Riwayat transaksi per pengguna
* Detail transaksi (modal popup)

### 🛠️ Panel Admin

* CRUD produk
* CRUD kategori produk
* CRUD diskon harian
* Laporan transaksi
* Export data transaksi ke PDF

### 🎨 UI Responsif

* Menggunakan [NiceAdmin Bootstrap Template](https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/)

---

## 🧰 Persyaratan Sistem

* PHP >= 7.4
* Composer
* MySQL / MariaDB
* Apache Web Server (disarankan via XAMPP)

---

## 🚀 Instalasi

1. **Clone repository**

   ```bash
   git clone https://github.com/namakamu/belajar-ci-tugas.git
   cd belajar-ci-tugas
   ```

2. **Install dependensi via Composer**

   ```bash
   composer install
   ```

3. **Konfigurasi `.env`**

   * Salin `.env.example` menjadi `.env`
   * Atur konfigurasi database:

     ```ini
     database.default.hostname = localhost
     database.default.database = db_ci4
     database.default.username = root
     database.default.password =
     database.default.DBDriver = MySQLi
     ```

4. **Setup database**

   * Jalankan XAMPP dan aktifkan **Apache + MySQL**
   * Buat database baru bernama `db_ci4` via phpMyAdmin

5. **Migrasi tabel**

   ```bash
   php spark migrate
   ```

6. **Seeder data dummy**

   ```bash
   php spark db:seed ProductSeeder
   php spark db:seed UserSeeder
   php spark db:seed DiskonSeeder
   ```

7. **Jalankan server**

   ```bash
   php spark serve
   ```

   Akses aplikasi via: [http://localhost:8080](http://localhost:8080)

---

## 🗂️ Struktur Proyek

```bash
.
├── app
│   ├── Controllers
│   │   ├── Home.php
│   │   ├── AuthController.php
│   │   ├── ProdukController.php
│   │   ├── TransaksiController.php
│   │   └── Admin/
│   ├── Models
│   │   ├── ProductModel.php
│   │   ├── UserModel.php
│   │   ├── TransactionModel.php
│   │   ├── TransactionDetailModel.php
│   │   └── DiskonModel.php
│   ├── Views
│   │   ├── v_home.php
│   │   ├── v_keranjang.php
│   │   ├── v_checkout.php
│   │   ├── v_profile.php
│   │   ├── admin/
│   │   └── layout.php
├── public
│   ├── img/
│   ├── uploads/
│   └── NiceAdmin/      # Template UI
├── writable/
└── .env
```

---

## 📸 Tampilan UI

| Halaman     | Screenshot                            |
| ----------- | ------------------------------------- |
| Home Produk | ![home](screenshots/home.png)         |
| Keranjang   | ![cart](screenshots/cart.png)         |
| Checkout    | ![checkout](screenshots/checkout.png) |
| Admin Panel | ![admin](screenshots/admin.png)       |

> **Catatan:** Tambahkan folder `screenshots/` berisi tampilan PNG/JPG.

---

## 📦 Seeder & Dummy Data

* **ProductSeeder**: Tambah produk default
* **UserSeeder**: Tambah admin dan user biasa
* **DiskonSeeder**: Menambahkan diskon harian

---

## 🔐 Akun Default

| Role  | Username | Password |
| ----- | -------- | -------- |
| Admin | `admin`  | `123456` |
| User  | `user1`  | `123456` |

---
