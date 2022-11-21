<?php
    include 'connection.php';
    session_start();
    if($_SESSION['islogin'] != true){
        echo "<script>window.location='index.php'</script>";  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elekrtik | sparepart guitar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
        <div class="container-xl">
           
                    <a class="navbar-brand" href="#">
                    <img src="Image/gitarlogo.png" class="h-8" height="50px">
                    </a>
                    <h3 class="titlenavbar">sparepart guitar</h3>
           
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
         
                     <div class="collapse navbar-collapse" id="navbarCollapse">
                
                    <div class="navbar-nav mx-lg-auto">
                    <a class="nav-item nav-link" href="home.php" aria-current="page">Product</a>
                        <a class="nav-item nav-link" href="akustif.php">Akustif</a>
                        <a class="nav-item nav-link" href="elektrik.php">Elektrik</a>
                        <a class="nav-item nav-link active" href="datadiri.php">Data Diri</a>
                        <a class="nav-item nav-link" href="profile.php">Profile</a>
                    </div>
            
                    <a href="index.php" class="btnlogout">
                    Logout
                    </a>
            </div>
        </div>
        
        </nav>

        <div class="section">
            <div class="containerbodydata">
                
                <img src="Image/pp.jpg" alt="" class="foto">
                <div class="txtdata">
                    <p>Nama</p>
                    <p>Tanggal Lahir</p>
                    <p>Jenis Kelamin</p>
                    <p>Alamat</p>
                    <p>Agama</p>
                </div>
                <div class="txtdata">
                    <p>: Aji Pamungkas</p>
                    <p>: 16 - 09 - 1999</p>
                    <p>: Laki - laki</p>
                    <p>: Pringsewu</p>
                    <p>: Islam</p>
                </div>
            </div>
        </div>

        
</body>

</html>