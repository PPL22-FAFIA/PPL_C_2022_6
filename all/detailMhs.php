<?php
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
            <div class="nilai-mhs mx-5 my-2">
                <table class="table table-borderless text-center">
                    <thead>
                        <th scope="col" class="h5">No</th>
                        <th scope="col" class="h5">Mata Kuliah</th>
                        <th scope="col" class="h5">Nilai</th>
                        <th scope="col" class="h5">SKS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Dasar Pemrograman</td>
                            <td>A</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Dasar Sistem</td>
                            <td>E</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>

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
                        <div>: <span>Farrel</span></div>
                    </div>
                    <div class="jawab-status fw-semibold">
                        <div>: <span class="bg-success p-2 text-white fw-semibold rounded h6">Belum Selesai</span></div>
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
                        <div>: <span class="h5">Farrel</span></div>
                    </div>
                    <div class="jawab-status">
                        <div>: <span class="bg-success p-2 text-white rounded h6">Belum Selesai</span></div>
                    </div>
                    <div class="btn-unduh">: <button class="btn btn-success text-white h6 fw-semibold">Unduh</button></div>
                </div>
            </div>

        </div>
    </div>
</div>