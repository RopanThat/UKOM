<?php
    session_start();

    include "../includes/koneksi.php";
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $hash_password = md5($password);
    //mengubah sandi menjadi hasil hash

    $sql = "SELECT * FROM tb_pengguna WHERE username='$username' AND password='$hash_password'";
    $sql_eksekusi = mysqli_query($koneksi, $sql);
    $hitung = mysqli_num_rows($sql_eksekusi);
    $data = mysqli_fetch_array($sql_eksekusi);
    if($hitung == 1)
    {
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        header("location:../index.php");
    }
    else
    {
       header("location:index.php");
    }


?>