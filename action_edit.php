<?php 

require_once("connection.php");

if (isset($_POST["id_barang"])) {
    $id_barang = $_POST["id_barang"];
} else {
    echo "Id Barang tidak ditemukan! <a href='index.php'>Kembali</a>";
    exit();
}

$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";

$result = mysqli_query($mysqli, $query);

foreach ($result as $barang) {
    $name = $barang["nama_barang"];
    $price = $barang["harga_barang"];
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['price'])) {
    $price = $_POST['price'];
}

$files = $_FILES['foto'];
$path = "storage/";

if (!empty($files['name'])) {
    $filepath = $path . $files["name"];
    $upload = move_uploaded_file($files["tmp_name"], $filepath);

    if ($upload) {
        unlink($foto);
    }
} else {
    $filepath = "";
    $upload = false;
}

if ($upload != true && $filepath != "") {
    exit("Gagal mengupload file <a href='form_edit.php?id={$id_barang}'>Kembali</a>");
}

$query = "
    UPDATE barang SET
    nama_barang = '{$name}', 
    harga_barang = '{$price}',
    foto = '{$filepath}'
    WHERE id_barang = '{$id_barang}'";

$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
    echo "Error dalam mengubah data. <a href='index.php'>Kembali</a>";
} else {
    header("Location: index.php");
}

?>