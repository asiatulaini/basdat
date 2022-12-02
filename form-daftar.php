<?php

    include "config.php";

    if(isset($_POST['form-daftar'])) {

        $name=$_POST['Nama'];
        $email=$_POST['Email'];
        $nim=$_POST['NIM'];
        $prodi=$_POST['Program Studi'];
        $fakultas=$_POST['Fakultas'];
        $alamat=$_POST['Alamat'];
        $JK=$_POST['Jenis_Kelamin'];
        

        //cek apakah sudah terdaftar atau belum
        $ambilDataUsers = mysqli_query($conn, "SELECT COUNT(NIM) AS row FROM pendaftar WHERE NIM='$nim' AND Email='$email'");
        $data = mysqli_fetch_assoc($ambilDataUsers);
        $rowCount = $data['row'];

        if($rowCount!=0) {
            echo "<scrip>alert('Username dan Email sudah terdaftar!')</script>";
        } else {
            $query="INSERT INTO pendaftar (Nama,  Email, NIM, Program Studi, Fakultas, Alamat, Jenis_Kelamin) VALUES ('$name', '$email', '$nim', '$prodi', '$fakultas', '$alamat', '$JK')";
            $simpan= mysqli_query($conn, $query);
            if($simpan){
                header("url= pilihan-bid.php");
                echo "<script>alert('Berhasil terdaftar!')</script>";
            } else {
                echo "<script>alert('Gagal mendaftar!')</script>";
                header("Location: from-daftar.php");
            }
        }
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran - Admin PAB</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/logo_pab.png" type="image/x-icon">
</head>

<body>
    
    <div id="app">
       
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Form Pendaftaran PAB</h3>
                            <p class="text-subtitle text-muted">Silahkan Isi Data kamu dengan Benar!</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Pendaftaran</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <!-- pendaftar start -->
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Isi Data Diri Pendaftar</h4>
                            </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="email" id="email-id" class="form-control" name="email-id" placeholder="Email">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>NIM</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" id="contact-info" class="form-control" name="nim" placeholder="NIM">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Program Studi</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="program studi" class="form-control" name="program studi" placeholder="Program Studi">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Fakultas</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="fakultas" class="form-control" name="fakultas" placeholder="Fakultas">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Angkatan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" id="angkatan" class="form-control" name="angkatan" placeholder="Angkatan">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat">
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <label>Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" id="inputGroupSelect01">
                                                            <option selected>Choose...</option>
                                                            <option value="1">Laki-laki</option>
                                                            <option value="2">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--pendaftar end-->
                    
            <!--pilihan bidang
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pilihlah Bidang yang Kamu Minati</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>NIM</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" id="contact-info" class="nim" name="nim" placeholder="NIM">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Pilihan 1</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" id="inputGroupSelect01">
                                                            <option selected>Choose...</option>
                                                            <option value="1">Bidang 1</option>
                                                            <option value="2">Bidang 2</option>
                                                            <option value="2">Bidang 2</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Pilihan 2</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" id="inputGroupSelect01">
                                                            <option selected>Choose...</option>
                                                            <option value="1">Bidang 1</option>
                                                            <option value="2">Bidang 2</option>
                                                            <option value="2">Bidang 2</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-8 offset-md-4 form-group">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>  
                    </div>     
                </section>
                pilhan bidang end

                Bukti Pembayaran 
                <section id="input-file-browser">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Masukkan Bukti Pembayaran</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>NIM</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" id="contact-info" class="nim" name="nim" placeholder="NIM">
                                                    </div> 
                                                    <div class="form-file">
                                                    <div class="col-lg-6 col-md-12">
                                                        <p>Bukti Pembayaran</p>
                                                        <input type="file" class="form-file-input" id="customFile">
                                                        <label class="form-file-label" for="customFile">
                                                            <span class="form-file-text">Choose file...</span>
                                                            <span class="form-file-button">Browse</span>
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 offset-md-4 form-group">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </from>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>           
                </section>
                bukti pembayaran end 

                prestasi
                <section id="input-file-browser">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Prestasi yang kamu miliki</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>NIM</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" id="contact-info" class="nim" name="nim" placeholder="NIM">
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <label>Deskripsi Prestasi</label>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group mb-3">
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 offset-md-4 form-group">
                                                    </div>
                                                    <div class="form-file">
                                                    <div class="col-lg-6 col-md-12">
                                                        <p>Bukti Prestasi</p>
                                                        <input type="file" class="form-file-input" id="customFile">
                                                        <label class="form-file-label" for="customFile">
                                                            <span class="form-file-text">Choose file...</span>
                                                            <span class="form-file-button">Browse</span>
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 offset-md-4 form-group">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </from>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>           
                </section>
            prestasi end-->
        </div>
            

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Voler</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>