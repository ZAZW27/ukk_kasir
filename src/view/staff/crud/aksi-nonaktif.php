<?php 

include '../../../config.php';

$id_user = $_GET['id'];

$nonakstifkan = mysqli_query($con, "UPDATE user SET status = '0' WHERE UserID = '$id_user'");

if ($nonakstifkan) {
    echo "<script>alert('BERHASIL: Pegawai dikeluarkan');window.location='../index.php'</script>";
}else{
    echo "<script>alert('GAGAL: Pegawai dikeluarkan');window.location='../index.php'</script>";
}

?>