<?php 

include '../../../config.php';

$searchVal = $_POST['value'];

$items = mysqli_query($con, "SELECT * FROM produk WHERE NamaProduk LIKE '%".$searchVal."%'");

if (mysqli_num_rows($items) > 0) {
    
while ($item = mysqli_fetch_array($items)) {?>
<div id="item-shop" 
    namaProduk="<?=$item['NamaProduk']?>" 
    idProduk="<?=$item['ProdukID']?>" 
    harga="<?=$item['Harga']?>"
    image="<?=$item['image']?>"
    class="h-44 bg-slate-100 shadow-lg rounded-lg overflow-clip shadow-slate-600/10 bg-contain bg-no-repeat bg-center hover:scale-105 transition-all duration-300 ease-in-out" 
    style="background-image: url('../../../public/img/<?=$item['image']?>');">
    <div id="item-add" class="w-full h-full bg-transparent hover:bg-slate-800/30 flex justify-center items-center text-transparent hover:text-white font-bold text-xl transition-all duration-300 ease-in-out">
        <span style="pointer-events: none;">ADD</span>
    </div>
</div>
<?php }
} ?>