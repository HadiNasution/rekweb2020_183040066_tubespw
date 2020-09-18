<?php
session_start();

if(isset($_SESSION['submit'])){
    header("Location:index.php");
    exit;
}

require 'functions.php';

if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    //query ke database
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");

    //cek username
    if(mysqli_num_rows($result) === 1){
        //cek pass
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            //set session
            $_SESSION['submit'] = true;

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>

<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="shortcut icon" href="../assets/img/icon.jpg">
        <link rel="icon" href="../assets/img/wizard.png">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign In</h5>
                            <?php if(isset($error)){?>
                            <p style="color:red;"></i>username/password salah!<i></p>
                            <?php } ?>
                            <form class="form-signin" action="" method="post">
                            <div class="form-label-group">
                                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" autofocus>
                                <label for="inputEmail">username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign in</button>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit" name="regis"><a href="registrasi.php">Sign up</a></button>
                            <a class="align-bottom" href="listUser.php">back to home</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>