<?php 
    include "../includes/koneksi.php";

    $id_dealer        =$_POST['id_dealer'];
    $nama_dealer      =$_POST['nama_dealer'];
    $no_telp          =$_POST['no_telp'];
    $alamat           =$_POST['alamat'];

    $sql = "UPDATE tb_dealer 
        SET nama_dealer='$nama_dealer',
        no_telp='$no_telp', alamat='$alamat'
        WHERE id_dealer = '$id_dealer'";
    $sql_query = mysqli_query($koneksi, $sql);
    if($sql_query)
    {
        header("location:show_dealer.php");
    }
    else
    {
        echo "data gagal diubah";
    }

?>