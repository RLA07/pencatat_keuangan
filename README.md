<div align="center">

<!-- <img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/src/assets/logos/Logo2.png" width="250" alt="Ikon Keuangan Bergerak"> -->

<img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/src/assets/logos/Logo-Fit.png" width="180" alt="Ikon Keuangan Bergerak">

Sebuah aplikasi web modern untuk melacak setiap pemasukan dan pengeluaran dengan mudah. Dibangun dengan praktik terbaik untuk membantu Anda memahami alur kas dan mencapai tujuan finansial. Proyek ini adalah studi kasus dalam membangun aplikasi PHP prosedural yang rapi, aman, dan mudah dipelihara.

</div>

---

## ✨ Fitur Utama

- [x] **Otentikasi Pengguna Aman:** Sistem registrasi & login lengkap dengan _hashing_ password menggunakan `password_hash()`.
- [x] **Dashboard Interaktif:** Ringkasan visual saldo, pemasukan, dan pengeluaran yang dihitung secara _real-time_.
- [x] **Manajemen Transaksi CRUD:**
  - `[✓]` **Create:** Menambah data transaksi baru.
  - `[✓]` **Read:** Menampilkan riwayat transaksi.
  - `[✓]` **Update:** Mengubah data transaksi yang sudah ada.
  - `[✓]` **Delete:** Menghapus transaksi dengan aman.
- [x] **Desain Responsif & Modern:** Dibangun dengan Tailwind CSS, nyaman diakses dari desktop maupun mobile.
- [x] **Pengalaman Pengguna (UX) yang Ditingkatkan:** Fitur seperti _Kebab Menu_ di mobile dan _Tooltip_ deskripsi untuk menjaga antarmuka tetap bersih.

---

## 🚀 Tumpukan Teknologi (Tech Stack)

<div align="center">
    <img src="https://img.shields.io/badge/CSS-663399?style=for-the-badge&logo=CSS&logoColor=white" alt="CSS">
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
    <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">

</div>

---

## 🛠️ Panduan Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

### **1. Prasyarat**

Pastikan Anda sudah menginstal perangkat lunak berikut:

- [XAMPP](https://www.apachefriends.org/index.html) (atau server lokal lain seperti WAMP, MAMP)
- [Node.js & NPM](https://nodejs.org/en/)
- [Git](https://git-scm.com/)

### **2. Langkah-langkah Setup**

1.  **Clone Repositori**
    Pindahkan ke direktori `htdocs` XAMPP Anda, lalu jalankan:

    ```bash
    git clone https://github.com/RLA07/pencatat_keuangan.git
    cd nama_folder_proyek
    ```

2.  **Setup Database**

    - Jalankan **Apache** dan **MySQL** dari XAMPP Control Panel.
    - Buka browser dan navigasikan ke `http://localhost/phpmyadmin`.
    - Buat database baru dengan nama `db_keuangan`.
    - Pilih database `db_keuangan`, lalu buka tab **"Import"**.
    - Pilih file `db_keuangan.sql` dari dalam folder `database` proyek dan klik "Go".

3.  **Konfigurasi Aplikasi (Langkah Penting)**

    - Buka file `config.php` yang ada di folder utama proyek.
    - Sesuaikan nilai variabel `$servername`, `$username`, `$password`, dan `$database` dengan konfigurasi database anda.

      ```php
      // Contoh di dalam config.php
      $servername = "127.0.0.1";
      $username = "root";
      $password = "";
      $database = "db_keuangan";
      ```

4.  **Install Dependensi & Build CSS**

    - Buka terminal di folder utama proyek.
    - Install dependensi Node.js:
      ```bash
      npm install
      ```
    - Jalankan proses build Tailwind CSS. **Biarkan terminal ini tetap berjalan selama Anda mengembangkan proyek.**
      ```bash
      npm run build
      ```

5.  **Jalankan Proyek**
    - Buka browser dan navigasikan ke URL yang sudah dikonfigurasi. Biasanya dimulai dengan:
      ```
      http://localhost/NAMA_FOLDER_PROYEK_ANDA/
      ```

---

## 갤러리 Tampilan Aplikasi

<details>
<summary>Klik untuk melihat screenshot</summary>
<br>
<table>
  <tr >
    <td><center><img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/screenshot/desktop-login.png" width="80%" alt="Halaman Login"></center></td>
  </tr>
  <tr >
    <td><center><img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/screenshot/desktop-dashboard.png" width="80%" alt="Dashboard Desktop"></center></td>
  </tr>
  <tr >
    <td><center><img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/screenshot/desktop-tambah-transaksi.png" width="80%" alt="Form Tambah Transaksi"></center></td>
  </tr>
  <tr >
    <td><center><img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/screenshot/mobile-login.jpg" width="50%" alt="Halaman Login"></center></td>
  </tr>
  <tr >
    <td><center><img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/screenshot/mobile-dashboard.jpg"width="50%" alt="Dashboard Desktop"></center></td>
  </tr>
  <tr >
    <td><center><img src="https://raw.githubusercontent.com/RLA07/pencatat_keuangan/main/screenshot/mobile-tambah-transaksi.jpg" width="50%" alt="Form Tambah Transaksi"></center></td>
  </tr>
</table>
</details>

---

## 📁 Struktur Proyek (Versi Terbaru)

Struktur folder ini dirancang untuk kerapian dan kemudahan pengelolaan, memisahkan file berdasarkan fungsi dan teknologinya.

```
.
├── config.php          # File konfigurasi utama (BASE_URL, Koneksi DB)
├── database/           # Berisi file dump .sql
├── dist/               # Folder output hasil kompilasi (untuk browser)
│   └── assets/
│       ├── css/
│       ├── fonts/
│       └── logos/
├── src/                # Folder kerja utama (tempat Anda menulis kode)
│   ├── assets/         # Aset sumber (CSS kustom, gambar asli)
│   │   ├── css/
│   │   ├── fonts/
│   │   └── logos/
│   └── includes/
│       ├── js/         # File JavaScript untuk interaktivitas
│       └── php/        # File-file prosesor PHP (backend logic)
├── dashboard.php       # Halaman utama setelah login, menampilkan ringkasan dan riwayat transaksi
├── edit-transaksi.php  # Halaman untuk mengedit transaksi
├── index.php           # Redirect ke halaman dashboard jika sudah login, atau login jika belum
├── login.php           # Halaman login pengguna
├── logout.php          # Proses logout pengguna
├── register.php        # Halaman registrasi pengguna baru
├── tambah-transaksi.php # Halaman untuk menambah transaksi baru
├── .gitignore
├── package.json
└── tailwind.config.js
```

<div align="center">
Dibuat dengan begadang dan secangkir semangat ☕
</div>
