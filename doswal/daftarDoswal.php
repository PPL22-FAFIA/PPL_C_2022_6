<?php
require_once('../bootstrap/header.html');
require_once('../lib/db_login.php');
session_start();
$nip = $_SESSION['user']['Nim_Nip'];
if (!isset($_SESSION['user'])) {
  header("Location: ../auth/login.php");
} else {
  $user = $_SESSION['user']['Role'];
  if ($user != '2') {
    header("Location: ../index.php");
  }
}
?>
<div class="row g-0">
  <div class="col-2">
    <?php require_once '../dashboard/sidebarDoswal.php' ?>

  </div>
  <div class="col m-5">
    <h3 class="">Daftar Mahasiswa</h3>
    <div class="w-100">
      <div class="text-search h6 mt-3">Cari mahasiswa</div>
      <div class="d-flex flex-row">
        <input type="text" id="nama-mhs" class="form-control w-25" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" onkeyup="searchMhsDoswal(this.value, <?= $nip ?>)">
      </div>
      <div class="d-flex flex-column ">
        <div class="angaktan">
          <div class="text-angkatan h6 mt-3">Angkatan</div>

          
          <div class="pilihangkatan d-flex">
            <select class="border rounded px-5 py-2" name="tahun" id="tahun-angkatan">
              <option value="">Pilih angkatan</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
            <script>
            function filterAngkatanDoswal(angkatan, nip) {
              var inner = "daftarMhsDoswal";
              var url = `../function/filterAngkatanDoswal.php?angkatan=${angkatan}&nip=${nip}`;
              callAjax(url, inner);
            }
              var tahun = document.getElementById('tahun-angkatan');
            </script>
            <button class="btn btn-outline-secondary ms-2" type="button" id="button-addon2" onclick="filterAngkatanDoswal(tahun.value, <?php echo $nip ?>)">Search</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col d-flex flex-column mt-3">
      <div class="d-flex flex-row-reverse">
        <!-- print table from database siap1 -->
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th class="text-center" scope="col">No</th>
              <th class="text-center" scope="col">NIM</th>
              <th class="text-center" scope="col">Nama</th>
              <th class="text-center" scope="col">Status</th>
              <th class="text-center" scope="col">Angkatan</th>
              <th class="text-center" scope="col">PKL</th>
              <th class="text-center" scope="col">Skripsi</th>
              <th class="text-center" scope="col">Rincian Studi</th>
            </tr>
          </thead>
          <tbody id="daftarMhsDoswal">
            <?php
            //filter angkatan
            $query = "SELECT m.Nim, m.Nama AS nama_mhs, m.status AS status_mhs, m.Angkatan AS angkatan_mhs, pkl.Status AS status_pkl, skripsi.Status AS status_skripsi FROM tb_mhs m 
        INNER JOIN tb_dosen d INNER JOIN tb_pkl pkl INNER JOIN tb_skripsi skripsi ON m.Nim = skripsi.Nim AND m.Nim = pkl.Nim AND m.Kode_Wali = d.Kode_Wali AND d.Nip = '$nip'";

            $result = $db->query($query);
            if (!$result) {
              die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
            }
            $i = 1;
            while ($row = $result->fetch_object()) {
              echo '<tr>';
              echo '<th class="text-center" scope="row">' . $i . '</th>';
              echo '<td class="text-center">' . $row->Nim . '</td>';
              echo '<td class="text-center">' . $row->nama_mhs . '</td>';
              echo '<td class="text-center">' . $row->status_mhs . '</td>';
              echo '<td class="text-center">' . $row->angkatan_mhs . '</td>';
              echo '<td class="text-center">' . $row->status_pkl . '</td>';
              echo '<td class="text-center">' . $row->status_skripsi . '</td>';
              echo '<td class="text-center"><a href="../all/detailMhs.php?nim=' . $row->Nim . '" class="btn btn-primary">Detail</a></td>';
              echo '</tr>';
              $i++;
            }

            $result->free();
            $db->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="../js/ajax.js"></script>