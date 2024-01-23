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
                    ADD
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="cart-modal" class="col-span-1 px-4 md:px-0 flex items-center justify-center md:block bg-slate-700/40 md:bg-transparent fixed md:relative h-[100vh] w-[100vw] md:w-auto top-[0] md:top-0 left-[100vw] md:left-0 md:h-full transition-all duration-300 ease-in-out">
        <div class="md:sticky top-[4rem] p-4 h-[80vh] w-full bg-slate-100 rounded-lg flex flex-col justify-between shadow-slate-500/20">
            <div class="h-[70vh] w-full overflow-y-auto flex flex-col justify-start items-center ">
                <h1 class="font-bold text-teal-500 text-xl mb-2">Item Cart</h1>
                <div id="items-section" class="flex flex-col w-full h-full">
                    <!-- <section id="item">
                        <div class="w-full flex justify-between my-2">
                            <div id="menu-cart">
                                <div class="w-[4.5rem] h-[4.5rem] bg-contain bg-center bg-slate-200 rounded-md" style="background-image: url('../../../public/img/beras.png')"></div>
                                <h1>Nasi Goreng</h1>
                            </div>
                            <div id="actions" class="flex flex-col items-end justify-between pr-2">
                                <div id="subtotal-harga" class="flex flex-col items-end justify-start">
                                    <span name="subtotal">Rp 12.000</span>
                                    <span id="harga-asli" class="text-[0.7rem] text-slate-500">Rp 12.000</span>
                                </div>
                                <div id="subtiture-btn" class="flex gap-2 font-bold items-center">
                                    <button class="border-2 border-red-600 w-6 h-6 text-center rounded-md">-</button>
                                    <input value="2" class="border border-slate-800 rounded-md w-8 bg-transparent text-center font-medium" type="text" >
                                    <button class="border-2 border-green-600 w-6 h-6 text-center rounded-md">+</button>
                                </div>
                            </div>
                        </div>
                        <hr class="border border-slate-400 my-2">
                    </section> -->
                </div>
            </div>
            <div id="action-btn" class="w-full  flex justify-between items-center font-semibold">
                <div id="total-harga">Total:Rp <span>12.000</span></div>
                <button type="button" class="bg-green-400 font-semibold rounded-md px-4 py-1 text-white shadow-md shadow-slate-500/10">Deliver</button>
            </div>
        </div>
    </div>
</section>
<script src="main.js"></script>
<?php include '../partials/_footer.php' ?>
