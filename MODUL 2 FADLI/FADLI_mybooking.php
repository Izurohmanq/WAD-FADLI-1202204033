<?php
  $name = isset($_POST["name"]) ? $_POST["name"] : "";
  $email = isset($_POST["email"]) ? $_POST["email"] : "";
  $tanggal = isset($_POST["tanggal"]) ? $_POST["tanggal"] : "";
  $waktu = isset($_POST["waktu"]) ? $_POST["waktu"] : "";
  $durasi = isset($_POST["durasi"]) ? $_POST["durasi"] : "";
  $pilihMobil = isset($_POST["pilihMobil"]) ? $_POST["pilihMobil"] : "";
  $service = isset($_POST["service"]) ? $_POST["service"] : 0;
  $number = isset($_POST["nomortelp"]) ? $_POST["nomortelp"] : "";

  $checkout = date("Y-m-d", strtotime("+$durasi"."days",strtotime($tanggal)));

  // perhitungan mobil
  if (isset($pilihMobil)){
    $priceMobil = 0.0;
    if($pilihMobil == "Toyota Rush"){
      $priceMobil += 200000;
    }
    if($pilihMobil == "Toyota Agya"){
      $priceMobil += 150000;
    }
    if($pilihMobil == "Honda Brio"){
      $priceMobil += 150000;
    }
    
  }

  // perhitungan jasa serpis
  $kendali = [0];

  if(empty($service)){
    $priceService =0;
  }
  elseif ($service){
    $cService = count($service);
    $priceService = 0.0;

    for($i=0; $i<$cService; $i++){
      if($service[$i] == "health"){
        $priceService += 25000;
      }
      if($service[$i] == "driver"){
        $priceService += 100000;
      }
      if($service[$i] == "fuel"){
        $priceService += 250000;
      }
    }
  }
  
  

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

    <h1 class="text-center">Thank You FADLI_1202204033</h1>
    <h3 class="text-center">Mangga dicek heula, bilih aya kaliru</h3>
    <section>
      <div class="output">
        <table class="table">
          <thead >
            <tr>
              <th scope="col">Booking Number</th>
              <th scope="col">Name</th>
              <th scope="col">Check-in</th>
              <th scope="col">Check-out</th>
              <th scope="col">Car type</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Service(s)</th>
              <th scope="col">Total Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th><?php echo rand(0, 99999999) ?></th>
              <th><?php echo $name; ?></th>
              <th><?php echo $tanggal." ".$waktu ; ?></th>
              <th><?php echo $checkout." ".$waktu; ?></th>
              <th><?php echo $pilihMobil; ?></th>
              <th><?php echo $number; ?></th>
              <th>
                <ul>
                  <?php if(empty($service)){
                          echo "<li> NULL </li>";
                        }elseif ($service) {
                          foreach ($service as $service) {
                            echo "<li> $service.<br /> </li> ";
                          }
                        }?>
                </ul>
              </th>
              <th><?php 
                  if($priceMobil == 0 || $priceService == 0){
                    echo "NONE";
                  }else{
                    echo "Rp".$priceMobil*$durasi + $priceService;
                  }
                   
                  ?></th>
            </tr>
          </tbody>
        </table>

      </div>
    </section>
    <footer class="bg-dark text-white py-2 mt-2">
        <h5 class="text-center">Created with Love</h5>
        <h5 class="text-center">FADLI_1202204033</h5>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>