<?php
    $preUrl = explode("/", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $url = (isset($_SERVER['HTTPS'])?"https":"http")."://".$preUrl[0]."/".$preUrl[1]."/";
    define("base_url", $url);
    //echo base_url;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url; ?>/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url; ?>/bootstrap-icons/bootstrap-icons.css">
    <title>Document</title>
    <style>
        .vh-custom {
            min-height: 80vh;
        }
        .active {
            background: orange;
            color:black !important;
        }
    </style>
</head>
<body>
    <!-- Awal Navbar -->
     <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme='dark'>
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">WIMCYCLE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link <?php if($_SESSION['menu']=="Beranda") { echo "active"; } ?>" aria-current="page" href="<?= base_url; ?>">
                    <i class="bi bi-house-fill"></i> Beranda
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php if($_SESSION['menu']=="Kategori") { echo "active"; } ?>" href="<?= base_url; ?>kategori/show_kategori.php">
                    <i class="bi bi-bookmark-fill"></i> Kategori
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php if($_SESSION['menu']=="Sepeda") { echo "active"; } ?>" href="<?= base_url; ?>sepeda/show_sepeda.php">
                    <i class="bi bi-bicycle"></i> Sepeda
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php if($_SESSION['menu']=="Dealer") { echo "active"; } ?>" href="<?= base_url; ?>dealer/show_dealer.php">
                    <i class="bi bi-houses-fill"></i> Dealer
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php if($_SESSION['menu']=="Inventori") { echo "active"; } ?>" href="<?= base_url; ?>inventori/show_inventori.php">
                    <i class="bi bi-box-fill"></i> Inventori
                </a>
                </li>
            </ul>
            <?php
                if(isset($_SESSION['level']))
                {//tampil tombol logout
            ?>
                    <a href="<?= base_url."login/logout.php"; ?>" class="btn btn-danger">Keluar</a>
            <?php
                }
            ?>
            </div>
        </div>
        </nav>
    <!-- Akhir Navbar -->