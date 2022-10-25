<?php
require_once('../bootstrap/header.html');
require_once('../lib/db_login.php');
session_start();
$nip = $_SESSION['user']['Nim_Nip'];
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
}
else{
    $user = $_SESSION['user']['Role'];
    if($user!='2'){
        header("Location: ../index.php");
    }
}
?>
<div class="row g-0">
  <div class="col-2">
    <?php require_once '../dashboard/sidebarDoswal.php' ?>

  </div>
  <div class="col mx-3">
    <h3 class="">Daftar Mahasiswa</h3>
    <div class="w-100">
      <input type="text" class="form-control w-25" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" onkeyup="searchMhsDoswal(this.value, <?php echo $nip?>)">
      <div class="d-flex flex-row justify-content-around">
        <div class="d-flex justify-content-between">
          <input type="text" class="form-control w-100 mx-5" id="angkatan" placeholder="Angkatan...">
          <select class="form-select w-100 mx-5" aria-label="Default select example">
            <option selected>Status PKL</option>
            <option value="1">Sudah Ambil</option>
            <option value="2">Belum Ambil</option>
          </select>
          <select class="form-select w-100 mx-5" aria-label="Default select example">
            <option selected>Status Skripsi</option>
            <option value="1">Sudah Ambil</option>
            <option value="2">Belum Ambil</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col d-flex flex-column">
      <div class="d-flex flex-row-reverse">
        <!-- print table from database siap1 -->
        <table class="table table-striped table-hover">
        <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">NIM</th>
        <th scope="col">Angkatan</th>
        <th scope="col">Rincian Studi</th>
        </tr>
        </thead>
        <tbody id="daftarMhsDoswal">
        <?php
        $query = "SELECT m.Nim, m.Nama AS nama_mhs, m.status AS status_mhs, m.Angkatan AS angkatan_mhs FROM tb_mhs m JOIN tb_dosen d WHERE m.Kode_Wali = d.Kode_Wali AND d.Nip = '$nip'";
        $result = $db->query($query);
        if (!$result) {
          die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
        }
        $i = 1;
        
        while ($row = $result->fetch_object()) {
          echo '<tr>';
          echo '<th scope="row">' . $i . '</th>';
          echo '<td>' . $row->Nim . '</td>';
          echo '<td>' . $row->nama_mhs . '</td>';
          echo '<td>' . $row->status_mhs . '</td>';
          echo '<td>' . $row->angkatan_mhs . '</td>';
          echo '<td><a href="../all/detailMhs.php?nim=' . $row->Nim . '" class="btn btn-primary">Detail</a></td>';
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