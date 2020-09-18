<?php
if(!isset($_GET['id'])){
    header("Location: listUser.php");
    exit;
}
require 'functions.php';

$id = $_GET['id'];
$book = query("SELECT * FROM buku INNER JOIN 
id_genre_penerbit ON buku.id = id_genre_penerbit.id INNER JOIN
genre_penerbit ON genre_penerbit.id_genre_penerbit = id_genre_penerbit.id_genre_penerbit WHERE buku.id = $id")[0];
?>


<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/detailUser.css">
        <link rel="shortcut icon" href="../assets/img/icon.jpg">
        <link rel="icon" href="../assets/img/wizard.png">
        <title>Novel Karya J.K Rowling</title>
    </head>
    
    <body>
        <div class="judul">
            <h3><span>J.K Rowling's </span> Novel</h3>
        </div>
        <div>
            <table class="table" border="1px" cellspacing="0" cellpadding="10">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Cover</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sinopsis</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="../assets/img/<?= $book['foto']; ?>"></td>
                        <td><b><?= $book["judul"]; ?></b></td>
                        <td><?= $book["Sinopsis"]; ?></td>
                        <td><?= $book["genre"]; ?></td>
                        <td><?= $book["penerbit"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <a  class="btn btn-primary" href="listUser.php">Kembali</a>
        </div>
    </body>
</html>
