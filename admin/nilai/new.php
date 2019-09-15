<?php

/**
 * admin/matkul/new.php
 * proses memasukkan data mata kuliah oleh administrator
 */

//memanggil connect.php
require_once "../../config/connect.php";


/**
  * Cek jika isi dari $_POST tidak kosong
  * jika ya maka masukkan data user
  * jika sebaliknya, kirimkan pesan error
  */
if(!empty($_POST)){
    $nim = $_POST['nim'];
    $kd_matkul = $_POST['kd_matkul'];
    $nilai = $_POST['nilai'];
    $sql = "INSERT INTO nilai (nim, kd_matkul, nilai)
    VALUES ('$nim','$kd_matkul','$nilai')";

    if ($conn->query($sql) === TRUE) {
        header("location:view.php?message=success");
    } else {
        header("location:insert.php?message=database");
    }

    $conn->close();
}else{
    header("location:insert.php?message=error");
}
?>