<?php require_once '../bootstrap/header.html';
require_once '../lib/db_login.php'; 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
}
$nip = $_GET["nimnip"];
$query = "SELECT * FROM tb_dosen WHERE Nip = '$nip'";
// execute query
$result = $db->query($query)->fetch_object();
// fetch object
?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarOp.php' ?>

    </div>
    <div class="col p-4">
    <h1 class="d-flex justify-content-center">Edit Data Departemen</h1>
        <div class="card">
            <form class="card-body">
                <div class="mt-4 row gx-5 d-flex flex-row">
                    <div class="form-group mt-3">
                        <label class="fw-bold">Nama</label>
                        <div class="col">
                            <input type="text" id="Nama" name="Nama" class="form-control" placeholder="Nama" value="<?=$result->Nama ?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email</label>
                        <div class="col">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?=$result->Email_SSO?>">
                        </div>
                    </div>
                    <!-- button update data -->
                </div>
                <div class="text-center">
                    <button type="button" onclick="editProfile()" class="btn btn-primary fw-bold mt-4">Update</button>
                </div>
                <div id="responseedit">
                </div>

            </form>
        </div>
    </div>

 <?php require_once '../bootstrap/footer.html' ?>