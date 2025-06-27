<?php
session_start();
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
    <title>Login - Pencatat Keuangan</title>
    <link href="./dist/assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-slate-100">
    <div class="container mx-auto max-w-md p-4 md:p-8 mt-10">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-slate-800">Selamat Datang!</h1>
                <p class="text-slate-500">Masuk untuk melanjutkan</p>
            </div>

            <!-- Tampilkan pesan error/sukses jika ada -->
            <?php if (isset($_SESSION['error_message'])): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg"><?= htmlspecialchars($_SESSION['error_message']) ?>
            </div>
            <?php unset($_SESSION['error_message']); ?>
            <?php elseif (isset($_SESSION['success_message'])): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                <?= htmlspecialchars($_SESSION['success_message']) ?></div>
            <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <form action="src/includes/login-proses.php" method="POST">
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
                    Masuk
                </button>
                <p class="text-center text-sm text-slate-500 mt-6">
                    Belum punya akun? <a href="register.php" class="font-medium text-blue-600 hover:underline">Daftar di
                        sini</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>