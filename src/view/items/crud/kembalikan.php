<?php 
include '../../../config.php';

$id = $_GET['id'];

$kembalikan = mysqli_query($con, "DELETE FROM deleteprodukrequest WHERE DPRID = '$id'");
if ($kembalikan) {
    echo "<script>alert('berhasil mengembalikan barang');window.history.go(-1);</script>";

}else {
    echo "<script>alert('GAGAL mengembalikan barang');window.history.go(-1);</script>";

}

?>
