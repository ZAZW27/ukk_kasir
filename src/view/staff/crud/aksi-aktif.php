<?php 

include '../../../config.php';

$id_user = $_GET['id'];

$nonakstifkan = mysqli_query($con, "UPDATE user SET status = '1' WHERE UserID = '$id_user'");

if ($nonakstifkan) {
    echo "<script>alert('BERHASIL: Memasukkan pegawai');window.location='../index.php'</script>";
}else{
    echo "<script>alert('GAGAL: Memasukkan pegawai');window.location='../index.php'</script>";
}

?>