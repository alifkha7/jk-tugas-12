<?php 

$mysqli = new mysqli("localhost", "root", "", "toko");

if ($mysqli -> connect_errno) {
    echo "Gagal menyambungkan ke MySQL: " . $mysqli -> connect_error;
    exit();
}

?>