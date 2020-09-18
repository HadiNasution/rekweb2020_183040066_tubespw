<?php
require 'functions.php';
$keyword = $_GET['keyword'];
$book = cari($keyword);

?>

<table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">edit</th>
                        <th scope="col">No.</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sinopsis</th>
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
                        </tr>
                        <?php } ?>
                    <?php }?>
                </tbody>
            </table>