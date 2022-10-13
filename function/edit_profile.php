<!-- edit profile php ajax -->
<?php
require_once('../lib/db_login.php');
if (isset($_POST['nim'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $query = "UPDATE tb_mhs SET Nama='$nama', Email='$email', No_Hp='$no_hp', Alamat='$alamat', Kode_Kabupaten='$kabupaten', Kode_Provinsi='$provinsi', Kode_Pos='$kode_pos' WHERE Nim='$nim'";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    } else {
        echo "Data berhasil diubah";
    }
}
?>