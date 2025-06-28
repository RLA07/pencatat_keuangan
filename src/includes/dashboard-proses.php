<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'src/includes/db_connection.php';
$user_id = $_SESSION['user_id'];

// Logika Menghitung Ringkasan Keuangan
function getSingleResult($conn, $sql, $user_id) {
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $row ? (float)$row['total'] : 0;
}

// a. Hitung Total Pemasukan (sepanjang waktu)
$sql_total_income = "SELECT SUM(amount) as total FROM transactions WHERE user_id = ? AND type = 'income'";
$total_income = getSingleResult($conn, $sql_total_income, $user_id);

// b. Hitung Total Pengeluaran (sepanjang waktu)
$sql_total_expense = "SELECT SUM(amount) as total FROM transactions WHERE user_id = ? AND type = 'expense'";
$total_expense = getSingleResult($conn, $sql_total_expense, $user_id);

// Hitung saldo Saat Ini
$current_balance = $total_income - $total_expense;

// Hitung Pemasukan (Bulan Ini)
$sql_monthly_income = "SELECT SUM(amount) AS total FROM transactions WHERE user_id = ? AND type = 'income' AND MONTH(transaction_date) = MONTH(CURDATE()) AND YEAR(transaction_date) = YEAR(CURDATE())";
$monthly_income = getSingleResult($conn, $sql_monthly_income, $user_id);

// Hitung Pengeluaran (Bulan Ini)
$sql_monthly_expense = "SELECT SUM(amount) AS total FROM transactions WHERE user_id = ? AND type = 'expense' AND MONTH(transaction_date) = MONTH(CURDATE()) AND YEAR(transaction_date) = YEAR(CURDATE())";
$monthly_expense = getSingleResult($conn, $sql_monthly_expense, $user_id);


// Logika Mengambil Riwayat Transaksi
$sql_transactions = "SELECT id, type, amount, category, description, transaction_date FROM transactions WHERE user_id = ? ORDER BY transaction_date DESC, id DESC";
$stmt_transactions = mysqli_prepare($conn, $sql_transactions);
$transactions = [];
if ($stmt_transactions) {
    mysqli_stmt_bind_param($stmt_transactions, "i", $user_id);
    mysqli_stmt_execute($stmt_transactions);
    $result = mysqli_stmt_get_result($stmt_transactions);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $transactions[] = $row;
        }
    }

    mysqli_stmt_close($stmt_transactions);
}
mysqli_close($conn);
?>