# MVC Mahasiswa

Aplikasi pengelolaan data mahasiswa berbasis PHP Native dengan arsitektur Model-View-Controller (MVC) yang dikembangkan pada Praktikum Pemrograman Web FTI UNISKA 2026.

---

## Informasi Kelompok

| Nama | Peran |
|--------|--------|
| Retno Fajar Jayanti | Documentation & Debugging Officer (DDO) |
| Naufal Rizky Prananda | Backend Engineer (BE) |
| Indah Sulistiawati | Frontend Engineer (FE) |

---

## Arsitektur MVC

Aplikasi dibangun menggunakan pola arsitektur MVC (Model-View-Controller).

### Model
Berfungsi mengelola data dan berinteraksi dengan database.

### View
Berfungsi menampilkan antarmuka pengguna.

### Controller
Berfungsi menghubungkan Model dan View serta mengatur alur logika aplikasi.

---

## Fitur Aplikasi

- Menampilkan data mahasiswa
- Menambah data mahasiswa
- Mengubah data mahasiswa
- Menghapus data mahasiswa
- Pencarian data mahasiswa
- Filter data berdasarkan jurusan
- Flash message notifikasi
- Layout responsif menggunakan Bootstrap 5
- Export data ke format CSV
- Export data ke format PDF

---

# Teknologi yang Digunakan

- PHP Native
- MVC Architecture
- MySQL
- PDO
- Bootstrap 5
- JavaScript
- Dompdf
- Git
- GitHub
- Visual Studio Code
- XAMPP
- ChatGPT

---

## Struktur Folder

```text
mvc_mahasiswa/
│
├── app/
│   ├── controllers/
│   ├── models/
│   └── views/
│
├── config/
├── core/
├── public/
├── docs/
│
├── .htaccess
└── README.md
```

---

## Database

Nama database:

```sql
uniska_latihan_mvc_2026
```

Tabel utama:

```sql
mahasiswa
```

---

## Cara Menjalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/naufalproject/mvc_mahasiswa.git
```

### 2. Pindahkan Project ke htdocs

```text
xampp/htdocs/mvc_mahasiswa
```

### 3. Jalankan XAMPP

Aktifkan:

- Apache
- MySQL

### 4. Import Database

Buat database:

```sql
uniska_latihan_mvc_2026
```

Kemudian import file SQL yang telah disediakan.

### 5. Konfigurasi Database

Sesuaikan file:

```php
config/database.php
```

```php
$host = "localhost";
$dbname = "uniska_latihan_mvc_2026";
$username = "root";
$password = "";
```

### 6. Jalankan Aplikasi

```text
[http://localhost/mvc_mahasiswa/public/auth/login]
```

---

## Repository GitHub

https://github.com/naufalproject/mvc_mahasiswa

---

## Hasil Akhir

Aplikasi berhasil mengimplementasikan konsep MVC menggunakan PHP Native dengan fitur CRUD lengkap, Search & Filter, Export CSV/PDF, serta tampilan responsif menggunakan Bootstrap 5.
