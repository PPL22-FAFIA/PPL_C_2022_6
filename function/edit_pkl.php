<!-- edit profile php ajax -->
<?php
session_start();
require_once('../lib/db_login.php');
    $tempat = $_POST['tempat'];
    $status = $_POST['status'];
    $nim = $_SESSION["user"]["Nim_Nip"];
    $query = "UPDATE tb_pkl SET Tempat='$tempat', Status ='$status' WHERE Nim='$nim'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    } else {
       echo "<strong>Success!</strong> Data berhasil diupdate.";
    } 
?>