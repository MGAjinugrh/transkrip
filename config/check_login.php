<?php
    /**
     * check_login.php
     * digunakan untuk check status login dari user
     * apabila belum login, maka akan dikembalikan ke halaman login.php
     */
    
    //memanggil file connect.php
    require_once "connect.php";
    session_start();
    if($_SESSION['nim'] == "" || $_SESSION['nim'] == null){
        //echo $_SESSION['nim'];
        header("location:login.php");
    }
?>