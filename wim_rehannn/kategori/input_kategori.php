<?php
    include "../includes/koneksi.php";

    $nama_kategori  = $_POST['nama_kategori'];
    $ket_kategori   = $_POST['ket_kategori'];

    $sql = "INSERT INTO tb_kategori (nama_kategori, ket_kategori)
            VALUES ('$nama_kategori', '$ket_kategori')";
    $sql_eksekusi = mysqli_query($koneksi, $sql);
    if($sql_eksekusi)
    {
        header("location:show_kategori.php");
    }
    else
    {
        echo "Gagal menambahkan kategori baru!";
    }
?>