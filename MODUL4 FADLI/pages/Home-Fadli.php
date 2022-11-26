<?php
if(!isset($_SESSION)){
    session_start();
}
require "../config/connector.php";
// $nama_session = $_SESSION["nama"];
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

// if (!isset($_SESSION["login"])){
//     header("Location: login-fadli.php");
//     exit;
// }

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
    <title>Home Fadli Showroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../aset/style/index.css" />
</head>

<body>
    <!-- navbar beserta pengkondisiannya -->
    <?php if(isset($_SESSION["login"])) { ?>
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
    <!-- pengkondisian 2 -->
    <?php } else {?>
    <nav class="navbar navbar-expand-lg shadow bg-primary text-white py-3">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  ">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="">Home</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="login-fadli.php">Login</a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <?php };?>
    <!-- navbar beserta pengkondisiannya -->

    <?php if(isset($_SESSION["message"])) : ?>
    <div class="alert alert-success alert-dismissible fade show fade in" role="alert">
        <?= $_SESSION["message"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    <?php unset($_SESSION["message"]); endif; ?>

    <section id="home">
        <div class="mt-5 d-flex justify-content-center align-items-center">
            <div class="word flex">
                <h1><b>Selamat Datang Di Show Room Fadli</b></h1>
                <p>Show Roomnya Fadli nih bosss senggol dongg </p>
                <a href=<?php onButtonCar(); ?>><button type="button"
                        class="btn btn-primary py-2 px-4 mb-4 btn-primary">My Car</button></a>
                <div class="eadNama d-flex flex-row">
                    <img src="../aset/image/logo-ead.png" class="me-3" alt="logo EAD">
                    <p>FADLI_1202204033</p>
                </div>
            </div>
            <div class="gambarMobil">
                <img src="../aset/image/gambar2.png" alt="gambarHome">
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>