<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dist/assets/css/style.css">
</head>

<body class="bg-slate-200">
    <div class="container px-6 sm:px-2 py-8 mx-auto">
        <div class="bg-white max-w-lg mx-auto px-5 py-6 rounded-lg shadow-lg ">
            <h1 class="text-center text-3xl font-medium mb-8">Tambah Transaksi</h1>

            <?php
            if (isset($_SESSION['error_message'])):
            ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <?= $_SESSION['error_message']; ?>
            </div>
            <?php 
            unset($_SESSION['error_message']);
            endif;
            ?>

            <form id="transactionForm" action="./src/includes/tambah-transaksi-proses.php" method="post">
                <!-- Tipe Transaksi -->
                <div class="mb-4">
                    <label for="" class="block text-slate-800 font-medium mb-2">Tipe Transaksi</label>
                    <div class="flex gap-4">
                        <label for="" class="flex item-center p-4 border rounded-lg flex-1 cursor-pointer">
                            <input type="radio" name="type" value="income"
                                class="h-4 w-4 text-green-600 focus:ring-green-500" checked>
                            <span class="ml-3 text-slate-700">Pemasukan</span>
                        </label>
                        <label for="" class="flex item-center p-4 border rounded-lg flex-1 cursor-pointer">
                            <input type="radio" name="type" value="expense"
                                class="h-4 w-4 text-red-600 focus:ring-red-500" checked>
                            <span class="ml-3 text-slate-700">Pengeluaran</span>
                        </label>
                    </div>
                </div>

                <!-- Jumlah -->
                <div class="mb-4">
                    <label for="amount" class="block text-slate-800 font-medium mb-2">Jumlah</label>
                    <input type="number" id="amount" name="amount" placeholder="100000"
                        class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:border-slate-500">
                </div>

                <!-- Kategori -->
                <div class="mb-4">
                    <label for="category" class="block text-slate-800 font-medium mb-2">Kategori</label>
                    <select id="category" name="category" required
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="Makanan">Makanan</option>
                        <option value="Tagihan">Tagihan</option>
                        <option value="Hiburan">Hiburan</option>
                        <option value="Gaji">Gaji</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Tanggal Transaksi -->
                <div class="mb-4">
                    <label for="transaction_date" class="block text-slate-800 font-medium mb-2">Tanggal
                        Transaksi</label>
                    <input type="date" id="transaction_date" name="transaction_date" required
                        class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:border-slate-500"></label>
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="description" class="block text-slate-800 font-medium mb-2">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:border-blue-500"></textarea>
                </div>

                <!-- Tombol aksi -->
                <div class="flex gap-4">
                    <a href="dashboard.php"
                        class="text-center w-full bg-slate-600 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded">
                        Batal
                    </a>
                    <button type="submit"
                        class="text-center w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan
                    </button>

                </div>
            </form>
        </div>
    </div>
    <script src="./src/includes/tambah-transaksi-proses.js"></script>
</body>

</html>