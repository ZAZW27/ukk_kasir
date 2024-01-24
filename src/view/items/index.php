<?php include '../partials/_header.php' ?>
<section id="main-content" class="w-full relative top-[3.4rem] z-1 md:px-4 pb-[3.4rem] flex flex-col justify-center items-center">
    <h1 class="text-2xl font-bold text-center relative top-[5rem]">GUDANG <button id="tambah" class=" bg-green-400 px-4 py-0.5 text-sm text-center text-white">Tambah <span>+</span></button></h1>
    <div class="mt-20 w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 py-4">
        <?php 
        $getItem = mysqli_query($con, "SELECT * FROM produk");
        while ($i = mysqli_fetch_array($getItem)) {
        
        ?>
        <section id="barang" class="col-span-1 ">
            <div class="flex justify-between items-center w-full px-2 md:px-1 lg:px-4 py-2 border-b-4 bg-white rounded-lg shadow-lg shadow-slate-500/10 border-slate-300">
                <div class="w-32 h-32 md:w-24 md:h-24 lg:w-[8vw] lg:h-[8vw] bg-center bg-slate-100 rounded-xl bg-contain bg-no-repeat" style="background-image: url('../../../public/img/<?=$i['image']?>');"></div>
                <div id="information" class="flex flex-col justify-between items-end py-1">
                    <div id="info" class="flex flex-col justify-between items-end">
                        <h1 class="text-lg font-semibold text-end"><?= $i['NamaProduk'] ?></h1>
                        <div class="flex justify-center items-center">
                            <span>Rp</span>
                            <input id="harga-barang" type="text" value="<?=$i['Harga']?>" class="bg-transparent w-[4.4rem] text-end border-b-2 border-slate-500 focus:outline-none ">
                        </div>
                        <button id="reprice" type="button" idBarang="<?=$i['ProdukID']?>" class="bg-green-400 font-semibold rounded-md px-1 mt-1 text-sm text-white shadow-md shadow-slate-500/10">Reprice</button>
                    </div>
                    <div id="action" class="flex flex-col justify-between items-end h-12 mt-1">
                        <section>
                            <button type="button" id="sub-quantity" class="border-2 border-red-600 w-6 h-6 text-center rounded-md">-</button>
                            <input name="quantitas[]" value="<?=$i['Stok']?>" id="item-quantity" class="border border-slate-800 rounded-md w-8 bg-transparent text-center font-medium" type="text" >
                            <button type="button" id="add-quantity" class="border-2 border-green-600 w-6 h-6 text-center rounded-md">+</button>
                        </section>
                        <section id="action">
                            <button id="restock" idBarang="<?=$i['ProdukID']?>" type="button" class="bg-green-400 text-sm font-semibold rounded-md px-4 my-0.5 py-0.5 text-white shadow-md shadow-slate-500/10">Restock</button>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
    </div>
</section>
<section id="modal" class="bg-slate-900/20 fixed top-0 left-0 w-[100vw] h-[100vh] flex hidden flex-col justify-center items-center">
    <div class="bg-white p-4 w-full md:w-[40rem] mx-2 flex flex-col justify-center items-center">
        <h1 class="text-2xl font-bold text-emerald-400 mb-2">Tambah Produk</h1>
        <form action="crud/aksi-tambah.php" enctype="multipart/form-data" method="POST" class="flex flex-col items-center justify-center w-full">
            <div id="inputForm" class="flex flex-col w-11/12">
                <label for="">Nama Barang</label>
                <input type="text" name="nama" class=" bg-transparent border-b-2 border-slate-700 focus:outline-none px-2">
            </div>
            <div id="inputForm" class="flex flex-col w-11/12">
                <label for="">Harga Barang</label>
                <input type="text" name="harga" class=" bg-transparent border-b-2 border-slate-700 focus:outline-none px-2">
            </div>
            <div id="inputForm" class="flex flex-col w-11/12">
                <label for="">Stock Barang</label>
                <input type="text" name="stok" class=" bg-transparent border-b-2 border-slate-700 focus:outline-none px-2">
            </div>
            <div id="inputForm" class="flex flex-col w-11/12">
                <label for="">Gambar Barang</label>
                <input type="file" name="gambar" class=" bg-transparent border-b-2 border-slate-700 focus:outline-none px-2">
            </div>
            <div class="flex w-full justify-around items-center mt-3">
                <button id="back" type="button" class="bg-red-400 font-semibold rounded-md px-4 py-1 text-white shadow-md shadow-slate-500/10">Back</button>
                <button type="submit" class="bg-green-400 font-semibold rounded-md px-4 py-1 text-white shadow-md shadow-slate-500/10">Submit</button>
            </div>
        </form>
    </div>
</section>
<script>
    var tambahBool = false
    $('#back').on('click', tambahModalToggle)
    $('#tambah').on('click', tambahModalToggle)

    function tambahModalToggle(){
        tambahBool = !tambahBool
        if (tambahBool) {
            $('#modal').removeClass('hidden')
        }else{
            $('#modal').addClass('hidden')
        }
    }

    $(document).off('click', '#reprice').on('click', '#reprice', function() {
        var hargaBarang = $(this).parent().find('#harga-barang').val();
        var idBarang = $(this).attr('idBarang');

        $.ajax({
            type: 'POST',
            dataType: "html",
            url: "crud/aksi-reprice.php",
            data: {id: idBarang, harga: hargaBarang}, 
            success: function(msg){
                alert('Harga barang berhasil diubah');
            }
        })
    });

    $(document).off('click', '#restock').on('click', '#restock', function(){
        var stok = $(this).parent().parent().find('#item-quantity').val();
        var idBarang = $(this).attr('idBarang');

        $.ajax({
            type: 'POST',
            dataType: "html",
            url: "crud/aksi-restock.php",
            data: {id: idBarang, stok: stok}, 
            success: function(msg){
                alert('Stok barang berhasil diubah');
            }
        })
    })

</script>
<script src="crud/main.js"></script>
<?php include '../partials/_footer.php' ?>
