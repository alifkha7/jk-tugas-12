<?php 

require_once("connection.php");
require_once("session_check.php");

if ($sessionStatus == false) {
    header("Location: index.php");
}

$error = 0;

if (isset($_GET["id"])) {
    $id_barang = $_GET["id"];
}
else {
    echo "Id barang tidak ditemukan ! <a href='index.php'>Kembali</a>";
}

$query = "SELECT * FROM barang WHERE id_barang = '{$id_barang}'";

$result = mysqli_query($mysqli, $query);

foreach ($result as $barang) {
    $foto = $barang["foto"];
    $id_barang = $barang["id_barang"];
    $name = $barang["nama_barang"];
    $price = $barang["harga_barang"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid">

            <a class="navbar-brand" href="#">

                <img src="jong_logo.png" alt="">

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Daftar Barang</a>
                    </li>
                </ul>
            </div>

        </div>

    </nav>

    <div id="form" class="pt-5">

        <div class="container">

            <div class="row d-flex justify-content-center">

                <div class="col col-8 p-4 bg-light">

                    <form action="action_edit.php" method="post" enctype="multipart/form-data">

                        <?php if (!is_null($foto) && !empty($foto)) : ?>
                        <div class="form-group mb-2">
                            <img src="<?=$foto?>" alt="" class="preview" />

                            <a href="hapus_foto.php?id=<?=$id_barang?>">Hapus Foto</a>
                        </div>
                        <?php endif; ?>

                        <div class="form-group mb-2">
                            <label for="foto">Foto Barang</label>
                            <input name="foto" id="foto" class="form-control" type="file">
                        </div>

                        <div class="form-group mb-2">
                            <label for="id_barang">Id Barang</label>
                            <input name="id_barang" id="id_barang" value="<?=$id_barang?>" class="form-control"
                                type="text" placeholder="Id Barang" readonly>
                        </div>

                        <div class="form-group mb-2">
                            <label for="name">Nama Barang</label>
                            <input name="name" id="name" value="<?=$name?>" class="form-control" type="text"
                                placeholder="Nama Barang" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="price">Harga Barang</label>
                            <input name="price" id="price" value="<?=$price?>" class="form-control" type="number"
                                placeholder="Harga Barang" required>
                        </div>

                        <input name="submit" type="submit" value="Kirim" class="btn btn-primary">

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>