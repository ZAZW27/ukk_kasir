<?php 
include '../../../config.php';

$nomor = $_POST['nomor'];

$getPelanggan = mysqli_query($con, "SELECT * FROM pelanggan WHERE NomorTelepon = '$nomor'");

if (mysqli_num_rows($getPelanggan) > 0) {
    $fetch = mysqli_fetch_array($getPelanggan);
?>
    <div id="nama-pelanggan" class="my-2 flex flex-col w-9/12">
        <label for="">Nama Pelanggan</label>
        <input type="text" name="id_user" value="<?=$fetch['PelangganID']?>" hidden>
        <input value="<?=$fetch['NamaPelanggan']?>" type="text" name="nama_pelanggan" placeholder="Member" class=" bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
    </div>
    <div id="alamat-pelanggan" class="my-2 flex flex-col w-9/12">
        <label for="">Alamat Pelanggan</label>
        <input type="text" value="<?=$fetch['Alamat']?>" name="alamat_pengguna" placeholder="JL Soekarno Hatta" class=" bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
    </div>
<?php }else{ ?>
    <div id="nama-pelanggan" class="my-2 flex flex-col w-9/12">
        <label for="">Nama Pelanggan baru</label>
        <input type="text" name="nama_pelanggan" placeholder="Masukkan nama pelanggan baru" class=" bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
    </div>
    <div id="alamat-pelanggan" class="my-2 flex flex-col w-9/12">
        <label for="">Alamat Pelanggan</label>
        <input type="text" value="" name="alamat_pengguna" placeholder="JL Soekarno Hatta" class=" bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
    </div>
<?php } ?>


