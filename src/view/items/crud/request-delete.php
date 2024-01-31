<?php 
include '../../../config.php';

$produk_id = $_GET['id'];

$req = mysqli_query($con, "INSERT INTO deleteprodukrequest (ProdukID) VALUES ('$produk_id')");

if ($req) {
    echo "<script>alert('barang berhasil direquest kepada admin untuk dihapus');window.location='../index.php'</script>";
}else {
    echo "<script>alert('barang GAGAL direquest kepada admin untuk dihapus');window.location='../index.php'</script>";
}

?>

