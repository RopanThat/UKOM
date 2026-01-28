<?php

session_start();
$_SESSION['menu'] = "Beranda";
include "includes/header.php";
?>

<?php 
if (isset($_SESSION['level'])) {
?>
    <!-- Ini tampilan untuk ADMIN -->
    <div class="container vh-custom">
        <h1>Selamat Datang <b><?= $_SESSION['username']; ?></b></h1>
    </div>
    <!-- AKHIR ADMIN -->
<?php
} else {
?>
    <!-- Ini tampilan untuk UMUM -->
    <div class="container vh-custom">
        <h1>Website ini adalah website Official dari Wimcycle</h1>
    </div>
    <!-- AKHIR UMUM -->
<?php
}
?>

<?php
include "includes/footer.php";
?>