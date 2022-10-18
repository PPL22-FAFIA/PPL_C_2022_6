<?php require_once '../bootstrap/header.html';
require_once '../lib/db_login.php'; 
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
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
        <?php require_once '../dashboard/sidebarOp.php' ?>

    </div>
    <div class="col p-4">
        <h1 class="d-flex justify-content-center">Edit Data Mahasiswa</h1>
        <div class="card">
            <form class="card-body">
                <div class="mt-4 row gx-5 d-flex flex-row">
                    <div class="form-group mt-3">
                        <label class="fw-bold">Nama</label>
                        <div class="col">
                            <input type="text" id="Nama" name="Nama" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email</label>
                        <div class="col">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Password</label>
                        <div class="col">
                            <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">No Telepon</label>
                        <div class="col">
                            <input type="text" id="noHP" name="noHP" class="form-control" placeholder="No HP">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                    <label class="fw-bold">Status</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Aktif</option>
                            <option value="2">Cuti</option>
                            <option value="3">Undur Diri</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Alamat</label>
                        <div class="col">
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Provinsi</label>
                        <div class="col">
                            <select class="form-control" id="provinsi" name="provinsi">
                            <?php $resultProv = $db->query('SELECT p.Nama_Provinsi, p.Kode_Provinsi FROM tb_mhs m JOIN tb_provinsi p JOIN tb_kabupaten k WHERE k.Kode_Kabupaten = m.Kode_Kabupaten AND k.Kode_Provinsi = p.Kode_Provinsi AND m.Nim = "'.$_SESSION["dataMhs"]["Nim"].'"');
                                $provsaatini = $resultProv->fetch_object();
                            ?>
                            <option value="<?php echo $provsaatini->Kode_Provinsi?>"><?php echo $provsaatini->Nama_Provinsi?></option>
                                <?php
                                    $result3 = $db->query('select * from tb_provinsi');

                                    while ($prov = $result3->fetch_object()):
                                ?>
                                    <option value="<?php echo $prov->Kode_Provinsi ?>"><?php echo $prov->Nama_Provinsi ?></option>
                                <?php endwhile ?>
                            </select>
                            <small class="form-text text-danger" id="provinsi_error"></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Kabupaten</label>
                        <div class="col">
                            <select class="form-control" id="kabupaten" name="kabupaten">
                                <?php
                                    $result4 = $db->query('select * from tb_kabupaten where Kode_Kabupaten="'.$_SESSION["dataMhs"]["Kode_Kabupaten"].'"');

                                    $kab = $result4->fetch_object();
                                ?>
                            <option value="<?php echo $kab->Kode_Kabupaten?>"><?php echo $kab->Nama_Kabupaten?></option>
                            </select>
                            <small class="form-text text-danger" id="kabupaten_error"></small>
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