<!-- edit profile php ajax -->
<?php
require_once('../lib/db_login.php');
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kabupaten = $_POST['kabupaten'];
    $nim = $_POST['nim'];
    $query = "UPDATE tb_mhs SET Email_Pribadi='$email', No_HP='$no_hp', Alamat='$alamat', Kode_Kabupaten='$kabupaten' WHERE Nim='$nim'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    } else {
       echo "<strong>Success!</strong> Data berhasil diupdate.";
    } 
?>