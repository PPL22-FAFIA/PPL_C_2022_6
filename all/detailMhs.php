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
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
} else {
    $user = $_SESSION['user']['Role'];
    if ($user != '4' && $user != '2') {
        header("Location: ../index.php");
    }
}

?>
<?php
$doswal = $db->query("SELECT d.Nama FROM tb_dosen d JOIN tb_mhs m WHERE d.Kode_Wali = m.Kode_Wali AND Nim = '$nim'")->fetch_object();
$dosbingPKL = mysqli_query($db, "SELECT d.Nama as NamaDos FROM tb_dosen d JOIN tb_pkl p WHERE d.Kode_Wali = p.Kode_Pemb_P AND Nim = '$nim'");
if (mysqli_num_rows($dosbingPKL) > 0) {
    // get data
    $dosbingPKL = mysqli_fetch_assoc($dosbingPKL)['NamaDos'];
} else {
    $dosbingPKL = "Belum ada";
}
$dosbingSkripsi = mysqli_query($db, "SELECT d.Nama as NamaDos FROM tb_dosen d JOIN tb_skripsi s WHERE d.Kode_Wali = s.Kode_Pemb_S AND Nim = '$nim'");
if (mysqli_num_rows($dosbingSkripsi) > 0) {
    // get data
    $dosbingSkripsi = mysqli_fetch_assoc($dosbingSkripsi)['NamaDos'];
} else {
    $dosbingSkripsi = "Belum ada";
}

