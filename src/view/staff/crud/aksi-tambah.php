<?php 

include '../../../config.php';

$username = $_POST['username'];
$bidang = $_POST['bidang'];
$password = md5($_POST['password']);
$namaPegawai = $_POST['nama-pegawai'];

$insert = mysqli_query($con, "INSERT INTO user (NamaUser, Level, password, Nama, status)
VALUE ('$username', '$bidang', '$password', '$namaPegawai', '1')");

if ($insert) {
    echo "<script>alert('Berhasil memasukkan pegawai baru: $username');window.location='../index.php';</script>";
}else {
    echo "<script>alert('GAGAL memasukkan pegawai baru: $username');window.location='../index.php';</script>";
}

?>