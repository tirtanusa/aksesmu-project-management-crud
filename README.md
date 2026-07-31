# Product Management App

Aplikasi web sederhana untuk manajemen produk yang dibangun menggunakan framework **Laravel** dan didesain dengan **Tailwind CSS**. Aplikasi ini memiliki fitur CRUD lengkap (Create, Read, Update, Delete) serta fitur pencarian dan penyaringan (filter) stok produk.

## Fitur Utama

- **CRUD Produk**: Tambah, lihat detail, edit, dan hapus produk.
- **Pencarian Produk**: Mencari produk berdasarkan nama.
- **Filter Stok**: Memfilter produk berdasarkan status stok:
  - **Semua**: Menampilkan semua produk.
  - **Tersedia**: Menampilkan produk dengan stok > 0.
  - **Habis**: Menampilkan produk dengan stok = 0 (disertai indikator peringatan visual).
- **Pagination**: Pembagian halaman otomatis untuk daftar produk.
- **Responsive Design**: Antarmuka yang ramah pengguna baik di tampilan desktop maupun perangkat seluler.

---

## Prasyarat (Prerequisites)

Sebelum menjalankan proyek ini, pastikan Anda telah memasang:

- **PHP** (minimal versi 8.1)
- **Composer**
- **Node.js & NPM**
- **Database** (MySQL / SQLite / PostgreSQL)

---

## Langkah Instalasi & Cara Menjalankan

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek di komputer lokal Anda:

### 1. Klon Repositori (Clone Repository)
Jika Anda mengunduh proyek ini melalui Git, jalankan perintah berikut:
```bash
git clone <url-repository>
cd product-management
```
*(Lewati langkah ini jika Anda sudah berada di dalam folder proyek)*

### 2. Instal Dependensi Composer (PHP)
Instal paket-paket PHP yang dibutuhkan oleh Laravel:
```bash
composer install
```

### 3. Instal Dependensi NPM (Frontend)
Instal paket-paket JavaScript dan aset CSS untuk Tailwind:
```bash
npm install
```

### 4. Salin File Konfigurasi Lingkungan (.env)
Salin berkas konfigurasi template `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
*Catatan untuk pengguna Windows (Command Prompt/PowerShell):*
```powershell
copy .env.example .env
```

### 5. Generate Application Key
Jalankan perintah ini untuk membuat key aplikasi Laravel yang unik:
```bash
php artisan key:generate
```

### 6. Konfigurasi Database
Buka file `.env` di editor teks Anda dan sesuaikan konfigurasi database berikut dengan server database lokal Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```
*Pastikan Anda sudah membuat database kosong dengan nama yang sesuai di MySQL/DBMS Anda.*

### 7. Jalankan Migrasi Database
Jalankan perintah migrasi untuk membuat tabel produk di database:
```bash
php artisan migrate
```

### 8. Jalankan Server Pengembangan (Dev Servers)
Untuk menjalankan aplikasi secara lokal, Anda harus menjalankan server PHP Artisan dan build tool NPM secara bersamaan.

Buka terminal pertama untuk menjalankan **Laravel Development Server**:
```bash
php artisan serve
```
Aplikasi Anda sekarang dapat diakses di [http://localhost:8000](http://localhost:8000).

Buka terminal kedua untuk menjalankan **Vite (Compiler Tailwind CSS)**:
```bash
npm run dev
```
*(Biarkan kedua terminal ini tetap berjalan selama Anda mengembangkan atau menggunakan aplikasi)*
