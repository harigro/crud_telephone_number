# CRUD Mahasiwa dengan Flight PHP & Plates

Aplikasi CRUD untuk mengelola data nomor telepon menggunakan Flight PHP sebagai framework backend dan Plates sebagai template engine. Aplikasi ini menggunakan arsitektur Model-View-Controller (MVC) dan Bootstrap 5.3.3 untuk tampilan frontend.

## Struktur Direktori

```markdown
/crud_mahasiswa
├── /public
│   ├── index.php
│   ├── .htaccess
│   ├── /assets
│   │   ├── /css
│   │   │   ├── bootstrap.min.css
│   │   ├── /js
│   │   │   ├── bootstrap.bundle.min.js
├── /src
│   ├── /Controllers
│   │   ├── TelephoneController.php
│   ├── /Models
│   │   ├── Telephone.php
│   ├── /Views
│   │   ├── telephone
│   │   │   /modal
│   │   │   │   ├── edit_data.php
│   │   │   │   ├── tambah_data.php
│   │   │   ├── index.php
│   │   │   ├── 404.php
│   │   │   ├── list.php
│   ├── config.php
│   ├── registrasi.php
│   ├── Database.php
├── /vendor
├── composer.json
```

## Fitur

1. **Tambah Nomor Telepon** - Menambahkan nomor telepon baru ke dalam database.
2. **Tampilkan Nomor Telepon** - Menampilkan daftar nomor telepon yang telah tersimpan.
3. **Update Nomor Telepon** - Mengubah data nomor telepon yang ada.
4. **Hapus Nomor Telepon** - Menghapus nomor telepon dari daftar.
5. **Pencegahan Dari Serangan XSS** - Memberikan perlindunan dari serangan xss.

## Persyaratan

- PHP 8.2 atau yang lebih baru.
- Composer untuk mengelola dependensi.
- Database (misalnya MySQL atau SQLite) untuk menyimpan data nomor telepon.

## Instalasi

1. Clone repositori ini ke direktori lokal:
   
   ```bash
   git clone https://github.com/harigro/crud_mahasiswa.git
   ```

2. Masuk ke direktori proyek:
   
   ```bash
   cd crud_mahasiswa
   ```

3. Jalankan Composer untuk menginstal dependensi:
   
   ```bash
   composer install
   ```
   * jika terjadi kesalahan dalam menginstalsi dependensi, solusinya hapus folder vendor dan composer.lock lalu jalanakan perintah

4. Pastikan konfigurasi database sudah benar di `src/config.php`.

5. Jalankan aplikasi dengan menjalankan `index.php` melalui server lokal (misalnya, menggunakan XAMPP, MAMP, atau PHP built-in server):
   
   ```bash
   php -S localhost:8000 -t public
   ```

6. Akses aplikasi melalui browser dengan mengunjungi `http://localhost:8000`.

## Konfigurasi `.htaccess`

Untuk mengarahkan semua permintaan ke `public/index.php`, buat file `.htaccess` di dalam folder `public` dengan konfigurasi berikut:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
</IfModule>

```

## Pengarahan ke 404

Jika ada inputan yang kosong atau tidak valid, aplikasi akan mengarahkan pengguna ke halaman 404. Anda bisa mengonfigurasi pengecekan input di controller dan memastikan aplikasi mengarah ke `views/belanja/404.php` jika ada kesalahan.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE) dan jika ada pertanyaan atau saran, silakan buat **issue** atau **pull request**! 🚀.