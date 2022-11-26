<?php 
session_start();

require "../config/connector.php";

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

$list = query("SELECT * FROM showroom_fadli_table");

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

function read_more($string)
    {
      // strip tags to avoid breaking any html
        $string = strip_tags($string);
        if (strlen($string) > 100) {

            // truncate string
            $stringCut = substr($string, 0, 100);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
    $pilihan_warna = [
        "primary" => "Blue",
        "dark" => "Black",
        "info" => "Cyan",
      ];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Fadli Showroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../aset/style/index.css" />
</head>

<body>
    <nav
        class="navbar navbar-expand-lg shadow bg-<?=isset($_COOKIE["warnaNavbar"]) ? $_COOKIE["warnaNavbar"] : "primary";?> text-white py-3">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="Home-Fadli.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href=<?php onButtonCar(); ?>>MyCar</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="Add-Fadli.php"><button
                                class="btn btn-light text-primary px-3 py-1"> Add
                                Car</button></a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-light text-primary dropdown-toggle px-3 py-1" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION["nama"]; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Profile-Fadli.php">Profile</a></li>
                            <li><a class="dropdown-item" href="../config/logout.php">Log out</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section id="list" style="margin:50px 0 0 120px;">
        <h1 class="fw-bold">My Show Room</h1>
        <p class="fw-light">List Show Room Fadli-1202204033</p>
        <div class="row">
            <?php foreach ($list as $listMobil) : ?>
            <div class="col-md-4 mb-5">
                <div class="card" style="width: 350px;">
                    <img src="../aset/image/<?= $listMobil["foto_mobil"]; ?>" class="card-img-top p-3" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $listMobil["nama_mobil"] ?></h5>
                        <p class="card-text"><?= read_more($listMobil["deskripsi"]) ;?></p>
                        <a href="Detail-Fadli.php?id= <?= $listMobil["id_mobil"]; ?>"
                            class="btn btn-primary rounded-5 me-2 px-5 py-2">Detail</a>
                        <a href="../config/delete.php?id= <?= $listMobil["id_mobil"] ?>"
                            class="btn btn-danger rounded-5 px-5 py-2"
                            onclick="return confirm('yakin gak nih?');">Delete</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>

        <div class="bawah my-5">
            <p>Jumlah mobil saat ini <?= count(query($query)) ?></p>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>