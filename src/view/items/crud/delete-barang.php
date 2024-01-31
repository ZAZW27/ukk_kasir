<?php 
include '../../../config.php';

$id = $_GET['id'];

$accepted = mysqli_query($con, "UPDATE deleteprodukrequest SET accepted = '1' WHERE DPRID = '$id'");

if ($accepted) {
    echo "<script>alert('berhasil menghapus barang');window.history.go(-1);</script>";

}else {
    // echo "<script>alert('GAGAL menghapus barang');window.history.go(-1);</script>";

}
?>
