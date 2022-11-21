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
    <title>Product | sparepart guitar</title>
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
                        <a class="nav-item nav-link active" href="home.php" aria-current="page">Product</a>
                        <a class="nav-item nav-link" href="akustif.php">Akustif</a>
                        <a class="nav-item nav-link" href="elektrik.php">Elektrik</a>
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
            <div class="containerbody">
            <div class="row height d-flex justify-content-center align-items-center">

                <div class="col-md-8">

             
                    <form action="search.php">
                        <div class="search">
                        <input type="text" class="form-control" placeholder="Have a question? Ask Now" name="search">
                        </div>
                        <input type="submit" name="cari" value="Search" class="btn btn-primary">
                    </form>
    
                
                </div>

                </div>
                <a href="tambah-product.php" class="btnedit">Tambah Produk</a>
                <br>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Foto Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $index = 1;
                            $product = mysqli_query($conn, "SELECT * FROM product ORDER BY id DESC");
                            while ($row = mysqli_fetch_array($product)){ ?>
                                <tr>
                                    <th scope="row"><?php echo $index ++ ?></th>
                                    <td><img src="Image/product/<?php echo $row['image'] ?>" alt="" width="80px"></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td>Rp.<?php echo number_format($row['harga']) ?></td>
                                    <td><?php echo ($row['kategori'] == 0)? "Elektrik" : "Akustik " ?></td>
                                    <td><?php echo ($row['status'] == 0)? "TIDAK Aktif" : "AKTIF" ?></td>
                                    <td><a href="edit-product.php?id=<?php echo $row['id']?>" class="btnedit">EDIT</a> || <a href="delete-product.php?id=<?php echo $row['id']?>" class="btndelete">DELETE</a></td>
                                </tr>
                        <?php }  ?>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>

        
</body>

</html>