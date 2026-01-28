<?php 
    include "../includes/koneksi.php";

    $id_kategori        =$_POST['id_kategori'];
    $nama_kategori      =$_POST['nama_kategori'];
    $ket_kategori       =$_POST['ket_kategori'];

    $sql = "UPDATE tb_kategori 
        SET nama_kategori='$nama_kategori',
        ket_kategori='$ket_kategori'
        WHERE id_kategori = '$id_kategori'";
    $sql_query = mysqli_query($koneksi, $sql);
    if($sql_query)
    {
        header("location:show_kategori.php");
    }
    else
    {
        echo "data gagal diubah";
    }

?>