<?php 

$con - mysqli_connect('localhost', 'root', '', 'ukk_kasir');

if (!$con) {
    die("Tidak dapat terhubung ke db").mysqli_connect_errno();
}

?>