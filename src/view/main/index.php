<?php include '../partials/_header.php' ?>
<section id="main-content" class="w-full grid grid-cols-2 md:grid-cols-4 gap-4 relative top-[3.4rem] z-1 md:px-4 pb-[3.4rem]">
    <div class="col-span-3 h-600 grid grid-cols-2 md:grid-cols-4 gap-4 p-4">
        <?php 
        $items = mysqli_query($con, "SELECT * FROM produk");
        while ($item = mysqli_fetch_array($items)) {?>
            <div id="item-shop" 
                namaProduk="<?=$item['NamaProduk']?>" 
                idProduk="<?=$item['ProdukID']?>" 
                harga="<?=$item['Harga']?>"
                image="<?=$item['image']?>"

                class="h-44 bg-slate-200 shadow-md rounded-lg overflow-clip shadow-slate-700/10 bg-contain bg-no-repeat bg-center hover:scale-105 transition-all duration-50 ease-linear" 
                style="background-image: url('../../../public/img/<?=$item['image']?>');">
                <div id="item-add" class="w-full h-full bg-transparent hover:bg-slate-800/30 flex justify-center items-center text-transparent hover:text-white font-bold text-xl transition-all duration-300 ease-in-out">
                    <span style="pointer-events: none;">ADD</span>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="cart-modal" class="col-span-1 px-4 md:px-0 flex items-center justify-center md:block bg-slate-700/40 md:bg-transparent fixed md:relative h-[100vh] w-[100vw] md:w-auto top-[0] md:top-0 left-[100vw] md:left-0 md:h-full transition-all duration-300 ease-in-out">
        <form method="POST" action="crud/aksi-transaksi.php" class="md:sticky top-[4rem] p-4 h-[80vh] w-full bg-slate-100 rounded-lg flex flex-col justify-between shadow-slate-500/20">
            <div class="h-[70vh] w-full overflow-y-auto flex flex-col justify-start items-center ">
                <h1 class="font-bold text-teal-500 text-xl mb-2">Item Cart</h1>
                <div id="items-section" class="flex flex-col w-full h-full">
                    <!-- <section id="item" class="item">
                        <div class="w-full flex justify-between my-2">
                            <div id="menu-cart">
                            <div class="w-[4.5rem] h-[4.5rem] bg-contain bg-center flex justify-start items-start overflow-clip bg-slate-200 rounded-md" style="background-image: url('../../../public/img/beras.png')">
                                    <button type="button" id="delete-item" class="w-5 h-5 bg-red-500 text-white font-bold text-center text-xs">x</button>
                                </div>
                                <input type="text" value="${id}" name="id_produk[]" hidden>
                                <input type="text" value="${image}" name="image[]" hidden>
                                <h1 class="nama_barang" name="nama_produk[]">beras lele</h1>
                            </div>
                            <div id="actions" class="flex flex-col items-end justify-between pr-2">
                                <div id="subtotal-harga" class="flex flex-col items-end justify-start">
                                    <span id="total-kali" class="total-kali" name="subtotal" name="subtotal[]">Rp 12.000</span>
                                    <span id="harga-asli" class="text-[0.7rem] text-slate-500" name="harga_asli[]">Rp 12.000</span>
                                </div>
                                <div id="subtiture-btn" class="flex gap-2 font-bold items-center">
                                    <button type="button" id="sub-quantity" class="border-2 border-red-600 w-6 h-6 text-center rounded-md">-</button>
                                    <input name="quantitas[]" value="1" id="item-quantity" class="border border-slate-800 rounded-md w-8 bg-transparent text-center font-medium" type="text" >
                                    <button type="button" id="add-quantity" class="border-2 border-green-600 w-6 h-6 text-center rounded-md">+</button>
                                </div>
                            </div>
                        </div>
                        <hr class="border border-slate-400 my-2">
                    </section> -->
                </div>
            </div>
            <div id="action-btn" class="w-full  flex justify-between items-center font-semibold">
                <div id="total-harga">Total:<span id="total-items">-</span></div>
                <button type="submit" class="bg-green-400 font-semibold rounded-md px-4 py-1 text-white shadow-md shadow-slate-500/10">Deliver</button>
            </div>
            <div class="fixed top-[3.2rem] md:top-0 left-0 w-full h-full bg-slate-800/30 pointer-events-none flex justify-center items-start md:items-center px-4 py-2 md:py-0 ">
                <div class="pointer-events-auto w-full md:w-[40vw] bg-slate-100 px-4 py-2 flex flex-col justify-center items-center rounded-lg">
                    <h1 class="text-2xl text-emerald-400 font-bold">Pelanggan</h1>
                    <div class="my-2 flex flex-col w-9/12">
                        <label for="">Nomor pelanggan</label>
                        <input id="nomor-pelanggan" type="number" name="nomor_pelanggan" placeholder="+62 000-000-000" class="w-[12rem] bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
                    </div>
                    <script>
                        $('#nomor-pelanggan').on('change', function(){
                            var nomorPelanggan = $(this).val();
                            // Check if the length is greater than 9
                            if (nomorPelanggan.length > 9) {

                            }
                        })
                    </script>
                    <div id="nama-pelanggan" class="my-2 flex flex-col w-9/12">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" name="nomor_pelanggan" placeholder="Pelanggan baru, masukkan nama" class=" bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="main.js"></script>
<?php include '../partials/_footer.php' ?>
