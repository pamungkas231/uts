<?php

    include 'connection.php';
    if(isset ($_GET['id'])){
        $delete = mysqli_query($conn, "DELETE FROM product WHERE id = '".$_GET['id']."'");
        if($delete){
            echo "<script>alert('Berhasil Menghapus Data')</script>";
            echo "<script>window.location='home.php'</script>"; 
        }
        else{
            echo "<script>alert('Gagal Menghapus Data')</script>";
        }
    }
?>