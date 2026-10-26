# UTS Pemrograman Web - Sistem Pengelolaan Nilai Mahasiswa

Aplikasi web interaktif untuk mengelola dan merekap data nilai mahasiswa secara terintegrasi. Sistem ini dibangun berbasis PHP native dan MySQL, serta diintegrasikan dengan dashboard template AdminLTE v4 untuk menyajikan antarmuka pengguna (UI) yang modern dan responsif.

## Repository GitHub
URL Repository: [https://github.com/DindaNafa/UTS_PEMROGRAMAN-WEB_DINDA](https://github.com/DindaNafa/UTS_PEMROGRAMAN-WEB_DINDA)

## Fitur Utama
- **Manajemen Data (CRUD):** Tambah data nilai baru, perbarui nilai, dan hapus data mahasiswa.
- **Pengelolaan Foto Mahasiswa:** Menampilkan thumbnail foto mahasiswa di tabel serta dukungan penanganan foto default (default-avatar.svg) jika tidak ada berkas yang diunggah.
- **Pencarian Multi-Kategori (Searching):** Pencarian data berdasarkan Nama Mahasiswa maupun Predikat Nilai menggunakan text input dan dropdown.
- **Pengurutan Data (Sorting):** Pengurutan data dinamis berdasarkan Nilai Akhir menggunakan ikon panah navigasi pada header tabel.
- **Batasi & Navigasi Halaman (Pagination):** Pembatasan jumlah rekaman data per halaman (5, 10, 15) lengkap dengan navigasi First, Previous, Next, dan Last Page.
- **Kalkulasi Otomatis:** Perhitungan otomatis Nilai Akhir, Nilai Huruf (A, B, C, D, E), dan Predikat Kelulusan berdasarkan nilai komponen (Absen, Tugas, UTS, UAS).

## Teknologi yang Digunakan
- **Bahasa Pemrograman:** PHP (Native) & JavaScript
- **Database Management:** MySQL / MariaDB (via HeidiSQL / phpMyAdmin)
- **Web Server Environment:** Laragon / XAMPP (Apache)
- **Front-End & UI Framework:** AdminLTE v4 & Bootstrap 5

## Struktur Berkas Proyek (WEB-PROGRAM)

WEB-PROGRAM/
├── connection.php         # Konfigurasi koneksi ke database MySQL
├── latihan.php            # Fungsi logika perhitungan nilai akhir, huruf, dan predikat
├── viewdata.php           # Halaman utama tabel rekapitulasi data mahasiswa (AdminLTE)
├── insertnilaimhsw.php    # Modul proses validasi dan penyimpan data nilai baru
├── updatenilai.php        # Modul proses pembaharuan data nilai
├── deletenilaimhsw.php    # Modul proses penghapusan data mahasiswa
├── databasenilai.sql      # Berkas ekspor skema & data tabel database
├── uploads/               # Folder penyimpanan berkas foto mahasiswa yang diunggah
│   └── default-avatar.svg # Gambar profil default jika data tanpa foto
└── README.md              # Dokumentasi lengkap proyek UTS

## Skema Database (`nilaimhsw`)

Aplikasi ini menggunakan tabel `nilaimhsw` dengan struktur kolom sebagai berikut:

| Nama Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `nim` | VARCHAR(15) | Primary Key / Nomor Induk Mahasiswa |
| `namalengkap` | VARCHAR(100) | Nama lengkap mahasiswa |
| `nilaiakhir` | DOUBLE / FLOAT | Hasil kalkulasi gabungan nilai komponen |
| `nilaihuruf` | VARCHAR(5) | Konversi nilai huruf (A / B / C / D / E) |
| `predikat` | VARCHAR(50) | Status predikat kelulusan |
| `created_date` | DATETIME | Waktu otomatis pembuatan data |
| `file_path` | VARCHAR(255) | Lokasi file foto yang diunggah (`uploads/...`) |

---

## Petunjuk Penggunaan & Instalasi Lokal

### 1. Persiapan Database
1. Jalankan MySQL pada server lokal Anda (Laragon / XAMPP).
2. Buka HeidiSQL atau phpMyAdmin, lalu buat database baru (misalnya: `db_nilai`).
3. Import berkas `databasenilai.sql` ke dalam database tersebut.
4. Sesuaikan kredensial koneksi di dalam berkas `connection.php` bila diperlukan.

### 2. Membuka Proyek di Web Browser
Pastikan folder proyek terletak di direktori server lokal:
- **Laragon:** `D:\laragon\www\WEB-PROGRAM`
- **XAMPP:** `C:\xampp\htdocs\WEB-PROGRAM`

Jalankan Apache Server.  
Buka browser dan akses alamat URL berikut:  
`http://localhost/WEB-PROGRAM/viewdata.php`

---

## Catatan Penting

- **Struktur Kolom Database:** Kolom identitas nama pada tabel database bernama `namalengkap` (bukan `namamhsw`).
- **Izin Akses Folder Uploads:** Pastikan folder `uploads/` memiliki izin akses tulis (*write permission*) agar proses unggah foto berjalan tanpa hambatan.
- **Foto Default:** Sistem secara otomatis mendeteksi dan menampilkan berkas `uploads/default-avatar.svg` apabila entri data dimasukkan tanpa melampirkan file foto.

---

## Lisensi & Keterangan

Proyek web ini dibuat sebagai bentuk pemenuhan Tugas Ujian Tengah Semester (UTS) Praktikum Pemrograman Web dan dipublikasikan secara terbuka (*Public*) untuk tujuan pembelajaran.
