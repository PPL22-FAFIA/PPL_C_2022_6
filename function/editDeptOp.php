<!-- edit profile php ajax -->
<?php
require_once('../lib/db_login.php');
    $email = $_POST['email'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $query = "UPDATE tb_dosen SET Email_SSO='$email', Nama ='$nama'WHERE Nip='$nip'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    } else {
       echo "<strong>Success!</strong> Data berhasil diupdate.";
    } 
?>