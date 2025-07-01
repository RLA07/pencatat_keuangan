<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])) {
    header("Location: dashboard.php?status=error&message=ID tidak ditemukan.");
    exit();
}

$transaction_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM transactions WHERE id = ? AND user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $transaction_id, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$transaction = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$transaction) {
    header("Location: dashboard.php?status=error&message=Transaksi tidak ditemukan.");
    exit(); 
}

?>