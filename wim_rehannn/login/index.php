<?php

    session_start();
    // Prevent browser cache
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

    $_SESSION['menu']="Beranda";
    include "../includes/header.php";
?>

    <!-- Awal Konten -->
     <div class="container vh-custom d-flex justify-content-center align-items-center">
        <section class="">
        <div class="">
            <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://img.freepik.com/vektor-gratis/ilustrasi-hari-sepeda-dunia-datar_23-2149392756.jpg"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="cek_login.php" method="POST">
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                    <label class="form-label" for="form3Example3">Nama Pengguna</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                    <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Enter password" />
                    <label class="form-label" for="form3Example4">Katasandi</label>
                </div>


                <div class="text-center text-lg-start mt-4 pt-2">
                    <input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" VALUE='Masuk'>
                    
                </div>

                </form>
            </div>
            </div>
        </div>
        </section>
     </div>
    <!-- Akhir Konten -->

<?php
    include "../includes/footer.php";
?>