<?php 

include '../../../config.php';

$searchJenis = $_POST['value'];

$items = mysqli_query($con, "SELECT * FROM produk WHERE JenisProduk LIKE '%$searchJenis%' AND Stok >= 0");

if (mysqli_num_rows($items) > 0) {
    
    while ($item = mysqli_fetch_array($items)) {

        if ($item['Stok'] > 0){
            ?>
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
                        <div class=" leading-5 flex flex-col justify-center items-center">
                            <span class="font-thin"><?= $item['Stok'] ?></span>
                            <span class="font-normal text-base">Rp.<?= number_format($item['Harga'], 2, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
            <?php } else{ ?>
                <div id="" 
                    namaProduk="<?=$item['NamaProduk']?>" 
                    idProduk="<?=$item['ProdukID']?>" 
                    harga="<?=$item['Harga']?>"
                    image="<?=$item['image']?>"
                    class="h-44  bg-slate-100 shadow-lg rounded-lg overflow-clip shadow-slate-600/10 bg-contain bg-no-repeat bg-center transition-all duration-300 ease-in-out" 
                    style="background-image: url('../../../public/img/<?=$item['image']?>');">
                    <div id="item-add" class="w-full h-full bg-slate-200/70 flex flex-col justify-center items-center font-bold text-xl transition-all duration-300 ease-in-out">
                        <span class="text-red-500 -mt-6 opacity-60"><?=$item['NamaProduk']?></span>
                        <span style="pointer-events: none;" class="border-4  border-red-600 text-center text-red-500 -rotate-[24deg]">OUT OF STOCKS</span>
                    </div>
                </div>
            <?php 
        }
    }
} ?>