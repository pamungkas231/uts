<?php
    include 'connection.php';
    session_start();
    if($_SESSION['islogin'] != true){
        echo "<script>window.location='index.php'</script>";  
    }

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE id = '".$_SESSION['id']."'");
    $d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | sparepart guitar</title>
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
                        <a class="nav-item nav-link" href="datadiri.php">Data Diri</a>
                        <a class="nav-item nav-link active" href="profile.php">Profile</a>
                    </div>
            
                    <a href="index.php" class="btnlogout">
                    Logout
                    </a>
            </div>
        </div>
        </nav>

        <div class="section">
            <div class="containerbody">
                <h3>Profile</h3>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $d->email ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="<?php echo $d->password ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" value="<?php echo $d->username ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="exampleInputEmail1" value="<?php echo $d->nama_lengkap ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">No Hp</label>
                        <input type="number" class="form-control" name="no_hp" id="exampleInputEmail1" value="<?php echo $d->no_hp ?>" required> 
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" value="<?php echo $d->alamat ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
                </form>
            </div>
        </div>

        
</body>
</html>

<?php 
    if(isset($_POST['btnsubmit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

        $update = mysqli_query($conn, "UPDATE admin SET 
        email = '".$email."',
        password = '".$password."',
        username = '".$username."',
        nama_lengkap = '".$nama_lengkap."',
        no_hp = '".$no_hp."',
        alamat = '".$alamat."' 
        WHERE id = '".$d->id."'
        ");

        if($update){
            echo "<script>alert('Update Berhasil')</script>";
            echo "<script>window.location='profile.php'</script>"; 
        }
    }

   
?>