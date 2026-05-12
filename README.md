# 🏛️ SIKATT - Sistem Informasi dan Kearsipan Layanan Surat Kelurahan Tanah Tinggi

SIKATT adalah platform pelayanan administrasi dan kearsipan surat menyurat digital modern yang dirancang khusus untuk Kelurahan Tanah Tinggi. Platform ini memfasilitasi warga, operator/staff kelurahan, dan Lurah untuk saling terintegrasi dalam pengurusan surat menyurat secara mandiri, aman, cepat, dan sepenuhnya nirkertas (*paperless*).

---

## 🎨 Konseptual Desain & Estetika (Forest Green Theme)
Aplikasi ini hadir dengan **Sistem Desain Forest Green Premium** yang didominasi oleh gradasi hijau hutan gelap (`#0D2A1C`), hijau zamrud (`#065f46`), dan hijau mint yang menyegarkan (`#d1fae5`). Desain ini merepresentasikan sifat formal kedinasan yang ramah, profesional, rapi, dan modern. 

Sistem ini juga dilengkapi dengan:
* **Glassmorphic Loading Screen:** Efek loading overlay transparan dengan logo kelurahan ditunjang pendaran indikator neon emerald yang mulus.
* **Responsive Sidebar Navigation:** Navigasi responsif untuk semua aktor (Warga, Staff, Lurah) yang tersinkronisasi sempurna di perangkat mobile maupun desktop.
* **Global Accent Interceptor:** Pengalihan otomatis seluruh elemen visual Tailwind biru menjadi tema emerald kedinasan yang harmonis.

---

## 🌟 Fitur Utama Sistem

### 👤 1. Layanan Mandiri Warga (Masyarakat)
* **Pengajuan Surat Multi-Tipe:** Warga dapat mengajukan berbagai jenis surat pengantar secara online:
  * Surat Keterangan Domisili (**SKD**)
  * Surat Keterangan Tidak Mampu (**SKTM**)
  * Surat Keterangan Usaha (**SKU**)
  * Surat Keterangan Kelahiran (**SKL**)
  * Surat Keterangan Kematian (**SKM**)
  * Permohonan Kartu Tanda Penduduk (**KTP**)
  * Surat Keterangan Izin Cuti (**SIC**)
* **Upload Persyaratan Mandiri:** Mengunggah dokumen persyaratan fisik (KTP/KK) dalam format JPG, PNG, atau PDF secara instan.
* **Tanda Tangan Digital Pemohon:** Fitur tanda tangan digital interaktif langsung di layar menggunakan *Signature Pad (Canvas API)*.
* **Status Pelacakan Real-time:** Melacak status surat dari tahap diajukan, diverifikasi oleh staff, disetujui/ditolak, hingga siap dicetak.

### 💼 2. Alur Kerja Verifikasi Operator (Staff)
* **Dashboard Statistik Interaktif:** Memantau jumlah antrean surat masuk, diproses, dan selesai.
* **Modul Verifikator Berkas:** Memeriksa keabsahan dokumen persyaratan KK/KTP warga dengan **Pratinjau PDF Instan (Inline IFrame PDF Preview)** di dalam dasbor.
* **Nomor Urut Surat Dinas Otomatis:** Sistem secara otomatis menyusun penomoran surat resmi secara urut dan dinamis yang **meriset otomatis ke `001` setiap pergantian tahun**, misalnya:
  > `001/470/SKD/V/2026` (Nomor urut / Kode Klasifikasi / Singkatan Surat / Bulan Romawi / Tahun).
* **Catatan Koreksi (Staff Notes):** Membubuhkan alasan verifikasi atau pesan perbaikan jika berkas ditolak.

### 👑 3. Dasbor Penandatangan & Persetujuan (Lurah)
* **Verifikasi Akhir & One-Click Approval:** Lurah dapat menyetujui surat yang diteruskan oleh Staff dengan satu klik.
* **Tanda Tangan Digital Lurah:** Tanda tangan dinas Lurah disematkan secara otomatis ke dalam dokumen surat PDF saat persetujuan.
* **Laporan Arsip Surat Cetak (PDF Engine):** Cetak laporan rekapitulasi arsip pengajuan surat berformat PDF presisi tinggi bertenaga **DomPDF** dengan integrasi logo wilayah dan tanda tangan digital terenkripsi Base64 yang aman dari masalah pembatasan thread aset.

