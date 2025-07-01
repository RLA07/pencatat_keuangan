<?php
session_start();

require_once dirname(__DIR__, 3) . '/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_regenerate_id(true); 
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Email dan password wajib diisi.";
        header("Location: ../../../login.php");
exit();
}

$sql = "SELECT id, username, password FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {
// Pengguna ditemukan, sekarang verifikasi password
if (password_verify($password, $user['password'])) {
// Password cocok! Buat sesi untuk pengguna.
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];

// Redirect ke dashboard
header("Location: ../../../dashboard.php");
exit();
} else {
// Password salah
$_SESSION['error_message'] = "Email atau password salah.";
header("Location: ../../../login.php");
exit();
}
} else {
// Pengguna tidak ditemukan
$_SESSION['error_message'] = "Email atau password salah.";
header("Location: ../../../login.php");
exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

} else {
header("Location: ../../../login.php");
exit();
}
?>