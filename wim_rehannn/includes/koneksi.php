<?php

    $server         = "localhost";
    $user           = "root";
    $password       = "";
    $database       = "db_wmc_xiirpl2";

    $koneksi = mysqli_connect($server, $user, $password) or die("Gagal Terhubung dengan Server!");

    $db      = mysqli_select_db($koneksi, $database) or die("Database Tidak Ditemukan!");
                                                            
?>