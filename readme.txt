# Formulir Contact Us

## Deskripsi
Sistem pendaftaran mahasiswa sederhana dengan dua file: index.php untuk formulir pendaftaran dan proses.php untuk menyimpan data ke database MySQL.

## Struktur Proyek

- *index.php*: Formulir pendaftaran dengan input untuk NIM, nama, kelas, jenis kelamin, email, dan pesan.
- *proses.php*: Mengolah dan menyimpan data dari formulir ke database menggunakan prepared statements.

## Prerequisites

- *Database MySQL:*
  - *Database Name:* form_kontak
  - *Tabel:* kontak dengan kolom nim, nama, kelas, jenis_kelamin, email, pesan.

## Instalasi

1. *Setup Database:*
   ```sql
   CREATE TABLE kontak (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nim VARCHAR(50),
       nama VARCHAR(100),
       kelas VARCHAR(10),
       jenis_kelamin ENUM('laki-laki', 'perempuan'),
       email VARCHAR(100),
       pesan TEXT
   );
2. Konfigurasi:

Sesuaikan kredensial database di proses.php jika diperlukan.
Menjalankan Aplikasi:

3. Tempatkan index.php dan proses.php di server web.
Akses index.php melalui browser.