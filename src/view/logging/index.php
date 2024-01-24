<?php include '../partials/_header.php' ?>
<div class="flex justify-center items-start flex-wrap w-full relative top-[4rem] gap-4 px-2">
    <?php 
    $getPembelian = mysqli_query($con, "SELECT * FROM penjualan INNER JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID");
    while ($p = mysqli_fetch_array($getPembelian)) {
    ?>
        <section id="pembelian-container" class="w-full md:w-[22rem] flex flex-col bg-white p-2 shadow-lg shadow-slate-600/10 rounded-md">
            <div class="w-full flex justify-between items-center border-b-2 border-slate-700">
                <h1><?= $p['PenjualanID'] ?> | <?= $p['NamaPelanggan'] ?></h1>
                <h1>2024-01-23</h1>
            </div>
            <div id="pembelian" class="flex flex-col w-full border-b border-slate-800 pb-1">
                <?php 
                $id_jual = $p['PenjualanID'];

                $getDetail = mysqli_query($con, "SELECT * FROM detailpenjualan INNER JOIN produk ON produk.ProdukID = detailpenjualan.ProdukID WHERE PenjualanID = $id_jual");
                while ($detail = mysqli_fetch_array($getDetail)) {
                ?>
                <div class="flex justify-between items-start -my-1">
                    <p><?= $detail['NamaProduk'] ?> (<?= $detail['JumlahProduk'] ?>)</p>
                    <p>Rp.<?= $detail['SubTotal'] ?></p>
                </div>
                <?php  } ?>
            </div>
            <div class="flex justify-between items-start">
                <h1>Total:</h1>
                <h1>Rp.<span><?= $p['TotalHarga'] ?></span></h1>
            </div>
        </section>
    <?php } ?>
</div>
<?php include '../partials/_footer.php' ?>