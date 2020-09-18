<?php
session_start();
if(!isset($_SESSION['submit'])){
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id = $_GET['id'];
$B = query("SELECT * FROM buku INNER JOIN 
id_genre_penerbit ON buku.id = id_genre_penerbit.id INNER JOIN
genre_penerbit ON genre_penerbit.id_genre_penerbit = id_genre_penerbit.id_genre_penerbit WHERE buku.id = $id")[0];

if(isset($_POST['ubah'])){
    if(ubah($_POST) > 0 ){
        print "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
            </script>";
    }else{
        print "<script>
            alert('data gagal diubah');
            document.location.href = 'index.php';
            </script>";
    }
}
?>

<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/ubah.css">
        <link rel="shortcut icon" href="../assets/img/icon.jpg">
        <link rel="icon" href="../assets/img/wizard.png">
        <title>Edit Data</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                        </div>
                            <div class="card-body">
                            <h5 class="card-title text-center">Perbarui Buku</h5>
                            <form class="form-signin" action="" method="post" enctype="multipart/form-data">
                                <div class="form-label-group">
                                    <input type="hidden" name="id" value="<?=$B['id'];?>">
                                    <input type="hidden" name="gambarLama" value="<?=$B['foto'];?>">
                                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Username" value="<?=$B['judul'];?>" required autofocus>
                                    <label for="judul">Judul</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="textarea" name="Sinopsis" id="Sinopsis" class="form-control" placeholder="Username" value="<?=$B['Sinopsis'];?>" required autofocus>
                                    <label for="Sinopsis">Sinopsis</label>
                                </div>
                                <img width="200" height="200" src="../assets/img/<?=$B['foto'];?>"><br><br>
                                <div class="form-label-group">
                                    <p>Penerbit :<br> <b>Bloomsbury Publishing</b></p>
                                </div>
                                <div class="form-label-group">
                                    <p>Genre :<br> <b>Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru, Bildungsroman</b></p>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="foto" id="foto" required class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="ubah">Tambah</button>
                                </div>
                                <a class="d-block text-center mt-2 small" href="index.php">Back to Index</a>
                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>