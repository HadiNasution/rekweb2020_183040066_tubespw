<?php
require "functions.php";
$book = query("SELECT * FROM buku INNER JOIN 
id_genre_penerbit ON buku.id = id_genre_penerbit.id INNER JOIN
genre_penerbit ON genre_penerbit.id_genre_penerbit = id_genre_penerbit.id_genre_penerbit");

if(isset($_GET['cari'])){
    $book = cari($_GET["keyword"]);
}else{
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

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="shortcut icon" href="../assets/img/icon.jpg">
        <link rel="icon" href="../assets/img/wizard.png">
        <title>Novel J.K Rowling</title>
    </head>
    <body>
    <!-- NAVBAR -->
        <section>
            <nav id="navbar" class="navbar navbar-light justify-content-between">
                <a class="navbar-brand text-light">Hadi Nasution</a>
                <div class="login">
                    <form action="login.php" id="nav-log">
                        <button type="submit" name="submit" id="btn-login" class="btn btn-success">Login</button>
                    </form>
                </div>
                <div class="btn-group">
                    <button type="button" id="btn-sorting" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sorting
                    </button>
                    <div class="dropdown-menu">
                        <p class="dropdown-item"><b>Buku : </b></p>
                        <form action="" method="get">
                            <button class="dropdown-item" type="submit" name="bukubaru" id="baru">Baru</button>
                            <button class="dropdown-item" type="submit" name="bukulama" id="lama">Lama</button>
                        <div class="dropdown-divider"></div>
                        <p class="dropdown-item"><b>Judul : </b></p>
                            <button class="dropdown-item" type="submit" name="ASC" id="baru">A-Z</button>
                            <button class="dropdown-item" type="submit" name="DESC" id="lama">Z-A</button>
                        </form>
                    </div>
                </div>
                <form id="nav-search" class="form-inline" action="" method="get">
                    <input class="form-control mr-sm-2" name="keyword" id="keyword" type="search" placeholder="Search" aria-label="Search" autocomplete="off"  autofocus>
                    <button class="btn btn-secondary" type="submit" name="cari" id="cari">Cari</button>
                </form>
            </nav>
        </section>
    <!-- NAVBAR END-->
    <!-- Caraousel Start -->
    <section>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../assets/img/c1.png" class="d-block w-100" alt="slide 1">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/c2.jpg" class="d-block w-100" alt="slide 2">
                    </div>
                    <div class="carousel-item">
                    <img src="../assets/img/c3.png" class="d-block w-100" alt="slide 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </section>
    <!-- Caraousel End -->
    <!-- Cards Start -->
    <section>
        <div class="container">
            <div class="row">
                <?php if(empty($book)){ ?>
                    <tr>
                        <td colspan = "7">
                            <h1 align = "center">Data Tidak Ditemukan</h1>
                        </td>
                    </tr>
                <?php } else {?>
                    <table border="1" cellspacing="0" cellpadding="10">
                    <?php foreach ($book as $x) {?>
                        <div class="col-md-4 col-sm-6">
                            <div class="content">
                                <div class="card" style="width: 18rem;">
                                    <img src="../assets/img/<?= $x['foto']; ?>" class="card-img-top" alt="cover">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $x['judul'] ?></h5>
                                        <p class="card-text"><?= $x['Sinopsis'] ?></p>
                                        <a href="detailUser.php?id=<?=$x['id']?>" class="btn btn-info">Cek Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- Cards End -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>