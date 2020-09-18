<?php
session_start();
if(!isset($_SESSION['submit'])){
    header("Location:login.php");
    exit;
}
require 'functions.php';
$book = query("SELECT * FROM buku INNER JOIN 
id_genre_penerbit ON buku.id = id_genre_penerbit.id INNER JOIN
genre_penerbit ON genre_penerbit.id_genre_penerbit = id_genre_penerbit.id_genre_penerbit");

if(isset($_GET["cari"])){
    $book = cari($_GET["keyword"]);
}
else{
    $book = query("SELECT * FROM buku INNER JOIN 
    id_genre_penerbit ON buku.id = id_genre_penerbit.id INNER JOIN
    genre_penerbit ON genre_penerbit.id_genre_penerbit = id_genre_penerbit.id_genre_penerbit");
}

//======== SORTING =====================================
if(isset($_GET['bukubaru'])){
    $book = mysqli_query($conn,"SELECT * FROM buku
        ORDER BY id DESC");
}
if(isset($_GET['bukulama'])){
    $book = mysqli_query($conn,"SELECT * FROM buku
        ORDER BY id ASC");
}
if(isset($_GET['ASC'])){
    $book = mysqli_query($conn,"SELECT * FROM buku
        ORDER BY judul ASC");
}
if(isset($_GET['DESC'])){
    $book = mysqli_query($conn,"SELECT * FROM buku
        ORDER BY judul DESC");
}
//========== SORTING END ==============================
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="shortcut icon" href="../assets/img/icon.jpg">
        <link rel="icon" href="../assets/img/wizard.png">
        <title>Index</title>
    <!--Ajax-->
        
    <!--Ajax END-->
    </head>
    <body>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Daftar Novel J.K Rowling</a>
            <div class="logout">
                <button class="btn btn-dark"><a href="logout.php">Logout</a></button>
            </div>
            <form class="form-inline" action="" method="get">
                <input  type="text" name="keyword" id="keyword" class="form-control mr-sm-2 form-control" type="search" placeholder="Search" aria-label="Search" autofocus autocomplete="off">
                <button  class="btn btn-secondary" name="cari" type="submit" id="tombol">Search</button>
            </form>
        </nav>
        <br>
        <div>
            <h1>Laman Administrator</h1>
        </div>
        <br><br>
        <div class="add">
            <a href="print.php" id="print" target="_blank" class="btn btn-info">Print</a>
            <button class="btn btn-success"><a href="tambah.php">Tambah data Novel</a></button><br><br>
        </div>
        <br><br>
        <div id="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">edit</th>
                        <th scope="col">No.</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sinopsis</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($book)){ ?>
                        <tr>
                            <td colspan = "7" >
                                <h1 align = "center">Data Tidak Ditemukan</h1>
                            </td>
                        </tr>
                    <?php } else {?>
                        <?php $x = 1; ?>
                        <?php foreach ($book as $B) { ?>
                        <tr>
                            <td>
                                <a class="btn btn-primary bg-primary text-white" role="button" href="ubah.php?id=<?=$B['id'];?>">Ubah&nbsp;</a><br><br>
                                <a class="btn bg-danger text-white" role="button" href="hapus.php?id=<?=$B['id'];?>" onClick="return confirm('yakin untuk menghapus data?')">Hapus</a>
                            </td>
                            <td><b><?= $x++; ?></b></td>
                            <td><img src="../assets/img/<?=$B['foto'];?>" width="220" height="350"></td>
                            <td><b><?= $B['judul']; ?></b></td>
                            <td><?= $B['Sinopsis']; ?></td>
                            <td><?= $B['genre']; ?></td>
                            <td><?= $B['penerbit']; ?></td>
                        </tr>
                        <?php } ?>
                    <?php }?>
                </tbody>
            </table>
        </div>


        <script type="text/javascript" src="script.js">

        </script>
    </body>
</html>