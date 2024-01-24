<?php 

include '../../../config.php';

$harga = $_POST['harga'];
$id = $_POST['id'];

$reprice = mysqli_query($con, "UPDATE produk SET Harga = '$harga' WHERE ProdukID = '$id'");

if ($reprice) {
    echo "<script>aleret('Harga barang berhasil diubah')</script>";
}


?>

