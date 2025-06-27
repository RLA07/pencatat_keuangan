<header class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-2xl font-semibold mb-2">Dashboard Keuangan</h1>
        <p class="text-slate-500">Hallo <?= htmlspecialchars($_SESSION['username']) ?>!</p>
    </div>
    <a href="logout.php"
        class="bg-slate-200 text-slate-700 font-medium py-2 px-4 rounded-lg hover:bg-slate-300 transition-colors duration-300">
        Keluar
    </a>
</header>