<?php
session_start();
require_once('../lib/db_login.php');
    $nilai = "";
    if(isset($_POST['nilai'])){
        $nilai = $_POST['nilai'];
    }
    $tempat ="";
    if(isset($_POST['tempat'])){
        $tempat = $_POST['tempat'];
    }
    $status = $_POST['status'];
    $nim = $_SESSION["user"]["Nim_Nip"];
    $query = "UPDATE tb_pkl SET Tempat='$tempat', Status ='$status', Nilai = '$nilai' WHERE Nim='$nim'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    } else {
       echo "<strong>Success!</strong> Data berhasil diupdate.";
    } 
?>