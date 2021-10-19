<?php 

require_once("connection.php");

$error = 0;

if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $error = 1;
}

if (isset($_POST['price'])) {
    $price = $_POST['price'];
} else {
    $error = 1;
}

if ($error == 1) {
    echo "Terjadi kesalahan pada proses input data";
    exit();
}

$files = $_FILES['foto'];
$path = "storage/";

if (!empty($files['name'])) {
    $filepath = $path . $files["name"];
    $upload = move_uploaded_file($files["tmp_name"], $filepath);
} else {
    $filepath = "";
    $upload = false;
}

if ($upload != true && $filepath != "") {
    exit("Gagal mengupload file <a href='form_barang.php'>Kembali</a>");
}

$query = "
    INSERT INTO barang (nama_barang, harga_barang, foto)
    VALUES ('{$name}', '{$price}', '{$filepath}');";

$insert = mysqli_query($mysqli, $query);

if ($insert == false) {
    echo "Error dalam menambahkan data. <a href='index.php'>Kembali</a>";
} else {
    header("Location: index.php");
}



?>