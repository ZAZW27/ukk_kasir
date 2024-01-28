<?php 

include '../../../config.php';

$id_user = $_POST['id_user'];
$nama_pegawai = $_POST['nama_pegawai'];
$username = $_POST['username'];
$bidang = $_POST['bidang'];

if ($_POST['password'] > 0) {
    $password = md5($_POST['password']);

    $updatePegawai = mysqli_query($con, "UPDATE user SET NamaUser = '$username', Nama = '$nama_pegawai', password = '$password', level = '$bidang' WHERE UserID = '$id_user'");

    if ($updatePegawai) {
        echo "<script>alert('Pegawai $username, BERHASIL diupdate');window.location='../index.php'</script>";
    }else{
        echo "<script>alert('Pegawai $username, GAGAL diupdate');window.location='../index.php'</script>";
    }
}
else {
    $updatePegawai = mysqli_query($con, "UPDATE user SET NamaUser = '$username', Nama = '$nama_pegawai', level = '$bidang' WHERE UserID = '$id_user'");

    if ($updatePegawai) {
        echo "<script>alert('Pegawai $username, BERHASIL diupdate');window.location='../index.php'</script>";
    }else{
        echo "<script>alert('Pegawai $username, GAGAL diupdate');window.location='../index.php'</script>";
    }
}


?>
