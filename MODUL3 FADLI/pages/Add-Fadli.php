<?php
require "../config/insert.php";

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
                    <script> 
                    alert('data berhasil ditambahkan');
                    document.location.href = 'ListCar-Fadli.php';  
                    </script>";
    }  else {
        echo "
                <script> 
                    alert('data tidak berhasil ditambahkan');
                    document.location.href = 'ListCar-Fadli.php';  
                </script>";
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Fadli Showroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../aset/style/index.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow bg-primary text-white py-3">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  ">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="Home-Fadli.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="">MyCar</a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section id="add">
        <h2>Tambah mobil</h2>
        <p>Tambah Mobil Baru Anda Ke List Show Room</p>

        <form action="" method="post" class="w-75" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="mobil" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="mobil" name="mobil">
            </div>
            <div class="mb-3">
                <label for="pemilik" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="pemilik" name="pemilik">
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Nama Merk</label>
                <input type="text" class="form-control" id="merk" name="merk">
            </div>
            <div class="mb-3">
                <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Pembayaran</label>
                <br>
                <div class="d-flex flex-row">
                    <input type="radio" id="Lunas" name="status" value="Lunas">
                    <label for="Lunas" class="me-4">Lunas</label><br>
                    <input type="radio" id="Belum" name="status" value="Belum Lunas">
                    <label for="Belum">Belum Lunas</label><br>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary py-2 px-4 mb-4 btn-primary">Selesai</button>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>