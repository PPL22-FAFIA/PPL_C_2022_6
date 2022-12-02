<?php include_once '../lib/db_login.php';
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

$khs = "SELECT * FROM tb_khs WHERE Nim = '$nim'";
// execute query
$resultkhs = mysqli_query($db, $khs);
// check resultkhs
if (mysqli_num_rows($resultkhs) > 0) {
    // get data
    $datakhs = mysqli_fetch_assoc($resultkhs);
    // set session
    $_SESSION['dataKhs'] = $datakhs;
}
$queryDoswal = "SELECT d.Nip AS nip, d.Nama AS nama_dsn FROM tb_mhs m JOIN tb_dosen d WHERE m.Kode_Wali = d.Kode_Wali AND m.Nim = '$nim'";
$resultDoswal = $db->query($queryDoswal)->fetch_object();
?>

<div class="container">
    <h1 class="d-flex justify-content-center mt-4 mb-3">Dashboard Mahasiswa</h1>
    <div class="row">
        <div class="col">
            <div class="card mt-3 mb-2 w-100 h-100">
                <div class="d-flex justify-content-center align-middle">
                    <div class="card-body mt-3">
                        <h4 class="card-title mb-3">Status Akademik</h4>
                        <p class="card-text m-0">Dosen Wali</p>
                        <p class="fw-bold mb-2"><?php echo $resultDoswal->nama_dsn ?></p>
                        <p class="card-text m-0">NIP</p>
                        <p class="fw-bold m-0"><?php echo $resultDoswal->nip ?></p>
                        <div class="semesternstatus mx-2">
                            <div class="row text-center mt-4">
                                <div class="col">Semester</div>
                                <div class="col">Status</div>
                            </div>
                            <div class="row text-center">
                                <h1 class="col"><?php echo $_SESSION["dataMhs"]["Semester"] ?></h1>
                                <?php
                                if ($_SESSION['dataMhs']['Status'] == "Aktif") {
                                    echo '<h4 class="col w-25 badge fs-4 text-bg-success text-white">'.$_SESSION["dataMhs"]["Status"].'</h4>';
                                } else if($_SESSION['dataMhs']['Status'] == "Cuti"){ 
                                    echo '<h4 class="col w-25 badge fs-4 text-bg-primary text-white">'.$_SESSION["dataMhs"]["Status"].'</h4>';
                                }
                                else{
                                    echo '<h4 class="col w-25 badge fs-4 text-bg-danger text-white">'.$_SESSION["dataMhs"]["Status"].'</h4>';
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mt-3 mb-2 me-4 w-100 h-100">
                <div class="card-body text-center">
                <img class="img-thumbnail rounded p-0 mt-1" src="../lib/pp.jpg" alt="profile" width="130">
                    <h3 class="mt-3"><?php echo $_SESSION["dataMhs"]["Nama"] ?></h3>
                    <p class="m-0"><?php echo $_SESSION["dataMhs"]["Nim"] ?></p>
                    <p class="mb-2">Mahasiswa</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card w-100 h-100">
                <div class="card-body">
                    <h4>Data Mahasiswa</h4>
                    <div class="mt-3">
                        <p class="m-0">Nama Lengkap</p>
                        <p class="fw-bold m-0"><?php echo $_SESSION["dataMhs"]["Nama"] ?></p>
                    </div>
                    <div class="mt-3">
                        <p class="m-0">NIM</p>
                        <div class="d-flex justify-content-between">
                            <!-- anchor editProfil -->
                                <p class="fw-bold"><?php echo $_SESSION["dataMhs"]["Nim"] ?></p>
                            <a href="../mahasiswa/editProfilMhsPage.php" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card w-100 h-100">
                <div class="card-body">
                    <h4 class="card-title text-center mb-3">Prestasi Akademik</h4>
                    <div class="row">
                        <div class="col mb-1">
                            <p class="text-center m-0">SKS semester</p>
                            <h3 class="text-center"><?php echo $_SESSION['dataKhs']['Jml_SKS_Semester'];?></h3>
                        </div>
                        <div class="col mb-1">
                            <p class="text-center m-0">SKS Kumulatif</p>
                            <h3 class="text-center"><?php echo $_SESSION['dataKhs']['Jml_SKS_Kumulatif'];?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-center m-0">IP semester</p>
                            <h3 class="text-center mb-4"><?php echo $_SESSION['dataKhs']['Ip'];?></h3>
                        </div>
                        <div class="col">
                            <p class="text-center m-0">IP Kumulatif</p>
                            <h3 class="text-center mb-4"><?php echo $_SESSION['dataKhs']['Ip_Kumulatif'];?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const namaLengkap = document.getElementById('namaLengkap');
</script>