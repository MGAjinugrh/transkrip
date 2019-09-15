<?php

/**
 * admin/mahasiswa/delete.php
 * untuk menghapus data mahasiswa
 */

//memanggil connect.php
require_once "../../config/connect.php";

/**
 * disini kita mengambil nim berdasarkan
 * parameter $_GET['nim']
 * bilamana ada isinya maka lakukan proses delete, jika tidak,
 * munculkan pesan error
 */
if(!empty($_GET)){
    $nim = $_GET['nim'];
    $status = $_GET['status'];
    if($status == 'aktif'){
        $sql = "UPDATE mahasiswa SET status = 'nonaktif' WHERE nim='$nim'";
    }else{
        $sql = "UPDATE mahasiswa SET status = 'aktif' WHERE nim='$nim'";
    }

    if ($conn->query($sql) === TRUE) {
        header("location:view.php?message=success");
    } else {
        header("location:insert.php?message=error");
    }

    $conn->close();
}else{
    header("location:insert.php?message=empty");
}
?>