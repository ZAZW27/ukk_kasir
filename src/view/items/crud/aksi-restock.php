<?php 

include '../../../config.php';

$stok = $_POST['stok'];
$id = $_POST['id'];

$reprice = mysqli_query($con, "UPDATE produk SET Stok = '$stok' WHERE ProdukID = '$id'");

if ($reprice) {
    echo "<script>aleret('Harga barang berhasil diubah')</script>";
}


?>

