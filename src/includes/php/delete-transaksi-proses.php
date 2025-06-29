<?php 
    session_start();
    require_once dirname(__DIR__, 3) . '/config.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../../login.php");
        exit();
    }
    if (!isset($_GET['id'])) {
        header("Location: ../../../dashboard.php?status=error&message=Transaksi tidak ditemukan.");
        exit();
    }

    $transaction_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $sql_check = "SELECT id FROM transactions WHERE id = ? AND user_id = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "ii", $transaction_id, $user_id);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) == 1) {
        mysqli_stmt_close($stmt_check);

        $sql_delete = "DELETE FROM transactions WHERE id = ?";
        $stmt_delete = mysqli_prepare($conn, $sql_delete);
        mysqli_stmt_bind_param($stmt_delete, "i", $transaction_id);
        
        if (mysqli_stmt_execute($stmt_delete)) {
            header("Location: ../../../dashboard.php?status=success&message=Transaksi berhasil dihapus.");
            exit();
        } else {
            header("Location: ../../../../dashboard.php?status=error&message=Terjadi kesalahan saat menghapus transaksi.");
            exit();
        }
        mysqli_stmt_close($stmt_delete);
    } else {
        mysqli_stmt_close($stmt_check);
        header("Location: ./../../../dashboard.php?status=error&message=Akses ditolak.");
        exit();
    }

    mysqli_close($conn);
?>