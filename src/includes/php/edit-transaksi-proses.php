<?php
session_start();
require_once dirname(__DIR__, 3) . '/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../login.php");
    exit();
}
if (empty($_POST['transaction_id']) || empty($_POST['type']) || empty($_POST['amount']) || empty($_POST['category'])) {
    $_SESSION['error_message'] = "Data tidak lengkap.";
    header("Location: ../../../edit-transaksi.php?id=" . $_POST['transaction_id']);
    exit();
}


$transaction_id = $_POST['transaction_id'];
$user_id = $_SESSION['user_id'];
$type = $_POST['type'];
$amount = $_POST['amount'];
$category = $_POST['category'];
$description = htmlspecialchars($_POST['description']);
$transaction_date = $_POST['transaction_date'];

$sql = "UPDATE transactions SET type = ?, amount = ?, category = ?, description = ?, transaction_date = ? WHERE id = ? AND user_id = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sdsssii", $type, $amount, $category, $description, $transaction_date, $transaction_id, $user_id);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../../dashboard.php?status=success&message=Transaksi berhasil diperbarui!");
        exit();
    } else {
        $_SESSION['error_message'] = "Gagal memperbarui transaksi: " . mysqli_stmt_error($stmt);
        header("Location: ../../../edit-transaksi.php?id=" . $transaction_id);
        exit();
    }
} else {
    $_SESSION['error_message'] = "Error dalam menyiapkan statement: " . mysqli_error($conn);
    header("Location: ../../../edit-transaksi.php?id=" . $transaction_id);
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

} else {
    header("Location: ../../../dashboard.php");
    exit();
}
?>

?>