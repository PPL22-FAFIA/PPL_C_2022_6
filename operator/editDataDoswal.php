<?php require_once '../bootstrap/header.html';
require_once '../lib/db_login.php'; 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
}
$nip = $_GET["nimnip"];
$query = "SELECT * FROM tb_dosen WHERE Nip = '$nip'";
$result = $db->query($query)->fetch_object();

if(isset($_POST['submit'])){
    $query = "DELETE FROM tb_user WHERE Nim_Nip = '$nip'";
    $delete = $db->query($query);
    if (!$delete) {
        die("Could not query the database: <br />" . $db->error);
    } else {
        // Update Kode_Wali in tb_mhs
        $query = "UPDATE tb_mhs SET Kode_Wali = NULL WHERE Kode_Wali = (SELECT Kode_Wali FROM tb_dosen WHERE Nip = '$nip')";
        $update = $db->query($query);
        // Update Kode_Pemb_P in tb_pkl
        $query = "UPDATE tb_mhs SET Kode_Pemb_P = NULL WHERE Kode_Pemb_P = (SELECT Kode_Wali FROM tb_dosen WHERE Nip = '$nip')";
        $update = $db->query($query);
        // Update Kode_Pemb_S in tb_skripsi
        $query = "UPDATE tb_mhs SET Kode_Pemb_S = NULL WHERE Kode_Pemb_S = (SELECT Kode_Wali FROM tb_dosen WHERE Nip = '$nip')";
        $update = $db->query($query);
        // Delete data doswal from tb_dosen
        $query = "DELETE FROM tb_dosen WHERE Nip = '$nip'";
        $delete = $db->query($query);
        
        header("Location: ../operator/cariUserPage.php");
        echo "<script>alert('Data berhasil dihapus');window.location.href='cariUserPage.php';</script>";
    }
}
?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarOp.php' ?>

    </div>
    <div class="col p-4">
    <h1 class="d-flex justify-content-center">Edit Data Dosen Wali</h1>
        <div class="card">
            <form class="card-body" method="POST">
                <div class="mt-4 row gx-5 d-flex flex-row">
                    <div class="form-group mt-3">
                        <label class="fw-bold">Nama</label>
                        <div class="col">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="<?= $result->Nama ?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email</label>
                        <div class="col">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?=$result->Email_SSO?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Kode Wali</label>
                        <div class="col">
                            <input type="text" id="kowal" name="kowal" class="form-control" placeholder="Dosen Wali"value="<?=$result->Kode_Wali?>">
                        </div>
                    </div>
                    <!-- button update data -->
                </div>
                <div class="text-center">
                    <input type="hidden" name="nip" value="<?= $nip?>" id="nip">
                    <button type="submit" name="submit" class="btn btn-danger fw-bold mt-4">Hapus</button>
                    <button type="button" onclick="editDoswalOperator()" class="btn btn-primary fw-bold mt-4">Update</button>
                </div>
                <div id="responseedit">
                </div>

            </form>
        </div>
    </div>
<script src="../js/ajax.js">
    
</script>
 <?php require_once '../bootstrap/footer.html' ?>
