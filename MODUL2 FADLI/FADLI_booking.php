<?php 

    $gambar = isset($_GET["gambar"]) ? $_GET["gambar"] : "rush.png";
    $health = 25000;
    $driver = 100000;
    $fuel = 250000;

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

    <section>
        <h2 class="text-center mt-2">Rent Your Car Now</h2>
        <div class="isian d-flex justify-content-center ">
            <div class="col">
                <div class="row">
                    <img class="pe-5 w-75 h-75 mx-auto" src="<?php echo $gambar?>" alt="gambar">
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <form action="FADLI_mybooking.php" method="post" class=" w-75">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="marqozur@gmail.com" readonly>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="namaOrang" class="form-label">Name</label>
                            <input type="text" class="form-control" id="namaOrang" name="name" value="FADLI_1202204033" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Book Date</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Start time</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" required>
                        </div>
                        <div class="mb-3">
                            <label for="durasi" class="form-label">Duration(days)</label>
                            <input type="number" class="form-control" id="durasi" name="durasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="pilihMobil" class="form-label">car type</label>
                            <select name="pilihMobil" id="" class="form-select">
                                <option value="Toyota Rush">Toyota Rush</option>
                                <option value="Toyota Agya">Toyota Agya</option>
                                <option value="Honda Brio">Honda Brio</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nomortelp" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="nomortelp" name="nomortelp" required>
                        </div>
                        <label class="form-label">Check me out</label>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="health" value="health" name="service[]">
                            <label class="form-check-label" for="health" >Health Protocol/ Rp<?php echo $health;?></label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="Driver" value="driver" name="service[]">
                            <label class="form-check-label" for="Driver" >Driver/ Rp<?php echo $driver;?></label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="Fuel Filled" value="fuel" name="service[]" >
                            <label class="form-check-label" for="Fuel Filled">Fuel/ Rp<?php echo $fuel;?></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
        
    </section>
    <footer class="bg-dark text-white py-2 mt-2">
        <h5 class="text-center">Created with Love</h5>
        <h5 class="text-center">FADLI_1202204033</h5>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>