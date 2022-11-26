<?php
    if(!isset($_SESSION)){
        session_start();
    }

    require "../config/register.php";
    require "../config/connector.php";

    if(isset($_POST["register"])){
        if(registrasi($_POST)){
            echo "<script> 
            alert('user baru berhasil ditambahkan');  
        </script>";
        }else{
            echo mysqli_error($conn);
        }
    }


    if (isset($_SESSION["login"])){
        header("Location: Home-Fadli.php");
        exit;
    }

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["Password"];

        $result = mysqli_query($conn_user, "SELECT * FROM user_fadli WHERE email = '$email'");

        #cek email kalau ada berarti ketemu 1 biji
        if(mysqli_num_rows($result) === 1){
            // cek password

            $row = mysqli_fetch_assoc($result);
            // buat mengganti passwordnya soalnya sudah terenskripsi
            if (password_verify($password, $row["password"])) {
                // set dulu sessionnya, untuk nama, login, email

                $_SESSION["email"] = $row["email"];
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["nohp"] = $row["no_hp"];
                $_SESSION["login"] = true; 

                // di sini kita bisa set buat cookienya
                if(isset($_POST["remember"])){
                    // buat cookienya
                    // kita enkripsi duls, 
                    setcookie("id", $row["id"], time()+60);
                    setcookie("key", hash("sha256", $row["email"]));
                }
                $_SESSION["message"] = "Anda berhasil Login";
                header("Location: Home-Fadli.php ");
                exit;
            };
        }
        // jadi gak usah pakai else 
        $error = true ;

    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../aset/style/index.css" />
</head>

<body>
    <section id="loginn">

        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 min-vh-100 left"></div>
                <div class="col-md-6">
                    <div class="form-login m-auto ps-5">
                        <h2 class="fw-bold mb-4">Login</h2>
                        <?php if(isset($error)) :  ?>
                        <p style="color:red;">usernamenya/paswordnya salah broooo sissssss</p>
                        <?php endif ;  ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control w-75">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" name="Password" id="Password" class="form-control w-75">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">remember me</label>
                            </div>
                            <button type="submit" name="login" class="d-block btn btn-primary mb-3">Login</button>
                        </form>
                        <p>Anda belum punya akun? <a href="register-fadli.php">daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>