<?php

    
    /**
     * logout.php
     * digunakan untuk proses logout
     */

    //memanggil file connect.php
    require_once "config/connect.php";

    //menghapus session login yang berlangsung
    session_destroy();

    //mengarahkan user ke halaman login
    header("location:login.php");
?>