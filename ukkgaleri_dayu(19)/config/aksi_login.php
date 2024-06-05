<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

// Execute SQL query
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

// Check for query execution errors
if (!$sql) {
    die("Query failed: " . mysqli_error($koneksi));
}

// Check if any rows are returned
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    $data = mysqli_fetch_array($sql);
    $_SESSION['username'] = $data['username'];
    $_SESSION['userid'] = $data['userid'];
    $_SESSION['status'] = 'login';
    echo "<script>
    alert('Login berhasil');
    location.href='../admin/index.php';
    </script>";
} else {
    echo "<script>
    alert('Username atau password salah, coba lagi!');
    location.href='../login.php';
    </script>";
}
?>
