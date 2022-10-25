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
        <input type="text" class="form-control w-25" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary ms-2" type="button" id="button-addon2">Search</button>
      </div>
      <div class="d-flex flex-column ">
        <div class="angaktan">
          <div class="text-angkatan h6 mt-3">Angkatan</div>

          <div class="pilihangkatan d-flex">
            <select class="border rounded px-5 py-2" name="tahun" id="tahun-angkatan">
              <option>Pilih angkatan</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
            <button class="btn btn-outline-secondary ms-2" type="button" id="button-addon2">Search</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col d-flex flex-column mt-3">
      <div class="d-flex flex-row-reverse">
        <!-- print table from database siap1 -->
        <?php
        $query = "SELECT m.Nim, m.Nama AS nama_mhs, m.status AS status_mhs, m.Angkatan AS angkatan_mhs, m.Status_PKL AS status_pkl, m.Status_Skripsi AS status_skripsi FROM tb_mhs m JOIN tb_dosen d WHERE m.Kode_Wali = d.Kode_Wali AND d.Nip = '$nip'";
        $result = $db->query($query);
        if (!$result) {
          die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
        }
        $i = 1;
        echo '<table class="table table-striped table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="text-center" scope="col">No</th>';
        echo '<th class="text-center" scope="col">NIM</th>';
        echo '<th class="text-center" scope="col">Nama</th>';
        echo '<th class="text-center" scope="col">NIM</th>';
        echo '<th class="text-center" scope="col">Angkatan</th>';
        echo '<th class="text-center" scope="col">Rincian Studi</th>';
        echo '<th class="text-center" scope="col">PKL</th>';
        echo '<th class="text-center" scope="col">Skripsi</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
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
        echo '</tbody>';
        echo '</table>';
        $result->free();
        $db->close();
        ?>
      </div>
    </div>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="modalFilterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFilterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        amdksmdksmd
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>