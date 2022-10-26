<?php
require_once('../bootstrap/header.html');
require_once('../lib/db_login.php');
session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: ../auth/login.php");
      } else {
        $user = $_SESSION['user']['Role'];
        if ($user != '4') {
          header("Location: ../index.php");
        }
      }
?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarDept.php' ?>

    </div>
    <div class="col d-flex flex-column">
        <h3 class="">Daftar Mahasiswa</h3>
        <div class="d-flex flex-row col-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" onkeyup="searchMhs(this.value)">
        </div>
        <div class="d-flex flex-row-reverse">
            <!-- print table from database siap1 -->
            <table class="table table-striped table-hover">
            <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Dosen Wali</th>
            <th scope="col">Rincian Studi</th>
            </tr>
            </thead>
            <tbody id="daftarMhs">
            <?php
            $query = "SELECT m.Nim, m.Nama AS nama_mhs, d.Nama AS nama_dsn FROM tb_mhs m JOIN tb_dosen d WHERE m.Kode_Wali = d.Kode_Wali ";
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
                echo '<td>' . $row->nama_dsn . '</td>';
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
<script src="../js/ajax.js"></script>