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
                            <label><?php echo $_SESSION["dataMhs"]["Nama"]?></label>
                            <input type="hidden" name="nama" value="<?php echo $_SESSION["dataMhs"]["Nama"]?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">

                        <label class="fw-bold">NIM</label>
                        <div class="col">
                            <label><?php echo $_SESSION["dataMhs"]["Nim"]?></label>
                            <input type="hidden" id="nim" name="nim" value="<?php echo $_SESSION["dataMhs"]["Nim"]?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Angkatan</label>
                        <div class="col">
                            <label><?php echo $_SESSION["dataMhs"]["Angkatan"];?></label>
                            <input type="hidden"  name="angkatan" value="<?php echo $_SESSION["dataMhs"]["Angkatan"];?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email SSO</label>
                        <div class="col">
                            <label><?php echo $_SESSION["dataMhs"]["Email_SSO"];?></label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email Pribadi</label>
                        <div class="col">
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_SESSION["dataMhs"]["Email_Pribadi"];?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">No Telepon</label>
                        <div class="col">
                            <input type="text" id="noHP" name="noHP" class="form-control" placeholder="No HP" value="<?php echo $_SESSION["dataMhs"]["No_HP"];?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Alamat</label>
                        <div class="col">
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $_SESSION["dataMhs"]["Alamat"];?>">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Provinsi</label>
                        <div class="col">
                            <select class="form-control" id="provinsi" name="provinsi" onchange="getKabupaten(this.value)">
                                <?php $resultProv = $db->query('SELECT p.Nama_Provinsi, p.Kode_Provinsi FROM tb_mhs m JOIN tb_provinsi p JOIN tb_kabupaten k WHERE k.Kode_Kabupaten = m.Kode_Kabupaten AND k.Kode_Provinsi = p.Kode_Provinsi AND m.Nim = "' . $_SESSION["dataMhs"]["Nim"] . '"');
                                $provsaatini = $resultProv->fetch_object();
                                ?>
                                <?php
                                $result3 = $db->query('select * from tb_provinsi');

                                while ($prov = $result3->fetch_object()) :
                                ?>
                                    <option value="<?php echo $prov->Kode_Provinsi ?>" <?php if ($prov->Kode_Provinsi == $provsaatini->Kode_Provinsi) echo "selected" ?>><?php echo $prov->Nama_Provinsi ?></option>
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
                                $result4 = $db->query('select * from tb_kabupaten where Kode_Provinsi="' . $provsaatini->Kode_Provinsi . '"');


                                ?>
                                <?php while ($kab = $result4->fetch_object()) : ?>
                                    <option value="<?php echo $kab->Kode_Kabupaten ?>" <?php if ($_SESSION["dataMhs"]["Kode_Kabupaten"] == $kab->Kode_Kabupaten) echo "selected" ?>><?php echo $kab->Nama_Kabupaten ?></option>
                                <?php
                                endwhile; ?>
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
</div>
<script src="../js/ajax.js"></script>
<?php require_once '../bootstrap/footer.html' ?>