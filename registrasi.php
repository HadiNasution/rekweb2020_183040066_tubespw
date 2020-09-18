<?php 
require 'functions.php';

if(isset($_POST['signup'])){
    if(register($_POST) > 0){
        print "<script>
        alert('user baru berhasil ditambahkan');
        alert('Selamat Datang :) ');
        </script>";
    }else{
        print "<script>
        alert('user baru gagal ditambahkan');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/registrasi.css">
        <link rel="shortcut icon" href="../assets/img/icon.jpg">
        <link rel="icon" href="../assets/img/wizard.png">
        <title>Registrasi</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                        </div>
                            <div class="card-body">
                            <h5 class="card-title text-center">Register</h5>
                            <form class="form-signin" action="" method="post">
                                <div class="form-label-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
                                    <label for="username">Username</label>
                                </div>
                                <hr>

                                <div class="form-label-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                
                                <div class="form-label-group">
                                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Password" required>
                                    <label for="password2">Confirm password</label>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="signup">Register</button>
                                <a class="d-block text-center mt-2 small" href="login.php">Sign In</a>
                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>