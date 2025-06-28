<?php
require './src/includes/dashboard-proses.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./dist/assets/css/style.css">
    <?php require "./src/includes/favicon.php"; ?>
</head>

<body class="w-[100vw] h-auto">
    <div class="container mx-auto max-w-full px-4 pb-10 pt-4 md:px-10">
        <!-- Header -->
        <?php include "./src/includes/header.php"; ?>

        <!-- Pesan Sukses (Jika Ada) -->
        <?php if (isset($get_GET['status']) && $get_GET['status'] == 'success'): ?>
        <div class="mb-4 p-4 bg-green-100 tex-green-700 rounded-lg">
            Transaksi berhasil disimpan!
        </div>
        <?php endif; ?>

        <!-- Ringkasan Keuangan -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-slate-500 font-medium">Saldo Saat Ini</h2>
                <p class="md:text-2xl text-xl font-bold text-blue-600">RP
                    <?= number_format($current_balance, 0, ',', '.') ?></p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-slate-500 font-medium">Pemasukan (Bulan Ini)</h2>
                <p class="md:text-2xl text-xl font-bold text-green-600">+ RP
                    <?= number_format($monthly_income, 0, ',', '.') ?></p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-slate-500 font-medium">Pengeluaran (Bulan Ini)</h2>
                <p class="md:text-2xl text-xl font-bold text-red-600">- RP
                    <?= number_format($monthly_expense, 0, ',', '.') ?></p>
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
                <table class=" text-left w-full">
                    <thead class="bg-slate-100 border-b border-slate-200 rounded-top-circle">
                        <tr>
                            <th class="p-4 text-sm sm:text-md font-normal sm:font-bold">Tanggal</th>
                            <th class="p-4 hidden sm:table-cell text-sm sm:text-md font-normal sm:font-bold">Kategori
                            </th>
                            <th class="p-4 text-sm sm:text-md font-normal sm:font-bold">Deskripsi</th>
                            <th class="text-right text-sm sm:text-md font-normal sm:font-bold p-4">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($transactions)): ?>
                        <tr class="border-b border-slate-200">
                            <td colspan="4" class="p-4 text-center sm:text-xl font-light text-slate-600">Belum ada
                                transaksi. Mulai tambahkan!
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($transactions as $trans): ?>
                        <tr class="border-b border-slate-200">
                            <td class="p-4 text-slate-700">
                                <?= htmlspecialchars(date('d M Y', strtotime($trans['transaction_date']))) ?>
                            </td>
                            <td class="p-4 hidden sm:table-cell text-slate-700">
                                <?= htmlspecialchars($trans['category']) ?>
                            </td>
                            <td class="p-4 text-slate-700">
                                <?= htmlspecialchars($trans['description']) ?>
                            </td>
                            <td
                                class="text-right p-4 font-bold text-md lg:text-xl <?php echo ($trans['type'] == 'income')? 'text-green-600' : 'text-red-600';?> ">
                                <?php echo ($trans['type'] == 'income')? '+ ' : '- '; ?>
                                Rp <?= number_format($trans['amount'], 0, ',', '.') ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>