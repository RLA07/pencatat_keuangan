<?php
session_start();
require_once dirname(__DIR__, 3) . '/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Semua field wajib diisi.";
        header("Location: ../../../register.php");
        exit();
    }

    // Hash password untuk keamanan. JANGAN PERNAH SIMPAN PASSWORD ASLI.
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username atau email sudah ada
    $sql_check = "SELECT id FROM users WHERE username = ? OR email = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "ss", $username, $email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $_SESSION['error_message'] = "Username atau email sudah terdaftar.";
        header("Location: ../../../register.php");
        exit();
    }
    mysqli_stmt_close($stmt_check);


    // Simpan pengguna baru
    $sql_insert = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "sss", $username, $email, $hashed_password);

    if (mysqli_stmt_execute($stmt_insert)) {
        // Jika berhasil, redirect ke halaman login dengan pesan sukses
        $_SESSION['success_message'] = "Registrasi berhasil! Silakan masuk.";
        header("Location: ../../../login.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Terjadi kesalahan. Silakan coba lagi.";
        header("Location: ../../../register.php");
        exit();
    }
    mysqli_stmt_close($stmt_insert);
    mysqli_close($conn);

} else {
    header("Location: ../../../register.php");
    exit();
}
?>