<?php 

require_once("connection.php");
require_once("session_check.php");

$query = "SELECT * FROM barang";

$result = mysqli_query($mysqli, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 12</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">

    <script type="text/javascript">
    function confirm_delete() {
        return confirm("Anda yakin ?");
    }
    </script>
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
                    <?php if ($sessionStatus == false) : ?>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="login.php">Login</a>
                    </li>

                    <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
                    </li>

                    <?php endif; ?>
                </ul>
            </div>

        </div>

    </nav>

    <br>

    <div id="object-list">

        <div class="container">

            <?php if ($sessionStatus) : ?>

            <div class="row mb-4">

                <div class="col">

                    <h2>Daftar Barang</h2>

                </div>

                <div class="col text-end">

                    <a class="btn btn-primary" href="form_barang.php" role="button">Tambah Barang</a>

                </div>

            </div>

            <div class="row">

                <div class="col">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $i = 1;

                                foreach ( $result as $barang) {

                                    if ($barang['foto'] == null || empty($barang["foto"])) {
                                        $barang['foto'] = 'storage/default.png';
                                    }

                                    echo '<tr>
                                        <th scope="row">' . $i++ . '</th>
                                        <td><img height="120" width="120" src="' . $barang["foto"] .'"/></td>
                                        <td>' . $barang["nama_barang"] .'</td>
                                        <td>' . $barang["harga_barang"] .'</td>
                                        <td>
                                            <a href="form_edit.php?id=' . $barang["id_barang"] . '">Edit</a>
                                            <a href="delete.php?id=' . $barang["id_barang"] .'" onclick="return confirm_delete()">Delete</a>
                                        </td>
                                    </tr>';
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php else : ?>

            <div class="row">
                <div class="col">
                    <h2>Login terlebih dahulu!</h2>
                </div>
            </div>

            <?php endif; ?>

        </div>
    </div>

</body>

</html>