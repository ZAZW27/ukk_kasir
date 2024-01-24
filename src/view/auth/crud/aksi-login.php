<?php

session_start();
include '../../../config.php';

$username = $_POST['name'];
$password = md5($_POST['password']);

// Perform database query
$cek = mysqli_query($con, "SELECT * FROM user WHERE NamaUser = '$username' AND password = '$password'");

if (mysqli_num_rows($cek) > 0) {
    $level = mysqli_fetch_array($cek)['Level'];

    $_SESSION['nama'] = $username;
    $_SESSION['level'] = $level;
    
    if ($level == 'kasir') {
        echo "<script>alert('LOGIN BERHASIL SELAMAT DATANG KEDALAM KASIR'); window.location.href='../../main/index.php';</script>";

        echo 'helo?';
    }elseif ($level == 'petugas') {
        echo "<script>alert('LOGIN BERHASIL SELAMAT DATANG KEDALAM GUDANG'); window.location.href='../../items/index.php';</script>";
    }else{
        echo "<script>alert('LOGIN BERHASIL SELAMAT DATANG KEDALAM LOGGING'); window.location.href='../../logging/index.php';</script>";
    }
    echo $level. ' '. $username;
} else {
    // Login failed
    echo "<script>alert('Invalid username or password'); window.history.go(-1);</script>";
}
?>