<?php require_once '../bootstrap/header.html';
require_once '../lib/db_login.php';
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
}
else{
    $user = $_SESSION['user']['Role'];
    if($user!='1'){
        header("Location: ../index.php");
    }
}
$nim = $_SESSION['user']['Nim_Nip'];
$query = "SELECT * FROM tb_mhs WHERE Nim = '$nim'";
// execute query
$result = mysqli_query($db, $query);
// check result
if (mysqli_num_rows($result) > 0) {
    // get data
    $data = mysqli_fetch_assoc($result);
    // set session
    $_SESSION['dataMhs'] = $data;
}
?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>

    <div class="col p-4">
        <h1 class="d-flex justify-content-center">Edit Profil</h1>
        <div class="card">
            <form class="card-body">
                <h1>Data Mahasiswa</h1>
                <div class="mt-4 row gx-5 d-flex flex-row">
                    <div class="form-group">
                        <label class="fw-bold">Nama</label>
                        <div class="col">
                            <label><?php echo $_SESSION["dataMhs"]["Nama"];?></label>
                        </div>
                    </div>
                    <div class="form-group mt-3">

                        <label class="fw-bold">NIM</label>
                        <div class="col">
                            <label><?php echo $_SESSION["dataMhs"]["Nim"];?></label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Angkatan</label>
                        <div class="col">
                            <label><?php echo $_SESSION["dataMhs"]["Angkatan"];?></label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email" value="<?php echo $_SESSION["dataMhs"]["Email_SSO"];?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">No Telepon</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="No HP" value="<?php echo $_SESSION["dataMhs"]["No_HP"];?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Alamat</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Alamat" value="<?php echo $_SESSION["dataMhs"]["Alamat"];?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Provinsi</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Kabupaten</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <!-- button update data -->
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary fw-bold mt-4">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require_once '../bootstrap/footer.html' ?>