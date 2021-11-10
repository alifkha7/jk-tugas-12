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
    <?php 
    require('navbar.php')
    ?>

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