<?php 
    require "connector.php";

    $id= $_GET["id"];

    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM showroom_fadli_table WHERE id_mobil = $id");
        return mysqli_affected_rows($conn);   
    }
    if(hapus($id) > 0){
        echo "
                <script> 
                    alert('data berhasil dihapus');
                    document.location.href = '../pages/ListCar-Fadli.php';  
                </script>";
    } else {
        echo "
            <script> 
                alert('data tidak berhasil dihapus');
                document.location.href = '../pages/ListCar-Fadli.php';  
            </script>";
    }

?>