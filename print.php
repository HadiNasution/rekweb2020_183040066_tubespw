<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$book = query("SELECT * FROM buku INNER JOIN 
id_genre_penerbit ON buku.id = id_genre_penerbit.id INNER JOIN
genre_penerbit ON genre_penerbit.id_genre_penerbit = id_genre_penerbit.id_genre_penerbit");

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Novel J.K Rownling</title>
        <link rel="stylesheet" href="css/print.css">
    </head>
    <body>
        <h1>Novel J.K Rownling</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Penerbit</th>
                </tr>
            </thead>';
            $i = 1;
            foreach ($book as $B) {
                $html .= '<tr>
                    <td>'. $i++ .'</td>
                    <td><img src="../assets/img/'.$B["foto"].' " width="220" height="350"></td>
                    <td>'.$B["judul"].'</td>
                    <td>'.$B["Sinopsis"].'</td>
                    <td>'.$B["genre"].'</td>
                    <td>'.$B["penerbit"].'</td>
                </tr>';
            }
    $html .= '</table>
    </body>
</html>
';
$mpdf->WriteHTML($html);
$mpdf->Output('novel J.K Rownling.pdf','I');

?>