$PKL = mysqli_query($db, "SELECT * FROM tb_pkl WHERE Nim = '$nim'");
if (mysqli_num_rows($PKL) > 0) {
    // get data
    $pklMhs = mysqli_fetch_assoc($PKL);
    $statusPKL = $pklMhs['Status'];
} else {
    $statusPKL = "Belum Mengambil PKL";
}
$Skripsi = mysqli_query($db, "SELECT * FROM tb_skripsi WHERE Nim = '$nim'");
if (mysqli_num_rows($Skripsi) > 0) {
    // get data
    $SkripsiMhs = mysqli_fetch_assoc($Skripsi);
    $statusSkripsi = $SkripsiMhs['Status'];
} else {
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
<div class="row g-0">
    <div class="col-2">

        <?php
        $user = $_SESSION['user']['Role'];
        // switch case user
        switch ($user) {
            case 1:
                include_once '../dashboard/sidebarMhs.php';
                break;
            case 2:
                include_once '../dashboard/sidebarDoswal.php';
                break;
            case 3:
                include_once '../dashboard/sidebarOp.php';
                break;
            case 4:
                include_once '../dashboard/sidebarDept.php';
                break;
        }
        ?>
    </div>
    <div class="col">
        <h1 class="title-page fw-bold text-center my-4">Prestasi Akademik</h1>
        <div class="tengah-main d-flex justify-content-center align-items-center mb-5">
            <div class="w-75 round-content py-4">
                <div class="profile-mhs m-auto p-3">
                    <div class="tengah d-flex">
                        <div class=" mx-3 col m-auto">
                            <div class="content-body">
                                <div class="summary-mhs m-auto">
                                    <div class="nilai d-flex justify-content-center">
                                        <div class="left me-2 ">
                                            <div class="sub-value m-4">
                                                <div class="title-value fw-semibold text-center">SKS Semester</div>
                                                <div class="value text-center h2 mt-2"><?php echo $datakhs['Jml_SKS_Semester'] ?></div>
                                            </div>
                                            <div class="sub-value m-4">
                                                <div class="title-value fw-semibold text-center">IP Semester Lalu</div>
                                                <div class="value text-center h2 mt-2"><?php echo $datakhs['Ip'] ?></div>
                                            </div>
                                        </div>
                                        <div class="right ms-2">
                                            <div class="sub-value m-4">
                                                <div class="title-value fw-semibold text-center">SKS Kumulatif</div>
                                                <div class="value text-center h2 mt-2"><?php echo $datakhs['Jml_SKS_Kumulatif'] ?></div>
                                            </div>
                                            <div class="sub-value m-4">
                                                <div class="title-value fw-semibold text-center">IP Kumulatif</div>
                                                <div class="value text-center h2 mt-2"><?php echo $datakhs['Ip_Kumulatif'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" mx-3 round-content col">
                            <div class="profile m-2">
                                <div class="profile-img d-flex justify-content-center">
                                    <img class="img-thumbnail rounded-circle w-50" src="../lib/pp.jpg" alt="profile">
                                </div>
                                <div class="profile-name text-center mx-4">
                                    <h4 class="my-2"><?php echo $data['Nama'] ?></h4>
                                    <div class="fw-semibold my-1"><?php echo $data['Nim'] ?></div>
                                    <div class="fw-semibold my-1">S1 - Informatika</div>
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
                            <div for="input-semester" class=" fw-semibold h4 my-3">Pilih Semester:</div>
                            <select class="form-select w-25 my-3" id="input-semester">
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
                            <script>
                                var semester = document.getElementById('input-semester');
                            </script>
                            <button type="button" class="btn btn-primary fw-semibold" onclick="showIRSD(<?php echo $nim ?>, semester.value)">Lihat IRS</button>
                            <button type="button" class="btn btn-primary mx-2 fw-semibold" onclick="showKHSD(<?php echo $nim ?>, semester.value)">Lihat KHS</button>
                        </form>
                    </div>
                    <div class="nilai-mhs mx-5 my-2" id="nilai-mhs">

                    </div>
                    <div id="irs-mhs">

                    </div>
                </div>
                <hr class="mx-auto" />
                <div class="pkl w-90 ms-5 my-4">
                    <div class="title h4 my-3">Praktik Kerja Lapangan</div>
                    <div class="title-content d-flex">
                        <div class="question row gy-3">
                            <div class="dospem fw-semibold">
                                <div>Dosen Pembimbing</div>
                            </div>
                            <div class="status fw-semibold">
                                <div>Status</div>
                            </div>
                            <div class="berita fw-semibold">
                                <div>Berita Acara</div>
                            </div>
                        </div>
                        <div class="answer row gy-3">
                            <div class="jawab-dospem fw-semibold">
                                <div>: <span><?php
                                                echo $dosbingPKL;
                                                ?></span></div>
                            </div>
                            <div class="jawab-status fw-semibold">
                                <div> : <?php
                                        if ($statusPKL == "Belum Ambil") {
                                            echo '<span class="bg-danger p-2 text-white fw-semibold rounded h6">' . $statusPKL  .'</span>';
                                        } else if ($statusPKL  == "Sedang Mengambil") {
                                            echo '<span class="bg-warning p-2 text-white fw-semibold rounded h6">' . $statusPKL  . '</span>';
                                        } else {
                                            echo '<span class="bg-success p-2 text-white fw-semibold rounded h6">' . $statusPKL  . '</span>';
                                        }
                                        ?>
                                </div>
                            </div>
                            <div class='btn-unduh mt-4'>:
                                <?php
                                if ($pklMhs['File_PKL'] != "") {
                                    echo "<button onclick='location.href = " . '"' . "../upload/pkl/" . $pklMhs['File_PKL'] . "" . '"' . "' class='btn btn-success text-white fw-semibold h6'>Unduh</button>";
                                } else {
                                    echo "<span class='fw-semibold bg-danger text-white p-2 rounded'>Belum Ada Berita Acara</span>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mx-auto" />
                <div class="skripsi w-90 ms-5">
                    <div class="title h4 my-3">Skripsi</div>
                    <div class="title-content d-flex">
                        <div class="row gy-3">
                            <div class="dospem h6">
                                <div>Dosen Pembimbing</div>
                            </div>
                            <div class="status h6">
                                <div>Status</div>
                            </div>
                            <div class="berita h6">
                                <div>Berita Acara</div>
                            </div>
                        </div>
                        <div class="answer row gy-3">
                            <div class="jawab-dospem">
                                <div>: <span class="h6"><?php
                                                        echo $dosbingSkripsi;
                                                        ?></span></div>
                            </div>
                            <div class="jawab-status">
                                <div>: <?php
                                        if ($statusSkripsi == "Belum Ambil") {
                                            echo '<span class="bg-danger p-2 text-white fw-semibold rounded h6">' . $statusSkripsi  .'</span>';
                                        } else if ($statusSkripsi  == "Sedang Mengambil") {
                                            echo '<span class="bg-warning p-2 text-white fw-semibold rounded h6">' . $statusSkripsi  . '</span>';
                                        } else {
                                            echo '<span class="bg-success p-2 text-white fw-semibold rounded h6">' . $statusSkripsi  . '</span>';
                                        }
                                        ?></div>
                            </div>
                            <div class="btn-unduh">:
                                <?php
                                if ($SkripsiMhs['File_Skripsi'] != "") {
                                    echo "<button onclick='location.href = " . '"' . "../upload/pkl/" . $SkripsiMhs['File_Skripsi'] . "" . '"' . "' class='btn btn-success text-white fw-semibold h6'>Unduh</button>";
                                } else {
                                    echo "<span class='fw-semibold bg-danger text-white p-2 rounded '>Belum Ada Berita Acara</span>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <style>
                        .round-content {
                            border: 2px solid #EAEAEA;
                            border-radius: 35px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>