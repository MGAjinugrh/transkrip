<?php

/**
 * admin/matkul/new.php
 * proses memasukkan data mata kuliah oleh administrator
 */

//memanggil connect.php
require_once "../config/connect.php";


/**
  * Cek jika isi dari $_POST tidak kosong
  * jika ya maka masukkan data user
  * jika sebaliknya, kirimkan pesan error
  */
if(!empty($_POST)){
    if($_POST['password'] == $_POST['repass']){
        $nim = $_POST['nim'];
        $password = $_POST['password'];

        // menyeleksi data admin dengan nim dan password yang sesuai
        $data = mysqli_query($conn,"select * from user where nim='$nim' and password='$password'") or die(mysqli_error());
        
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
        
        if($cek <= 0){
            $sql = "INSERT INTO user (nim, password)
            VALUES ('$nim','$password')";
    
            if ($conn->query($sql) === TRUE) {
                header("location:../register.php?message=success");
            } else {
                header("location:../register.php?message=database");
            }    
        }else{
            header("location:../register.php?message=database");
        }


        $conn->close();
    }else{
        header("location:../register.php?message=error");
    }
}else{
    header("location:../register.php?message=error");
}
?>