<?php
session_start();

// Jika pengguna belum login, tendang ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dist/assets/css/style.css">
</head>

<body>
    <div class="container mx-auto max-w-full p-10 md:p-10">
        <!-- Header -->
        <?php include "./src/includes/header.php"; ?>

        <!-- Ringkasan Keuangan -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-slate-500 font-medium">Saldo Saat Ini</h2>
                <p class="sm:text-2xl text-3xl font-bold text-blue-600">RP 5.000.000</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-slate-500 font-medium">Pemasukan (Bulan Ini)</h2>
                <p class="sm:text-2xl text-3xl font-bold text-blue-600">RP 5.000.000</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-slate-500 font-medium">Pengeluaran (Bulan Ini)</h2>
                <p class="sm:text-2xl text-3xl font-bold text-blue-600">RP 5.000.000</p>
            </div>
        </div>

        <!-- Riwayat Transaksi -->
        <div>
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-slate-800 mb-4 md:mb-0">Riwayat Transaksi</h2>
                <a href="tambah-transaksi.php"
                    class="w-full sm:w-auto bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah Transaksi</a>
            </div>
            <div class="overflow-y-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-100 border-b border-slate-200">
                        <tr>
                            <th class="p-4">Tanggal</th>
                            <th class="p-4">Kategori</th>
                            <th class="p-4">Deskripsi</th>
                            <th class="text-right p-4">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-200">
                            <td class="p-4">25 Jun 2025</td>
                            <td class="p-4">Gaji</td>
                            <td class="p-4">Gaji Bulanan</td>
                            <td class="text-right p-4">+ RP 15.000.000</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="p-4">25 Jun 2025</td>
                            <td class="p-4">Gaji</td>
                            <td class="p-4">Gaji Bulanan</td>
                            <td class="text-right p-4">+ RP 15.000.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>