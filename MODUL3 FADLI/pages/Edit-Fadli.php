<?php 

require "../config/connector.php";
require "../config/edit.php";

$id = $_GET["id"];
$query = "SELECT * FROM showroom_fadli_table";
$result = mysqli_query($conn, $query);
function onButtonCar() {
    global $result;
    if(mysqli_num_rows($result) > 0) {
      echo "Listcar-Fadli.php";
    } else {
      echo "Add-Fadli.php";
    }
  }

$list = query("SELECT * FROM showroom_fadli_table WHERE id_mobil = $id")[0];

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    // kita siapkan barisnya
    $rows = [];
    // kita tambahkan elemen ke setiap barisnya
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; 
    }
    // kita tampilkan barisan yang sudah diisi oleh setiap elemen
    return $rows;
}

if (isset($_POST["submit"])){
        

        
    // cek apakah datanya sudah masuk apa belum

    if (ubah($_POST) > 0) {
        echo "
        
            <script> 
                alert('data berhasil diubah');
                document.location.href = 'ListCar-Fadli.php';  
            </script>";
    } else {
        echo "
            <script> 
                alert('data tidak berhasil diubah');
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
    <title>Home Fadli Showroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
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
                        <a class="nav-link text-white" href=<?php onButtonCar(); ?>>MyCar</a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section id="Detail" class="mb-5">
        <div class="judul-atas" style="margin: 50px 0 0 120px;">
            <h1 class="fw-bold">Edit</h1>
            <p> Edit Mobil <?= $list["nama_mobil"] ?></p>
        </div>

        <div class="isian d-flex justify-content-center mt-5">

            <div class="col">
                <div class="row">
                    <img class="pe-5 w-75 h-75 mx-auto" src="../aset/image/<?= $list["foto_mobil"]?>" alt="gambar">
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <form action="" class=" w-75" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_mobil" value="<?= $list['id_mobil']; ?>">

                        <div class="mb-3">
                            <label for="mobil" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control" id="mobil" name="mobil"
                                value="<?= $list["nama_mobil"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pemilik" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" id="pemilik" name="pemilik"
                                value="<?= $list["pemilik_mobil"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Nama Merk</label>
                            <input type="text" class="form-control" id="merk" name="merk"
                                value="<?= $list["merk_mobil"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                            <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli"
                                value="<?= $list["tanggal_beli"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30"
                                rows="10"> <?= $list["deskripsi"];?> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*"
                                value=<?= $list["foto_mobil"]?> required>
                            <?php echo $list["foto_mobil"] ?>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pembayaran</label>
                            <br>
                            <div class="d-flex flex-row">
                                <label for="Lunas" class="me-4"><input type="radio" id="Lunas" name="status"
                                        value="Lunas"
                                        <?php if($list["status_pembayaran"]=="Lunas" )echo "checked"; ?>>Lunas</label><br>
                                <label for="Belum Lunas" class="me-4"><input type="radio" id="Belum Lunas" name="status"
                                        value="Belum Lunas"
                                        <?php if($list["status_pembayaran"]=="Belum Lunas" )echo "checked"; ?>>Belum
                                    Lunas</label><br>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary px-3 py-2">Simpan</button>

                    </form>
                </div>
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>