<div align="center">

# **Nawala**

_💸 Your Personal Finance Compass 💸_

Sebuah aplikasi web sederhana namun kuat untuk melacak setiap pemasukan dan pengeluaran Anda. Dibuat untuk membantu Anda memahami ke mana perginya uang Anda dan mencapai tujuan keuangan.

</div>

---

## ✨ Fitur Utama

- [x] **Otentikasi Pengguna Aman:** Sistem registrasi & login lengkap dengan _hashing_ password.
- [x] **Dashboard Interaktif:** Ringkasan visual saldo, pemasukan, dan pengeluaran.
- [x] **Manajemen Transaksi (CRUD):**
  - `[✓]` Tambah dan lihat transaksi.
  - `[🚧]` Edit dan hapus transaksi (dalam pengembangan).
- [x] **Riwayat Transaksi:** Semua catatan keuangan Anda tersimpan rapi dan terurut.
- [x] **Desain Responsif:** Tampilan modern dan nyaman diakses dari desktop maupun mobile.

---

## 🚀 Teknologi yang Digunakan

<div align="center">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
    <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
</div>

---

## 🛠️ Panduan Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal Anda.

### **1. Prasyarat**

Pastikan Anda sudah menginstal perangkat lunak berikut:

- [XAMPP](https://www.apachefriends.org/index.html) (dengan `PHP 7.4+` direkomendasikan)
- [Node.js & NPM](https://nodejs.org/en/) (v16 ke atas direkomendasikan)
- [Git](https://git-scm.com/)

### **2. Langkah-langkah Setup**

1.  **Clone Repositori**

    ```bash
    git clone [https://github.com/RLA07/pencatat_keuangan.git](https://github.com/RLA07/pencatat_keuangan.git)
    cd pencatat_keuangan
    ```

2.  **Setup Database**

    - Jalankan **Apache** dan **MySQL** dari XAMPP Control Panel.
    - Buka browser dan navigasikan ke `http://localhost/phpmyadmin`.
    - Buat database baru dengan nama `db_keuangan`.
    - Pilih database `db_keuangan`, lalu buka tab **"Import"**.
    - Pilih file `db_keuangan.sql` di dalam folder `database` dan klik "Go".

3.  **Konfigurasi Koneksi Database**

    - Navigasikan ke folder `src/includes/`.
    - Buka dan sesuaikan file `db_connection.php` dengan konfigurasi database Anda:

      ```php
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "db_keuangan";

      $conn = new mysqli($servername, $username, $password, $database);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      // echo "Connected successfully!"; // Baris ini untuk pengujian
      ?>
      ```

      > _**Catatan:** Setelah memastikan koneksi berhasil, disarankan untuk memberi komentar (`//`) atau menghapus baris `echo "Connected successfully!";` agar tidak mengganggu output halaman._

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
    - Pastikan folder proyek `pencatat_keuangan` berada di dalam direktori `htdocs` XAMPP Anda.
    - Buka browser dan navigasikan ke:
      ```
      http://localhost/pencatat_keuangan/register.php
      ```

---

## 📁 Struktur Proyek

Struktur folder dirancang agar rapi dan mudah dikelola, memisahkan antara kode sumber dan hasil kompilasi.

```
.
├── database/         # Berisi file dump .sql untuk setup awal
│   └── db_keuangan.sql
├── dist/             # Folder output hasil kompilasi (JANGAN DIEDIT LANGSUNG)
│   └── assets/
│       ├── css/      # Berisi style.css yang digenerate
│       ├── fonts/    # Berisi file font
│       └── logos/    # Berisi file logo
├── src/              # Folder kerja utama (Di sini Anda menulis kode)
│   ├── assets/
│   │   ├── fonts/    # Sumber file font
│   │   └── logos/    # Sumber file logo
│   └── includes/     # Skrip PHP reusable (koneksi DB, header, dll)
├── *.php             # File-file halaman utama (login, dashboard, dll)
├── .gitignore        # Daftar file/folder yang diabaikan oleh Git
├── package.json      # Konfigurasi proyek Node.js & daftar dependensi
└── tailwind.config.js# Konfigurasi Tailwind CSS
```

<div align="center">
Dibuat dengan begadang dan secangkir semangat ☕
</div>
