<!-- edit profile php ajax -->
<?php
require_once('../lib/db_login.php');
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kabupaten = $_POST['kabupaten'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $doswal = $_POST['doswal'];
    $dosPemP = $_POST['dosPemP'];
    $dosPemS = $_POST['dosPemS'];
    $query = "UPDATE tb_mhs SET Email_SSO='$email', Nama ='$nama', Status= '$status', No_HP='$no_hp', Alamat='$alamat', Kode_Kabupaten='$kabupaten', Kode_Wali='$doswal' WHERE Nim='$nim'";
    $result = $db->query($query);
    $query2 = "UPDATE tb_pkl SET Kode_Pemb_P='$dosPemP' WHERE Nim='$nim'";
    $result2 = $db->query($query2);
    $query3 = "UPDATE tb_skripsi SET Kode_Pemb_S='$dosPemS' WHERE Nim='$nim'";
    $result3 = $db->query($query3);
    if (!$result && !$result2 && !$result3) {
        die("Could not query the database: <br />" . $db->error);
    } else {
       echo "<strong>Success!</strong> Data berhasil diupdate.";
    } 
?>