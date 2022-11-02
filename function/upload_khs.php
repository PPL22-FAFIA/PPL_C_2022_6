<?php
session_start();
require '../lib/db_login.php';
$nim = $_SESSION['user']['Nim_Nip'];
$semester = $_POST['semester'];
$folder="../upload/khs";
if (!file_exists($folder)) {
   mkdir($folder, 0777);
}
$move = move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder . "/" . $_FILES["upload_file"]["name"]);
$namafile = $_FILES["upload_file"]["name"];
if($move){
   echo "File uploaded successfully..";
   $query = $db->query("UPDATE tb_khs SET File_KHS = '$namafile' WHERE Nim = '$nim' AND Semester = '$semester'");
}else{
   echo "Uploading failed!";
}
?>