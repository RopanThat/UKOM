<?php
    session_start();

    include "../includes/header.php";
    session_destroy();
    header("location:".base_url."");
    //echo "<script>window.location.href='" . base_url ."'</script>";

?>