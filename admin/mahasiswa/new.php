<?php

/**
 * admin/mahasiswa/new.php
 * proses memasukkan data mahasiswa oleh administrator
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
    $nama = $_POST['nama'];
    $sql = "INSERT INTO mahasiswa (nim,nama)
    VALUES ('$nim','$nama')";

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