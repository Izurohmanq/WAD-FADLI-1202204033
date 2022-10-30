<?php
    // array asosiatif untuk mobil
    $mobilku = [
        [
            "gambar" => "rush.png",
            "nama"=> "Toyota Rush",
            "harga" => 200000,
            "kursi" => "7 kursi",
            "cc" => "1500cc",
            "transmisi" => "manual",
        ],
        [
            "gambar" => "agya.png",
            "nama"=> "Toyota Agya",
            "harga" => 150000,
            "kursi" => "5 kursi",
            "cc" => "1200cc",
            "transmisi" => "manual",
        ],
        [
            "gambar" => "brio.png",
            "nama"=> "Honda Brio",
            "harga" => 150000,
            "kursi" => "5 kursi",
            "cc" => "1200cc",
            "transmisi" => "Automatic",
        ],
    ]
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RENTAL EAD LURDD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg shadow bg-dark text-white">
      <div class="container">
        <h1>EAD Rental</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link text-white" aria-current="page" href="FADLI_home.php">home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="FADLI_booking.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="FADLI_mybooking.php">MyBooking</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section id="mobilRental" class="mt-2">
        <h1 class="text-center">Welcome to EAD Rent</h1>
        <h5 class="text-center">Find Your best deal, here!</h5>
        <div class="container text-center d-flex justify-content-center">

            <!-- foreach mobil -->
            <?php foreach ($mobilku as $mb) :?>
              <form action="FADLI_booking.php" method="get">
                <div class="card me-3"   style="width: 18rem;">
                  <img src=<?php echo $mb["gambar"];?> class="card-img-top" alt="gambar mobil" name="gambar" >
                  <div class="card-body">
                      <h3 class="card-title"><?php echo $mb["nama"];?></h3>
                      <h5>Rp<?php echo $mb["harga"]; ?>/day</h5>
                      <p class="card-text"><?php echo $mb["kursi"];?></p>
                      <p class="card-text"><?php echo $mb["cc"];?></p>
                      <p class="card-text"><?php echo $mb["transmisi"];?></p>
                      <!-- <button class="btn btn-primary" type="sumbit" > booking now</button> -->
                      <a href="FADLI_booking.php?gambar=<?php echo $mb["gambar"];?>" class="btn btn-primary">book now</a>
                   </div>
                </div>
              </form>
                
            <?php endforeach;?>
            <!-- endforeach mobil -->

        </div>
    </section>
    
    <footer class="bg-dark text-white py-2 mt-2">
        <h5 class="text-center">Created with Love</h5>
        <h5 class="text-center">FADLI_1202204033</h5>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>