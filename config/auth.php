<?php
    session_start();
    /**
     * auth.php
     * digunakan untuk proses autentikasi
     * apabila user belum valid maka akan diarahkan ke halaman login
     * apabila user valid, maka akan diarahkan ke halaman index menurut jabatan user tersebut
     */

    //memanggil file connect.php
    require_once "connect.php";

    // menangkap data yang dikirim dari form jika 
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    // menyeleksi data admin dengan nim dan password yang sesuai
    $data = mysqli_query($conn,"select * from user where nim='$nim' and password='$password'") or die(mysqli_error());
    
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
    
    if($cek > 0){
        while($row = $data->fetch_assoc()) {
            $_SESSION['nim'] = $row['nim'];
            $_SESSION['jabatan'] = $row['jabatan'];
        }
        header("location:../index.php");
    }else{
        header("location:../login.php");
    }
?>