<?php
session_start();
require_once('../bootstrap/header.html');
require_once('../lib/db_login.php');
if (isset($_GET['nim'])) {

    $nim = $_GET['nim'];
    $query = "SELECT * FROM tb_mhs WHERE Nim = '$nim'";
    // execute query
    $result = mysqli_query($db, $query);
    // check result
    if (mysqli_num_rows($result) > 0) {
        // get data
        $data = mysqli_fetch_assoc($result);
    }

    $khs = "SELECT * FROM tb_khs WHERE Nim = '$nim'";
    // execute query
    $resultkhs = mysqli_query($db, $khs);
    // check resultkhs
    if (mysqli_num_rows($resultkhs) > 0) {
        // get data
        $datakhs = mysqli_fetch_assoc($resultkhs);
    }
}
?>
<?php
    $doswal = $db->query("SELECT d.Nama FROM tb_dosen d JOIN tb_mhs m WHERE d.Kode_Wali = m.Kode_Wali AND Nim = '$nim'")->fetch_object();
    $dosbingPKL = mysqli_query($db,"SELECT d.Nama as NamaDos FROM tb_dosen d JOIN tb_pkl p WHERE d.Kode_Wali = p.Kode_Pemb_P AND Nim = '$nim'");
    if (mysqli_num_rows($dosbingPKL) > 0) {
        // get data
        $dosbingPKL = mysqli_fetch_assoc($dosbingPKL)['NamaDos'];
    }
    else {
        $dosbingPKL = "Belum ada";
    }
    $dosbingSkripsi = mysqli_query($db,"SELECT d.Nama as NamaDos FROM tb_dosen d JOIN tb_skripsi s WHERE d.Kode_Wali = s.Kode_Pemb_S AND Nim = '$nim'");
    if (mysqli_num_rows($dosbingSkripsi) > 0) {
        // get data
        $dosbingSkripsi = mysqli_fetch_assoc($dosbingSkripsi)['NamaDos'];
    }
    else {
        $dosbingSkripsi = "Belum ada";
    }

    $statusPKL = mysqli_query($db,"SELECT Status FROM tb_pkl WHERE Nim = '$nim'");
    if (mysqli_num_rows($statusPKL) > 0) {
        // get data
        $statusPKL = mysqli_fetch_assoc($statusPKL)['Status'];
        if($statusPKL == 0){
            $statusPKL = "Belum Mengambil PKL";
        }
        else if($statusPKL == 1){
            $statusPKL = "Sedang PKL";
        }
        else if($statusPKL == 2){
            $statusPKL = "Selesai PKL";
        }
    }
    else {
        $statusPKL = "Belum Mengambil PKL";
    }
    $statusSkripsi = mysqli_query($db,"SELECT Status FROM tb_skripsi WHERE Nim = '$nim'");
    if (mysqli_num_rows($statusSkripsi) > 0) {
        // get data
        $statusSkripsi = mysqli_fetch_assoc($statusSkripsi)['Status'];
        if($statusSkripsi == 0){
            $statusSkripsi = "Belum Mengambil Skripsi";
        }
        else if($statusSkripsi == 1){
            $statusSkripsi = "Sedang Skripsi";
        }
        else if($statusSkripsi == 2){
            $statusSkripsi = "Selesai Skripsi";
        }
    }
    else{
        $statusSkripsi = "Belum Mengambil Skripsi";
    }
?>
<script src="../js/ajax.js"></script>
<style type="text/css">
    hr {
        width: 90%;
    }

    content {
        width: 100vh;
    }
