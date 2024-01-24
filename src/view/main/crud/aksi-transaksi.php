<?php 

include '../../../config.php';

// PRODUK ITEMS
$id_produk = $_POST['id_produk'];
$image = $_POST['image'];
$nama_produk = $_POST['nama_produk'];
$harga_asli = $_POST['harga_asli'];
$subtotal = $_POST['subtotal'];
$quantitas = $_POST['quantitas'];
$totalHarga = $_POST['total-items'];

// PELANGGAN
$nomor = $_POST['nomor_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat_pengguna'];

if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $transaction = mysqli_query($con, "INSERT INTO penjualan (TotalHarga, PelangganID) VALUES ('$totalHarga', '$id_user')");
    if ($transaction) {
        $getTransID = mysqli_query($con, "SELECT PenjualanID FROm penjualan ORDER BY TanggalPenjualan DESC LIMIT 1");
        $fetchTransId = mysqli_fetch_array($getTransID)['PenjualanID'];
        $r = 0;
        foreach ($id_produk as $i => $v) {
            $currJum = $quantitas[$r];
            $currSub = $subtotal[$r];
            $currProduk = $nama_produk[$r];

            $currProdukId = mysqli_query($con, "SELECT ProdukID FROM produk WHERE NamaProduk = '$currProduk' LIMIT 1");
            $id_produk = mysqli_fetch_array($currProdukId)['ProdukID'];

            $detailTran = mysqli_query($con, "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, SubTotal) 
            VALUES ('$fetchTransId', '$id_produk', '$currJum', '$currSub')");

            if ($detailTran) {
                $getStock = mysqli_query($con, "SELECT Stok FROM produk WHERE ProdukID = '$id_produk'");
                $fetchStock = mysqli_fetch_array($getStock)['Stok'];
                $subbedStock = $fetchStock - $currJum;

                $updateStock = mysqli_query($con, "UPDATE produk SET Stok = '$subbedStock' WHERE ProdukID = '$id_produk'");
            }else{echo "nga bisa detail transaksi :(";}

            $r ++;
        }
        echo "<script>alert('Transaksi berhasil dilakukan');window.history.go(-1)</script>";
    }else{echo 'nga bisa transaksi';}
}else {
    $createAcc = mysqli_query($con, "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES ('$nama_pelanggan', '$alamat', '$nomor')");
    if ($createAcc) {
        $getAcc = mysqli_query($con, "SELECT PelangganID FROM pelanggan ORDER BY PelangganID DESC LIMIT 1");
        if ($getAcc) {
            $id_user = mysqli_fetch_array($getAcc)['PelangganID'];
            $transaction = mysqli_query($con, "INSERT INTO penjualan (TotalHarga, PelangganID) VALUES ('$totalHarga', '$id_user')");
            if ($transaction) {
                $getTransID = mysqli_query($con, "SELECT PenjualanID FROm penjualan ORDER BY TanggalPenjualan DESC LIMIT 1");
                $fetchTransId = mysqli_fetch_array($getTransID)['PenjualanID'];
                $r = 0;
                foreach ($id_produk as $i => $v) {
                    $currJum = $quantitas[$r];
                    $currSub = $subtotal[$r];
                    $currProduk = $nama_produk[$r];

                    $currProdukId = mysqli_query($con, "SELECT ProdukID FROM produk WHERE NamaProduk = '$currProduk' LIMIT 1");
                    $id_produk = mysqli_fetch_array($currProdukId)['ProdukID'];

                    $detailTran = mysqli_query($con, "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, SubTotal) 
                    VALUES ('$fetchTransId', '$id_produk', '$currJum', '$currSub')");

                    if ($detailTran) {
                        $getStock = mysqli_query($con, "SELECT Stok FROM produk WHERE ProdukID = '$id_produk'");
                        $fetchStock = mysqli_fetch_array($getStock)['Stok'];
                        $subbedStock = $fetchStock - $currJum;

                        $updateStock = mysqli_query($con, "UPDATE produk SET Stok = '$subbedStock' WHERE ProdukID = '$id_produk'");
                    }else{echo "nga bisa detail transaksi :(";}

                    $r ++;
                }
                echo "<script>alert('Transaksi berhasil dilakukan');window.history.go(-1)</script>";
            }else{echo 'nga bisa transaksi';}
        }else{ echo 'nga bisa ambil akun';}
    }else{echo 'nga bisa buat akun';}
}

?>

