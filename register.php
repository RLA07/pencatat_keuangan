<?php
session_start();
require_once __DIR__ . '/config.php';

// Jika pengguna sudah login, alihkan ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Nawala</title>
    <link href="./dist/assets/css/style.css" rel="stylesheet">
    <?php require_once  ROOT_PATH . "/src/includes/php/favicon.php"; ?>
</head>

<body class="bg-slate-100">
    <div class="container mx-auto max-w-md p-4 md:p-8 mt-10">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-slate-800">Buat Akun Baru</h1>
                <p class="text-slate-500">Mulai catat keuangan Anda hari ini</p>
            </div>

            <!-- Tampilkan pesan error jika ada dari proses registrasi -->
            <?php if (isset($_SESSION['error_message'])): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <?= htmlspecialchars($_SESSION['error_message']) ?>
            </div>
            <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <form action="src/includes/php/register-proses.php" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-slate-700 font-medium mb-2">Username</label>
                    <input type="text" id="username" name="username" required
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-slate-700 font-medium mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-slate-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                    Daftar
                </button>
                <p class="text-center text-sm text-slate-500 mt-6">
                    Sudah punya akun? <a href="login.php" class="font-medium text-blue-600 hover:underline">Masuk di
                        sini</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>