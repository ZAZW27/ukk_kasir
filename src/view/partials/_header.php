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
    <header class="relative z-10">
        <nav class="w-full h-[100vh] md:h-[3rem] fixed z-11 top-0 left-0 flex flex-col md:flex-row justify-between" style="pointer-events: none;">
            <div class="w-full md:h-[3rem] h-[3.2rem] bg-emerald-400 flex items-center justify-between md:justify-start px-4 text-white font-extrabold" id="title-nav" style="pointer-events: all;">
                <span>KasirKu</span>
                <div id="look-cart" class="block md:hidden justify-self-end text-end">Cart</div>
            </div>
            <div class="w-full md:w-[40vw] h-[3rem] bg-emerald-400 flex items-center" style="pointer-events: all;">
                <ul class="flex justify-evenly items-center w-full text-white text-md">
                    <li class="<?= $level == 'administrator' ? '' : 'hidden'?>">
                        <a href="#" class="px-3 py-2">
                            <span class="border-transparent px-1 border-b-2 hover:border-white hover:font-medium transition-all duration-300 ease-in-out">
                                Log
                            </span>
                        </a>
                    </li>
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
    