# Sistem Rekomendasi Minuman Kopi

### Metode Weighted Product dengan Preferensi Pengguna

### (Laravel 12)

Repositori ini berisi aplikasi **Sistem Rekomendasi Minuman Kopi** yang dibangun menggunakan **Laravel 12** dan menerapkan metode **Weighted Product (WP)** untuk menghasilkan rekomendasi berdasarkan preferensi pengguna.

---

## Fitur Utama

-   Input preferensi pengguna (kriteria & bobot).
-   Perhitungan rekomendasi menggunakan metode **Weighted Product**.
-   Manajemen data minuman kopi.
-   Dashboard admin.
-   API internal untuk proses perhitungan.

---

## Persyaratan Sistem

Pastikan Anda telah menginstal:

-   PHP **>= 8.2**
-   Composer
-   MySQL / MariaDB

---

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini:

### Clone Repository

```bash
git clone https://github.com/mrizkimaulidan/tubes-pbk.git
cd tubes-pbk
```

### Install Dependencies

```bash
composer install
```

### Copy file .env.example

Copy file `.env.example` dan rename menjadi `.env`

### Konfigurasi Database

Ubah file `.env` menjadi:

```env
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nama_database>
DB_USERNAME=root
DB_PASSWORD=
```

### Migrasi dan Seeding

```bash
php artisan migrate:fresh --seed
```

### Jalankan Server

```bash
php artisan serve
```

Akses halaman URL di: http://127.0.0.1:8000

## Kredensial Login

Email:

```bash
admin@mail.com
```

Kata Sandi:

```bash
secret
```

## Metode Weighted Product

Metode WP digunakan untuk menghitung rekomendasi dengan rumus:

Sᵢ = ∏ (xᵢⱼ)^(wⱼ)

Keterangan:

-   xᵢⱼ = nilai alternatif i terhadap kriteria j

-   wⱼ = bobot kriteria j (yang telah dinormalisasi)

Langkah-langkah perhitungan WP:

1. Tentukan sifat kriteria (benefit atau cost).

2. Hitung nilai vektor Sᵢ untuk setiap alternatif.

3. Hitung preferensi akhir Vᵢ sebagai dasar perankingan.
