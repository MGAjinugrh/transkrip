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
    $nim = $_POST['kd_matkul'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    $sql = "INSERT INTO matkul (kd_matkul,nama,sks)
    VALUES ('$nim','$nama','$sks')";

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