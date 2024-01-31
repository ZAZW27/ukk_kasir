<?php 
include '../../../config.php';

$targetDirectory = '../../../../public/img/';
$gambar = $_FILES['gambar']['name'];
$targetFile = $targetDirectory . $gambar;

if (isset($_FILES['gambar'])) {
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $jenis = $_POST['jenis'];
        
        $tambahProduk = mysqli_query($con, "INSERT INTO produk (NamaProduk, Harga, Stok, image, JenisProduk) VALUES ('$nama', '$harga', '$stok', '$gambar', '$jenis')");

        if ($tambahProduk) {
            echo "<script>alert('Berhasil menambah produk');window.location='../index.php'</script>";
        } else {
            echo "<script>alert('Gagal menambah produk');window.location='../index.php'</script>";
        }
    } else {
        echo "Failed to move the uploaded file.";
    }
} else {
    echo 'Gambar tidak di-set.';
}
?>
