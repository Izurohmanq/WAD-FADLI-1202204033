<?php 
session_start();
require "../config/connector.php";
$query = "SELECT * FROM showroom_fadli_table";
$result = mysqli_query($conn, $query);

if(!isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}

function onButtonCar() {
  global $result;
  if(mysqli_num_rows($result) > 0) {
    echo "Listcar-Fadli.php";
  } else {
    echo "Add-Fadli.php";
  }
}
$email = $_SESSION["email"];

$dataProf = mysqli_query($conn_user, "SELECT * FROM user_fadli WHERE email = '$email'"); 
$fetching = mysqli_fetch_assoc($dataProf);


if(isset($_POST["update"])) {
    $email = $_SESSION["email"]; // emailnya disable jadi diseperti itukan
    $nama = $_POST["nama"];
    $nohp = $_POST["nohp"];
    // dibikin perkondisian untuk apabila user ingin mengubah tampilan warna navbar saja
    if($_POST["Password"] ==="" && $_POST["cPassword"] ===""){
        $password = $fetching["password"];
        $konfirmasi_password  = $fetching["password"];
        $query = "UPDATE user_fadli SET
                    nama = '$nama',
                    no_hp = '$nohp'
                WHERE email = '$email'";
    // kalau user ingin mengubah password, berarti langsung mengeksekusi pada bagian else
    }else {
        $password = mysqli_real_escape_string($conn_user, $_POST["Password"]);
        $konfirmasi_password = mysqli_real_escape_string($conn_user, $_POST["cPassword"]);
        // set cookie utuk warna navbar
        if($password == $konfirmasi_password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE user_fadli SET
                    nama = '$nama',
                    no_hp = '$nohp',
                    password = '$password'
                WHERE email = '$email'";
          
        } else {
            echo "<script> alert('passwordnya ngawur') </script>";
        }
    }
    mysqli_query($conn_user, $query);
    echo "<meta http-equiv='refresh' content='0'>"; //ketika mengganti warna navbar langsung refresh sendiri
    echo "<script> alert('data berhasil dibuah') </script>";
    setcookie("warnaNavbar", $_POST["warnaNavbar"], time() + 3600, "/");

    
  }



$warnaNavbar = [
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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../aset/style/index.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg shadow
        bg-<?=isset($_COOKIE["warnaNavbar"]) ? $_COOKIE["warnaNavbar"] : "primary";?> text-white py-3">
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
                            <?= $fetching["nama"]; ?>
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

    <section id="profilee">
        <div class="form text-center mt-5">
            <h1 class="mb-4">Profile</h1>
            <div class="form2 justify-content-center">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-4"><label for="email">Email</label></div>
                        <div class="col-7"><input type="email" name="email" id="email" class="w-100"
                                value="<?= $_SESSION["email"] ?>" disabled></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="nama">Nama</label></div>
                        <div class="col-7"><input type="nama" name="nama" id="nama" class="w-100"
                                value="<?= $fetching["nama"] ?>"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="nohp" class="form-label">Nomor Handphone</label></div>
                        <div class="col-7"><input type="text" name="nohp" id="nohp" class="w-100"
                                value="<?= $fetching["no_hp"] ?>"></div>
                    </div>

                    <hr class="w-75 mx-auto" /> <!-- batas garis antara bawah dan atas -->

                    <div class="row mb-3">
                        <div class="col-4"><label for="Password" class="form-label">Password</label></div>
                        <div class="col-7"><input type="password" name="Password" id="Password"
                                class="form-control w-100"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="cPassword" class="form-label">Konfirmasi Password</label></div>
                        <div class="col-7"><input type="password" name="cPassword" id="cPassword"
                                class="form-control w-100"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="warnaNavbar" class="form-label">Warna Navbar</label></div>
                        <div class="col-7">
                            <select class="form-select text-muted" aria-label="Warna Navbar" id="warnaNavbar"
                                name="warnaNavbar">
                                <?php foreach($warnaNavbar as $warna => $value) : ?>
                                <?php $selected = $warna == $_COOKIE["warnaNavbar"] ? "selected" : "" ?>
                                <option value="<?= $warna; ?>" <?= $selected; ?>><?= $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" name="update">Update gan</button>
                </form>
            </div>
        </div>
    </section>


    <footer class="text-center" style="margin:0 0 0 150px;">
        <div class="bungkus">
            <div class="logo_nim d-flex">
                <img src="../aset/image/logo-ead.png" class="me-4" alt="logo">
                <p class="d-inline">FADLI_1202204033</p>
            </div>
        </div>
    </footer>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>