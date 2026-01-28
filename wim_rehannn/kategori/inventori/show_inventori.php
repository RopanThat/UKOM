<?php
    session_start();
    $_SESSION['menu']="Inventori";
    include "../includes/header.php";
?>

    <!-- Awal Konten -->
     <div class="container vh-custom">
        <h1>Halaman ini akan menampilkan Kategori Sepeda 
            <i class="bi bi-box-fill"></i>
        </h1>
     </div>
    <!-- Akhir Konten -->

<?php
    include "../includes/footer.php";
?>