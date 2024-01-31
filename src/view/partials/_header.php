<?php include '../../config.php';

session_start();

if ($_SESSION['nama'] == ''){
    header('location:../auth/login.php');
}

$name = $_SESSION['nama'];
$level = $_SESSION['level'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../public/logo/giant-logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../../public/logo/giant-logo.png" type="image/x-icon">

    <title>KasirKu</title>
    <link href="../../../public/output.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/><script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script><script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/l10n/de.umd.js"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css"/> -->
    <script src="../../jquery.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;800&display=swap">
</head>
<style>
    ::-webkit-scrollbar {
        width: 5px;
    }
    ::-webkit-scrollbar-track {
        background-color: #ececec79;
    }
    nav{
        font-family: Poppins;
        font-weight: 300;
    }
    nav span{
        text-shadow: 0.4px 0.4px 8px rgba(6, 122, 66, 0.4);
    }
</style>
<body class="bg-slate-200/80 pb-20 overflow-x-clip">
    <header class="relative z-[100]">
        <nav class="w-full h-[100vh] md:h-[3rem] fixed z-11 top-0 left-0 flex flex-col md:flex-row justify-between" style="pointer-events: none;">
            <div class="w-full md:h-[3rem] h-[3.2rem] bg-emerald-700 flex items-center justify-between md:justify-start px-4 md:px-24 text-white font-extrabold" id="title-nav" style="pointer-events: all;">
                <img class="w-28 mt-4" src="../../../public/logo/giant-logo.png" alt="">
                <!-- <div id="" class="block md:hidden justify-self-end text-end">Cart</div> -->
            </div>
            <div class="w-full md:w-[40vw] h-[3rem] bg-emerald-700 flex items-center" style="pointer-events: all;">
                <ul class="flex justify-center items-center w-full text-white text-md">
                    <li class="<?= $level == 'administrator' ? '' : 'hidden'?>">
                        <a href="../logging/index.php" class="px-3 py-2">
                            <span class="border-transparent px-1 border-b-2 hover:border-white hover:font-medium transition-all duration-300 ease-in-out">
                                Log
                            </span>
                        </a>
                    </li>
                    <li class="<?= $level == 'administrator' ? '' : 'hidden'?>">
                        <a href="../staff/index.php" class="px-3 py-2">
                            <span class="border-transparent px-1 border-b-2 hover:border-white hover:font-medium transition-all duration-300 ease-in-out">
                                Staff
                            </span>
                        </a>
                    </li>
                    <?php 
                    $news = mysqli_query($con, "SELECT count(accepted) as news FROM deleteprodukrequest WHERE accepted = '0'");
                    $num = mysqli_fetch_array($news)['news'];
                    if ($num > 0){
                    ?>
                    <li class="<?= $level == 'administrator' ? '' : 'hidden'?>">
                        <div id="notif" class="w-4 h-4 -ml-[0.5rem] -mt-1 absolute text-xs bg-red-500 rounded-full flex items-center justify-center text-white">
                            <?= $num ?>
                        </div>
                        <button class="btn" id="check-news">
                            <svg width="25px" height="25px" viewBox="0 -2.5 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>email [#651a1a]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -922.000000)" fill="#dbb700"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M294,774.474 L284,765.649 L284,777 L304,777 L304,765.649 L294,774.474 Z M294.001,771.812 L284,762.981 L284,762 L304,762 L304,762.981 L294.001,771.812 Z" id="email-[#651a1a]"> </path> </g> </g> </g> </g></svg>
                        </button>
                    </li>
                    <?php } ?>
                    <li class="<?= $level == 'kasir' ? '' : 'hidden'?>">
                        <a href="../main/index.php" class="px-3 py-2">
                            <span class="border-transparent px-1 border-b-2 hover:border-white hover:font-medium transition-all duration-300 ease-in-out">
                                Transaction
                            </span>
                        </a>
                    </li>
                    <li class="<?= $level == 'petugas' ? '' : 'hidden'?>">
                        <a href="../items/index.php" class="px-3 py-2">
                            <span class="border-transparent px-1 border-b-2 hover:border-white hover:font-medium transition-all duration-300 ease-in-out">
                                Items
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="../auth/crud/logout.php" class="px-3 py-2">
                            <span class="border-transparent px-1 border-b-2 hover:border-white hover:font-medium transition-all duration-300 ease-in-out">
                                Logout
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="news-model" class="col-span-1 px-4 flex flex-col items-center justify-center bg-slate-700/40 fixed z-[40] h-[100vh] w-[100vw] top-0 left-[100vw] transition-all duration-300 ease-in-out">
        <div class="md:sticky top-[4rem] px-4 py-4 h-[80vh] w-full md:w-[60rem] bg-white rounded-lg flex flex-col justify-start shadow-slate-500/20">
            <?php 
            $getReq = mysqli_query($con,    "SELECT * FROM deleteprodukrequest INNER JOIN produk WHERE deleteprodukrequest.ProdukID = produk.ProdukID AND accepted = '0'");

            while ($req = mysqli_fetch_array($getReq)){ 
            ?>
            <div class="flex justify-around items-center">
                <p><?= $req['DPRID'] ?></p>
                <p><?= $req['NamaProduk'] ?></p>
                <a href="../items/crud/delete-barang.php?id=<?=$req['DPRID']?>" onclick="return confirmDelete()">Delete</a>
                <a href="../items/crud/kembalikan.php?id=<?=$req['DPRID']?>">Kembalikan</a> 
            </div>
            <?php } ?>
        </div>
    </div>
    <script>
    function confirmDelete() {
            return confirm("Are you sure you want to delete this item?");
        }
    </script>
    <script>
        var chartBool = false
        $('#check-news').click(toggleCart)
        console.log(chartBool)
        function toggleCart(){
            chartBool = !chartBool
            console.log(chartBool)
            if (chartBool) {
                $('#news-model').removeClass('left-[100vw]').addClass('-left-12');
                setTimeout(() => {
                    $('#news-model').removeClass('-left-12').addClass('left-0');
                }, 200);
            }else{
                $('#news-model').addClass('left-[100vw]').removeClass('left-0');
            }

        }
    </script>