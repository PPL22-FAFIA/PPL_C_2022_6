<?php
session_start();
require_once('../lib/db_login.php');
    $nilai = $_POST['nilai'];
    $status = $_POST['status'];
    $nim = $_SESSION["user"]["Nim_Nip"];
    $query = "UPDATE tb_skripsi SET Status ='$status', Nilai = '$nilai' WHERE Nim='$nim'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    } else {
       echo "<strong>Success!</strong> Data berhasil diupdate.";
    } 
?>