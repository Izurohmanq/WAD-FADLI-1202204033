<?php 
require "connector.php";
function registrasi ($data){
    global $conn_user;

    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $nohp = strtolower(stripslashes($data["nohp"]));
    $password = mysqli_real_escape_string($conn_user,$data["Password"]); //=> memungkina user memasukkan password ada kutipnya, 
    $cPassword = mysqli_real_escape_string($conn_user,$data["cPassword"]); //=> memungkina user memasukkan password ada kutipnya,

    // cek email kalau udah ada

    $result = mysqli_query($conn_user, "SELECT email FROM user_fadli WHERE email = '$email' ");
    
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('emailnya sudah ada gan') </script>";
        return false;
    }
    // cek konfirmasi

    if( $password !== $cPassword){
        echo "<script> alert('konfirmasi password salah') </script>";
        return false;
    }

    // enskripsi password jangan pake md5

    $password = password_hash($password, PASSWORD_DEFAULT); // password mana yang mau diacak, algoritma buat ngacak password
    
    // tambahkan ke database

    mysqli_query($conn_user, "INSERT INTO user_fadli VALUES (
        '','$nama', '$email', '$password','$nohp'
    )");

    return mysqli_affected_rows($conn_user);

}


?>