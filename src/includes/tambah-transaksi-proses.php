<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'db_connection.php';

    if (empty($_POST['type']) || empty($_POST['amount']) || empty($_POST['category']) || empty($_POST['transaction_date'])) {
        $_SESSION['error_message'] = "Semua field wajib diisi!" ;
        header("Location: ../../tambah-transaksi.php");
        exit();
    }
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $transaction_date = $_POST['transaction_date']; 
    $description = htmlspecialchars($_POST['description']);

    if (!isset($_SESSION['user_id'])) {
    die("Akses ditolak. Anda harus login terlebih dahulu.");
    }
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO transactions (user_id, type, amount, category, description, transaction_date) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql); 
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isdsss", $user_id, $type, $amount, $category, $description, $transaction_date);
    
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../../dashboard.php?status=success");
            exit();
        } else {
           $_SESSION['error_message'] = "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
            header("Location: ../../tambah-transaksi.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Error dalam menyiapkan statement: " . mysqli_error($conn);
        header("Location: ../../tambah-transaksi.php");
        exit();   
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Jika seseorang mencoba mengakses file ini secara langsung, tendang mereka.
    header("Location: index.php");
    exit();
}
?>