### 🔔 4. Core System & Security
* **Notifikasi Alur Kerja (Workflows Notification):** Notifikasi real-time interaktif bagi warga saat status surat berubah, serta notifikasi bagi Staff/Lurah saat ada dokumen masuk.
* **Spatie Role Management:** Pengamanan otorisasi akses menggunakan Laravel-Spatie untuk mengunci rute sesuai peran aktor (`masyarakat`, `staff`, `lurah`).
* **Auto-Logout Sesi Pasif:** Sistem keamanan yang memantau keaktifan user dan otomatis mengeluarkan sesi jika terdeteksi pasif dalam jangka waktu tertentu guna mencegah kebocoran data di komputer publik kelurahan.

---

## 🛠️ Persyaratan Sistem
Sebelum menjalankan aplikasi ini, pastikan komputer Anda telah terinstal:
* PHP >= 8.2
* MySQL / MariaDB
* Composer
* Node.js & NPM
* Web Server (XAMPP / Laragon / Apache)

---

## 🚀 Panduan Instalasi Lokal

### 1. Klon Repositori
```bash
git clone https://github.com/kdpras00/SIKATT.git
cd SIKATT
```

### 2. Instal Dependensi PHP & JavaScript
```bash
composer install
npm install
```

### 3. Konfigurasi Lingkungan (.env)
Salin berkas `.env.example` menjadi `.env` lalu sesuaikan kredensial basis data Anda:
```bash
cp .env.example .env
```
Edit konfigurasi database pada `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sikatt
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Buat Aplikasi Key & Hubungkan Penyimpanan
```bash
php artisan key:generate
php artisan storage:link
```

### 5. Migrasi & Seeding Database Murni
Jalankan migrasi bersih beserta seeding data awal (Roles, Users, & Template Surat):
```bash
php artisan migrate:fresh --seed
```

### 6. Kompilasi Aset Visual & Jalankan Server Lokal
Jalankan kompilasi aset frontend dan server development Laravel secara bersamaan:

Di Terminal 1 (Vite Dev Server):
```bash
npm run dev
```

Di Terminal 2 (Laravel Dev Server):
```bash
php artisan serve
```
Buka peramban (*browser*) Anda dan akses alamat: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🔑 Kredensial Pengujian Default (Seeders)

Sistem telah menyediakan beberapa akun percobaan dengan peran masing-masing:

| Peran | Email | Kata Sandi | Kegunaan |
| :--- | :--- | :--- | :--- |
| **Lurah** | `lurah@tanah-tinggi.com` | `password` | Persetujuan & Cetak Laporan |
| **Staff/Operator** | `staff@tanah-tinggi.com` | `password` | Verifikasi Berkas & Input No. Surat |
| **Warga (Masyarakat)** | `warga@gmail.com` | `password` | Pengajuan Surat Mandiri |

---

## 📂 Struktur Migrasi Inti Basis Data (Squeezed & Clean)
Struktur migrasi basis data SIKATT dibuat sangat bersih tanpa adanya tabel/kolom duplikat atau migrasi tam-sul (*incremental*) yang menumpuk:
1. `0001_01_01_000000_create_users_table.php` — Menyimpan informasi profil biodata warga (`nik`, `kk`, `address`, `phone`, `avatar`, dsb).
2. `2025_12_08_092341_create_letter_types_table.php` — Menyimpan daftar tipe surat resmi, konfigurasi isian form, dan kode klasifikasi persuratan.
3. `2025_12_08_092343_create_letters_table.php` — Menyimpan data transaksi surat, data isian dinamis berformat JSON (`data`), catatan staff, dan hash keamanan integritas dokumen (`sha256_hash`).

---

## 🏛️ Lisensi
Aplikasi ini dikembangkan untuk kepentingan Kelurahan Tanah Tinggi dan bersifat open-source di bawah lisensi [MIT License](LICENSE).
