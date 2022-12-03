<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['login'])) {
    // echo "<script>alert('bwa')</script>";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        if ($_SESSION['role'] == "admin") {
            header("Location: dashboard.php");
        } else {
            header("Location: form-daftart.php");
        }
    } else {
        echo "<script>alert('Email  atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Selamat datang di Penerimaan Anggota Baru</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="shortcut icon" href="assets/images/logo_pab.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="assets/images/logo_pab.png" height="48" class='mb-4'>
                                <h3>Sign In</h3>
                                <p>Masuk dengan email dan password</p>
                            </div>
                            <form method="POST">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Email</label>
                                    <div class="position-relative">
                                        <input type="email" class="form-control" id="email" name="email">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="float-end">
                                        <a href="regis.php">Don't have an account?</a>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-end" type="submit" name="login">Login</button>
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