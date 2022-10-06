<?php require_once '../bootstrap/header.html';
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
                            <label>Nama</label>
                        </div>
                    </div>
                    <div class="form-group mt-3">

                        <label class="fw-bold">NIM</label>
                        <div class="col">
                            <label>Nama</label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Angkatan</label>
                        <div class="col">
                            <label>Nama</label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">No Telepon</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Alamat</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama">
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