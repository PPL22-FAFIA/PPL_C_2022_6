<?php
require_once('../bootstrap/header.html');
require_once('../lib/db_login.php');
session_start();
$nip = $_SESSION['user']['Nim_Nip'];
?>
<div class="row g-0">
  <div class="col-2">
    <?php require_once '../dashboard/sidebarDoswal.php' ?>

  </div>
  <div class="col ">
    <h3 class="">Daftar Mahasiswa</h3>
    <div class="w-100">
      <input type="text" class="form-control w-25" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
      <div class="d-flex flex-row">
        <div class="d-flex justify-content-between">
          <div>
            <input type="text" class="form-control border w-50" id="bigger-smaller" placeholder="> / <">
          </div>
          <div>
            <input type="text" class="form-control w-50" id="angkatan" placeholder="Angkatan...">
          </div>
          <div>
            <select class="form-select w-50" aria-label="Default select example">
              <option selected>Status PKL</option>
              <option value="1">Sudah Ambil</option>
              <option value="2">Belum Ambil</option>
            </select>
          </div>
          <div>
            <select class="form-select w-50" aria-label="Default select example">
              <option selected>Status Skripsi</option>
              <option value="1">Sudah Ambil</option>
              <option value="2">Belum Ambil</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col d-flex flex-column">
        <h3 class="">Daftar Mahasiswa</h3>
        <div class="d-flex flex-row col-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                aria-describedby="button-addon2" class="f">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Filter</button>
        </div>
        <div class="d-flex flex-row-reverse">
            <!-- print table from database siap1 -->
            <?php
                $query = "SELECT m.Nim, m.Nama AS nama_mhs, m.status AS status_mhs, m.Angkatan AS angkatan_mhs FROM tb_mhs m JOIN tb_dosen d WHERE m.Kode_Wali = d.Kode_Wali AND d.Nip = '$nip'";
                $result = $db->query($query);
                if (!$result) {
                    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                }
                $i = 1;
                echo '<table class="table table-striped table-hover">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">No</th>';
                echo '<th scope="col">NIM</th>';
                echo '<th scope="col">Nama</th>';
                echo '<th scope="col">NIM</th>';
                echo '<th scope="col">Angkatan</th>';
                echo '<th scope="col">Rincian Studi</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<th scope="row">'.$i.'</th>';
                    echo '<td>'.$row->Nim.'</td>';
                    echo '<td>'.$row->nama_mhs.'</td>';
                    echo '<td>'.$row->status_mhs.'</td>';
                    echo '<td>'.$row->angkatan_mhs.'</td>';
                    echo '<td><a href="../all/detailMhs.php?nim='.$row->Nim.'" class="btn btn-primary">Detail</a></td>';
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