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
    <title>Tambah Product | sparepart guitar</title>
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
                        <a class="nav-item nav-link" href="Kategori.php">Kategori</a>
                        <a class="nav-item nav-link" href="datadiri.php">Data Diri</a>
                        <a class="nav-item nav-link" href="profile.php" aria-current="page">Profile</a>
                    </div>
            
                    <a href="index.php" class="btnlogout">
                    Logout
                    </a>
            </div>
        </div>
        </nav>

        <div class="section">
            <div class="containerbodyadd"> 
                <h3>Tambah Product</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Product</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"  required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image Product</label>
                        <input type="file" class="form-control" name="image" id="exampleInputEmail1"  required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="exampleInputEmail1"  required>
                    </div>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="kategori" required>
                            <option selected>Pilih Kategori</option>
                            <option value="1">Akustik</option>
                            <option value="0">Elektrik</option>
                        
                    </select>

                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status" required>
                            <option selected>Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                    </select>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" required></textarea>
                    </div>
                   
                    <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
                </form>
            </div>
        </div>

        
</body>
</html>

<?php 
    if(isset($_POST['btnsubmit'])){
      $kategori = $_POST['kategori'];
      $name = $_POST['name'];
      $harga = $_POST['harga'];
      $status = $_POST['status'];
      $deskripsi = $_POST['deskripsi'];

      $filename = $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];

      $type1 = explode('.', $filename);
      $type2 = $type1[1];

      $typeok = array('jpg', 'jpeg', 'png', 'gif');

      if(!in_array($type2, $typeok)){
        echo "<script>alert('Format Image Tidak Sesuai')</script>";
      }
      else{
        move_uploaded_file($tmp_name, './Image/product/'.$filename);

        $insert = mysqli_query($conn, "INSERT INTO product (name, harga, kategori, image, deskripsi, status) VALUES (
            '".$name."','".$harga."', '".$kategori."', '".$filename."', '".$deskripsi."', '".$status."'
        )");

        if($insert){
            echo "<script>alert('Berhasil Menambah Produk')</script>";
            echo "<script>window.location='home.php'</script>"; 
        }
        else{
            echo "<script>alert('Gagal Menambah Produk')</script>";
        }
      }
    }

   
?>