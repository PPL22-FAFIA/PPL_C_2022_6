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
        <h1 class="d-flex justify-content-center">PKL</h1>
        <div class="card">

            <h1 class="card-header">Entry PKL</h1>
            <form class="card-body">
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                        <img src="" alt="kosong" class="col-1">
                        <div class="col">

                            <h5><?php echo $_SESSION["dataMhs"]["Nama"] ?></h5>
                            <p><?php echo $_SESSION["dataMhs"]["Nim"] ?></p>
                        </div>
                        <div class="col-3">
                            <h4>Status</h4>
                            <h3 class="text-center badge fs-3 text-white text-bg-success"><?php echo $_SESSION["dataMhs"]["Status"] ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label>Status PKL</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col">
                    <label>Tahun Ajaran</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="col me-0">
                        <label>Mata Kuliah</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                <h4 class="fw-bold">Upload Scan Berita Acara</h4>
                <div class="form-group d-flex flex-column mb-2">
                    <label for="exampleFormControlFile1">Upload File</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="d-flex mb-3">
                    <button class="me-auto btn btn-primary mt-3">Upload</button>
                    <button class=" btn btn-primary mt-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once '../bootstrap/footer.html' ?>