<?php
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
                        <a class="nav-link text-white" aria-current="page" href="">Home</a>
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