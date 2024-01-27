<?php include '../partials/_header.php' ?>
<button id="look-cart" class="btn block md:hidden fixed z-[100] top-[0.6rem] right-[0.5rem] bg-emerald-400 text-white font-semibold shadow-md shadow-green-400/20 px-3 rounded-md py-0.5">Cart</button>
<div class="relative z-1w-full top-[3.4rem] left-0 flex flex-col justify-center items-center px-2">
    <section id="search-bar" class="w-full top-[3.4rem] md:w-[90vw] m-6 bg-white rounded-xl shadow-xl shadow-slate-400/20 flex flex-wrap justify-between gap-4 font-bold px-2 md:px-12 py-4">
        <div class="flex w-full md:w-[30vw] justify-between items-center">
            <h1 class="text-emerald-700 text-2xl md:text-4xl btn">Transaks<span class="text-red-600">i</span></h1>
        </div>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex gap-2">
                <select id="pilih-jenis" name="" id="" class="focus:outline-none focus:ring-0 border-b-2 border-amber-400">
                    <option value="">All</option>
                    <?php 
                    $getJenis = mysqli_query($con, "SELECT JenisProduk FROM produk GROUP BY JenisProduk ORDER BY JenisProduk");
                    while($jenis = mysqli_fetch_array($getJenis)['JenisProduk']){
                    ?>
                    <option value="<?=$jenis?>"><?=$jenis?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="flex gap-4">
                <input type="text" placeholder="Cari item" id="search-item" class="border-b-2 border-amber-400 shadow-inner rounded-md focus:outline-none focus:ring-0 px-2 font-medium text-base">
            </div>
        </div>
    </section>
    <section id="main-content" class="w-full grid grid-cols-2 md:grid-cols-4 gap-4 relative z-1 md:px-4 pb-[3.4rem]">
        <div id="items-container" class="col-span-3 grid grid-cols-2 md:grid-cols-6 gap-4 p-4 bg-white rounded-md shadow-xl shadow-slate-500/10">
            <?php 
            $items = mysqli_query($con, "SELECT * FROM produk");
            while ($item = mysqli_fetch_array($items)) {?>
                <div id="item-shop" 
                    namaProduk="<?=$item['NamaProduk']?>" 
                    idProduk="<?=$item['ProdukID']?>" 
                    harga="<?=$item['Harga']?>"
                    image="<?=$item['image']?>"
                    class="h-44  bg-slate-100 shadow-lg rounded-lg overflow-clip shadow-slate-600/10 bg-contain bg-no-repeat bg-center hover:scale-105 transition-all duration-300 ease-in-out" 
                    style="background-image: url('../../../public/img/<?=$item['image']?>');">
                    <div id="item-add" class="w-full h-full bg-transparent  hover:bg-teal-950/60 flex flex-col justify-center items-center text-transparent hover:text-white font-bold text-xl transition-all duration-300 ease-in-out">
                        <span class="-mt-3 font-light"><?=$item['NamaProduk']?></span>
                        <span style="pointer-events: none;">ADD</span>
                        <span class="font-thin -mt-2"><?= $item['Stok'] ?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
        <script>
            $('#pilih-jenis').on('change', function(){
                var jenis = $(this).val();
                console.log(jenis);
                $.ajax({
                    type: 'POST',
                    dataType: "html",
                    url: "crud/search-jenis.php", 
                    data: {value: jenis}, 
                    success: function(msg){
                        $('#items-container').html(msg)
                    }
                })
            });
            $('#search-item').on('input', function(){
                var searchValue = $(this).val();
                $.ajax({
                    type: 'POST',
                    dataType: "html",
                    url: "crud/search-items.php",
                    data: {value: searchValue}, 
                    success: function(msg){
                        $('#items-container').html(msg)
                    }
                })
            });
        </script>
        <script>
        </script>
        <div id="cart-modal" class="col-span-1 px-4 md:px-0 flex flex-col items-center justify-center md:block bg-slate-700/40 md:bg-transparent fixed md:relative h-[100vh] w-[100vw] md:w-auto top-[0] md:top-0 left-[100vw] md:left-0 md:h-full transition-all duration-300 ease-in-out">
            <form method="POST" action="crud/aksi-transaksi.php" class="md:sticky top-[4rem] px-4 py-4 h-[80vh] w-full bg-white rounded-lg flex flex-col justify-between shadow-slate-500/20">
                <button type="button" id="hide-cart" class="bg-red-500 btn rounded-md shadow-md block md:hidden shadow-red-500/30 px-2.5 py-1 absolute text-white font-bold">X</button>
                <div class="h-[70vh] w-full overflow-y-auto flex flex-col justify-start items-center ">
                    <div class="flex flex-col w-full justify-center items-center">
                        <svg class="relative z-8 mr-2 opacity-30" width="4rem" height="4rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.2998 5H22L20 12H8.37675M21 16H9L7 3H4M4 8H2M5 11H2M6 14H2M10 20C10 20.5523 9.55228 21 9 21C8.44772 21 8 20.5523 8 20C8 19.4477 8.44772 19 9 19C9.55228 19 10 19.4477 10 20ZM21 20C21 20.5523 20.5523 21 20 21C19.4477 21 19 20.5523 19 20C19 19.4477 19.4477 19 20 19C20.5523 19 21 19.4477 21 20Z" 
                        stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <h1 class="relative z-9 -mt-[3rem] font-bold text-emerald-700 text-xl mb-1 border-b-[0.2rem] rounded-md border-amber-400">Item <span class="text-red-600">Cart</span></h1>
                    </div>
                    <div id="items-section" class="flex flex-col w-full h-full mt-3 bg-white relative z-9">
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
                    <div id="total-harga">Total:<span id="total-items">-</span><input type="text" name="total-items" id="total-items-input" hidden></div>
                    <button id="next-trans" type="button" class="bg-sky-400 font-semibold rounded-md px-4 py-1 text-white shadow-md shadow-slate-500/10">Next</button>
                </div>
                <div id="pelanggan-modal" class="fixed top-[3.2rem] md:top-0 left-0 w-full h-full bg-slate-800/30 pointer-events-none flex opacity-0 transition-all duration-300 ease-linear justify-center items-start md:items-center px-4 py-2 md:py-0 ">
                    <div id="pelanggan-form" class="w-full md:w-[40vw] bg-white scale-0 transition-all duration-200 ease-in-out px-1 md:px-4 py-2 flex flex-col justify-center items-center rounded-lg">
                        <div class="">
                            <svg class="absolute z-8 -ml-[0.1rem] opacity-40" width="4rem" height="4rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 7.063C16.5 10.258 14.57 13 12 13c-2.572 0-4.5-2.742-4.5-5.938C7.5 3.868 9.16 2 12 2s4.5 1.867 4.5 5.063zM4.102 20.142C4.487 20.6 6.145 22 12 22c5.855 0 7.512-1.4 7.898-1.857a.416.416 0 0 0 .09-.317C19.9 18.944 19.106 15 12 15s-7.9 3.944-7.989 4.826a.416.416 0 0 0 .091.317z" 
                            fill="#dc2626"></path></g></svg>
                            <h1 class="text-2xl relative z-9 text-emerald-700 font-bold mt-[1.8rem] border-b-[0.3rem] rounded-md border-amber-400">Pelanggan</h1>
                        </div>
                        <div class="my-2 flex flex-col w-9/12">
                            <label for="">Nomor pelanggan</label>
                            <input required id="nomor-pelanggan" type="number" name="nomor_pelanggan" placeholder="+62 000-000-000" class="w-[12rem] bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
                        </div>
                        <div id="pelanggan-info" class="flex flex-col w-full items-center justify-center">
                            <div id="nama-pelanggan" class="my-2 flex flex-col w-9/12">
                                <label for="">Nama Pelanggan</label>
                                <input required type="text" name="nama_pelanggan" placeholder="Pelanggan baru, masukkan nama" class=" bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
                            </div>
                            <div id="nama-pelanggan" class="my-2 flex flex-col w-9/12">
                                <label for="">Alamat Pelanggan</label>
                                <input required type="text" name="alamat_pengguna" placeholder="JL Soekarno Hatta" class=" bg-transparent border-b-2 border-slate-800 focus:outline-none px-2">
                            </div>
                            <div class="flex items-center justify-start w-full flex-wrap px-2 md:px-12 leading-4">
                                Diskon Member: <div id="harga-asli-cart" class="text-slate-500 line-through text-xs">Rp. 7.000.000</div><div id="harga-diskon" class="text-red-500 font-semibold">Rp. 5.000.000</div>
                            </div>
                        </div>
                        <div class="flex justify-between md:justify-around w-full m-4">
                            <!-- <button class="bg-red-500 font-bold text-xl text-white px-4 rounded-md self-start">Back</button> -->
                            <button id="back-trans" type="button" class="bg-red-500 font-semibold rounded-md px-4 py-1 text-white shadow-md shadow-slate-500/10">Back</button>
                            <button type="submit" class="bg-green-400 font-semibold rounded-md px-4 py-1 text-white shadow-md shadow-slate-500/10">Registre</button>
                        </div>
                    </div>
                </div>
                <script>
                    var pelangganToggle = false
                    $('#next-trans').on('click', function () {
                        pelangganToggle = !pelangganToggle
                        togglePelanggan()
                    })
                    $('#back-trans').on('click', function () {
                        pelangganToggle = !pelangganToggle
                        togglePelanggan()
                    })
                    function togglePelanggan(){
                        if (pelangganToggle) {
                            $('#pelanggan-modal').addClass('opacity-100').removeClass('opacity-0').
                            removeClass('pointer-events-none').addClass('pointer-events-auto')
                            
                            $('#pelanggan-form').removeClass('scale-0').addClass('scale-110');
                            setTimeout(() => {
                                $('#pelanggan-form').removeClass('scale-110').addClass('scale-100');
                            }, 175);
                        }else{
                            $('#pelanggan-form').addClass('scale-0').removeClass('scale-100')

                            setTimeout(() => {
                                $('#pelanggan-modal').removeClass('opacity-100').addClass('opacity-0').
                                addClass('pointer-events-none').removeClass('pointer-events-auto')
                            }, 100);
                        }
                    }
                    $('#nomor-pelanggan').on('input', function(){
                        var nomorPelanggan = $(this).val();
                        // Check if the length is greater than 9
                        if (nomorPelanggan.length > 10) {
                            $.ajax({
                                type: 'POST',
                                dataType: "html",
                                url: "crud/get-pelanggan.php",
                                data: {nomor: nomorPelanggan}, 
                                success: function(msg){
                                    $('#pelanggan-info').html(msg)
                                }
                            })
                        }
                    })
                </script>
            </form>
        </div>
    </section>
</div>
<script src="main.js"></script>
<?php include '../partials/_footer.php' ?>
