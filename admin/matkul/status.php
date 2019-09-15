<?php

/**
 * admin/matkul/delete.php
 * untuk menghapus data mata kuliah
 */

//memanggil connect.php
require_once "../../config/connect.php";

/**
 * disini kita mengambil kd_matkul berdasarkan
 * parameter $_GET['kd_matkul']
 * bilamana ada isinya maka lakukan proses delete, jika tidak,
 * munculkan pesan error
 */
if(!empty($_GET)){
    $kd_matkul = $_GET['kd_matkul'];
    $status = $_GET['status'];
    if($status == 'aktif'){
        $sql = "UPDATE matkul SET status = 'nonaktif' WHERE kd_matkul='$kd_matkul'";
    }else{
        $sql = "UPDATE matkul SET status = 'aktif' WHERE kd_matkul='$kd_matkul'";
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