</style>
<div class="tengah-main d-flex justify-content-center align-items-center">

    <div class="w-50 border rounded my-4 py-4 ">
        <div class="profile-mhs m-auto p-3 me-5">
            <div class="tengah d-flex">
                <div class=" col m-auto">
                    <div class="content-body">
                        <!-- back button -->
                        <div class="d-flex justify-content-start">
                            <?php
                                if($_SESSION['user']['Role'] == "4"){

                                    echo '<a href="../departemen/daftarMhsDept.php" class="btn btn-primary">Back</a>';
                                }
                                
                                if($_SESSION['user']['Role'] == "2"){

                                    echo '<a href="../doswal/daftarDoswal.php" class="btn btn-primary">Back</a>';
                                }

                            ?>
                        <div class="summary-mhs m-auto">
                            <div class="title text-center h3">Prestasi Akademik</div>
                            <div class="nilai d-flex justify-content-center">
                                <div class="left me-2 ">
                                    <div class="sub-value my-2">
                                        <div class="title-value fw-bold">SKS Semester</div>
                                        <div class="value text-center h2"><?php echo $datakhs['Jml_SKS_Semester'] ?></div>
                                    </div>
                                    <div class="sub-value my-2">
                                        <div class="title-value fw-bold">IP Semester Lalu</div>
                                        <div class="value text-center h2"><?php echo $datakhs['Ip'] ?></div>
                                    </div>
                                </div>
                                <div class="right ms-2">
                                    <div class="sub-value my-2">
                                        <div class="title-value fw-bold">SKS Kumulatif</div>
                                        <div class="value text-center h2"><?php echo $datakhs['Jml_SKS_Kumulatif'] ?></div>
                                    </div>
                                    <div class="sub-value my-2">
                                        <div class="title-value fw-bold">IP Kumulatif</div>
                                        <div class="value text-center h2"><?php echo $datakhs['Ip_Kumulatif'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col">
                    <div class="profile m-2">
                        <div class="profile-img d-flex justify-content-center">
                            <img class="img-thumbnail rounded-circle w-50" src="../lib/lecture-square.jpg" alt="profile">
                        </div>
                        <div class="profile-name text-center">
                            <h3><?php echo $data['Nama'] ?></h3>
                            <div><?php echo $data['Nim'] ?></div>
                            <div>S1 - Informatika</div>
                            <div>Nama Doswal: <?php echo $doswal->Nama?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pembatas -->
        <hr class="mx-auto" />
        <div class="semester">
            <div class="input ms-5">
                <form action="POST">
                    <div for="input-semester" class=" fw-semibold h4">Pilih Semester:</div>
                    <select class="form-select w-25" onchange="showNilai(<?php echo $nim ?>, this.value)">
                        <option selected value="">Pilih semester...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                    </select>
                </form>
            </div>
            <div class="nilai-mhs mx-5 my-2" id="nilai-mhs">

            </div>
        </div>
        <hr class="mx-auto" />
        <div class="pkl w-90 ms-5 my-3">
            <div class="title h4 my-2">Praktik Kerja Lapangan</div>
            <div class="title-content d-flex">
                <div class="question row gy-3">
                    <div class="dospem fw-semibold h5">
                        <div>Dosen Pembimbing</div>
                    </div>
                    <div class="status fw-semibold h5">
                        <div>Status</div>
                    </div>
                    <div class="berita fw-semibold h5">
                        <div>Berita Acara</div>
                    </div>
                </div>
                <div class="answer row gy-3">
                    <div class="jawab-dospem fw-semibold h5">
                        <div>: <span><?php
                            echo $dosbingPKL;
                        ?></span></div>
                    </div>
                    <div class="jawab-status fw-semibold">
                        <div>: <span class="bg-success p-2 text-white fw-semibold rounded h6"><?php 
                        echo $statusPKL?></span></div>
                    </div>
                    <div class="btn-unduh">: <button class="btn btn-success text-white fw-semibold h6">Unduh</button></div>
                </div>
            </div>
        </div>
        <hr class="mx-auto" />
        <div class="skripsi w-90 ms-5">
            <div class="title h4 my-2">Skripsi</div>
            <div class="title-content d-flex">
                <div class="row gy-3">
                    <div class="dospem h5">
                        <div>Dosen Pembimbing</div>
                    </div>
                    <div class="status h5">
                        <div>Status</div>
                    </div>
                    <div class="berita h5">
                        <div>Berita Acara</div>
                    </div>
                </div>
                <div class="answer row gy-3">
                    <div class="jawab-dospem">
                        <div>: <span class="h5"><?php
                            echo $dosbingSkripsi;
                        ?></span></div>
                    </div>
                    <div class="jawab-status">
                        <div>: <span class="bg-success p-2 text-white rounded h6"><?= $statusSkripsi?></span></div>
                    </div>
                    <div class="btn-unduh">: <button class="btn btn-success text-white h6 fw-semibold">Unduh</button></div>
                </div>
            </div>

        </div>
    </div>
</div>