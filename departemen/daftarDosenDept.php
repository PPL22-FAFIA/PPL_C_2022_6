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
        <h3 class="">Daftar Dosen</h3>
        <div class="d-flex flex-row col-3">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" onkeyup="searchDosen(this.value)">
        </div>
        <div class="d-flex flex-row-reverse">
            <!-- print table from database siap1 -->
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama</th>
                <th scope="col">Data Perwalian</th>
                </tr>
                </thead>
                <tbody id="daftarDosen">
            <?php
                $query = "SELECT Nip, Nama FROM tb_dosen";
                $result = $db->query($query);
                if (!$result) {
                    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                }
                $i = 1;
                
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<th scope="row">'.$i.'</th>';
                    echo '<td>'.$row->Nip.'</td>';
                    echo '<td>'.$row->Nama.'</td>';
                    echo '<td><a href="../doswal/daftarDoswal.php?nip='.$row->Nip.'" class="btn btn-primary">Detail</a></td>';
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