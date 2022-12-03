<?php

    include "config.php";

    if(isset($_POST['regis'])) {

        $name=$_POST['nama'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $role="umum";

        //cek apakah sudah terdaftar atau belum
        $ambilDataUsers = mysqli_query($conn, "SELECT COUNT(username) AS row FROM users WHERE username='$username' AND Email='$email'");
        $data = mysqli_fetch_assoc($ambilDataUsers);
        $rowCount = $data['row'];

        if($rowCount!=0) {
            echo "<scrip>alert('Username dan Email sudah terdaftar!')</script>";
        } else {
            $query="INSERT INTO users (Nama, username, Email, Password, role) VALUES ('$name', '$username', '$email', '$password', '$role')";
            $simpan= mysqli_query($conn, $query);
            if($simpan){
                header("Location: index.php");
                echo "<script>alert('Berhasil terdaftar!')</script>";
            } else {
                echo "<script>alert('Gagal mendaftar!')</script>";
                header("Location: regis.php");
            }
        }



    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Selamat Datang di PAB</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="shortcut icon" href="assets/images/logo_pab.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/logo_pab.png" height="48" class='mb-4'>
                        <h3>Sign Up</h3>
                        <p>Please fill the form to register.</p>
                    </div>
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nama</label>
                                    <input type="text" id="first-name-column" class="form-control"  name="nama">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Email</label>
                                    <input type="email" id="email-id-colum" class="form-control"  name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="username-column">Username</label>
                                    <input type="text" id="username-column" class="form-control" name="username">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Password</label>
                                    <input type="password" id="country-floating" class="form-control" name="password">
                                </div>
                            </div>


                        </diV>

                                <a href="index.php">Have an account? Login</a>
                        <div class="clearfix">
                            <button name="regis" type="submit" class="btn btn-primary float-end" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>

</html>
