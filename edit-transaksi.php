<?php
session_start();
require_once __DIR__ . '/config.php';
require_once ROOT_PATH . "/src/includes/php/edit-transaksi-include.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi - Nawala</title>
    <link rel="stylesheet" href="./dist/assets/css/style.css">
    <?php require_once ROOT_PATH . "/src/includes/php/favicon.php"; ?>
</head>

<body class="bg-slate-200">
    <div class="container px-4 sm:px-6 py-4 sm:py-8 mx-auto">
        <div class="bg-white max-w-lg mx-auto px-5 py-6 rounded-lg shadow-lg">
            <h1 class="text-center text-3xl font-semibold mb-8">
                Edit Transaksi
            </h1>
            <?php if (isset($_SESSION['error_message'])): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <?= htmlspecialchars($_SESSION['error_message']) ?>
            </div>
            <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <form action="./src/includes/php/edit-transaksi-proses.php" method="post">

                <input type="hidden" name="transaction_id" value="<?= htmlspecialchars($transaction['id']) ?>">

                <div class="mb-4 w-full">
                    <label for="" class="block text-slate-800 font-medium mb-2">Tipe Transaksi</label>
                    <div class="flex gap-4 sm:gap-4">
                        <label for="income"
                            class="flex items-center py-4 px-2  sm:px-4 border rounded-lg flex-1 cursor-pointer has-[:checked]:bg-blue-50 has-[:checked]:border-blue-500">
                            <input type="radio" id="income" name="type" placeholder="Pemasukan" value="income"
                                class="h-4 w-4 text-green-600 focus:ring-green-500"
                                <?= ($transaction['type'] == 'income')? 'checked' : '' ?>>
                            <span class="ml-3 text-slate-800">Pemasukan</span>
                        </label>
                        <label for="expense"
                            class="flex items-center py-4 px-2  sm:px-4 border rounded-lg flex-1 cursor-pointer has-[:checked]:bg-blue-50 has-[:checked]:border-blue-500">
                            <input type="radio" id="expense" name="type" placeholder="Pengeluaran" value="expense"
                                class="h-4 w-4 text-red-600 focus:ring-red-500"
                                <?= ($transaction['type'] == 'expense')? 'checked' : '' ?>>
                            <span class="ml-3 text-slate-800">Pengeluaran</span>
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="amount" class="block text-slate-800 font-medium mb-2">Jumlah</label>
                    <input type="number" id="amount" name="amount"
                        value="<?= htmlspecialchars($transaction['amount']) ?>" required
                        class="w-full px-4 py-2 rounded-lg border-slate-300 border">
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-slate-800 font-medium mb-2">Kategori</label>
                    <select id="category" name="category" required
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 bg-white">
                        <?php 
                        $categories = ['Makanan', 'Tagihan', 'Hiburan', 'Gaji', 'Lainnya'];
                        foreach ($categories as $category) {
                            $selected = ($transaction['category'] == $category)? 'selected' : '';
                            echo "<option value='{$category}' {$selected}>{$category}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="transaction_date" class="block text-slate-800 font-medium mb-2">Tanggal
                        Transaksi</label>
                    <input type="date" id="transaction_date" name="transaction_date"
                        value="<?= htmlspecialchars($transaction['transaction_date']) ?>" required
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg">
                </div>

                <div class=" mb-6">
                    <label for="description" class="block text-slate-800 font-medium mb-2">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($transaction['description']) ?>
                    </textarea>
                </div>

                <div class="flex gap-4">
                    <a href="./dashboard.php"
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

</body>

</html>