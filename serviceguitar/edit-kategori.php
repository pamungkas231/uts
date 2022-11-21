<?php
    include 'connection.php';
    session_start();
    if($_SESSION['islogin'] != true){
        echo "<script>window.location='index.php'</script>";  
    }

    $kategori = mysqli_query($conn, "SELECT * FROM categorytb WHERE id = '".$_GET['id']."'");
    $data = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori | sparepart guitar</title>
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
                        <a class="nav-item nav-link" href="profile.php">Profile</a>
                    </div>
            
                    <a href="index.php" class="btnlogout">
                    Logout
                    </a>
            </div>
        </div>
        </nav>

        <div class="section">
            <div class="containerbody">
                <h3>Edit Kategori</h3>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1"  required value="<?php echo $data->category ?>">
                    </div>
                   
                    <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
                </form>
            </div>
        </div>

        
</body>
</html>

<?php 
    if(isset($_POST['btnsubmit'])){
        $category = $_POST['category'];
       

        $update = mysqli_query($conn, "UPDATE categorytb SET 
        category = '".$category."' WHERE id = '".$data->id."'");

        if($update){
            echo "<script>alert('Berhasil Mengedit Kategori')</script>";
            echo "<script>window.location='Kategori.php'</script>"; 
        }
    }

   
?>