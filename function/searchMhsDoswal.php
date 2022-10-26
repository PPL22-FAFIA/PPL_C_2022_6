<?php
require_once("../lib/db_login.php");
$angkatan = $_GET["angkatan"];
$nip = $_GET["nip"];
$nama = $_GET["nama"];
        $query = "SELECT m.Nim, m.Nama AS nama_mhs, m.status AS status_mhs, m.Angkatan AS angkatan_mhs, pkl.Status AS status_pkl, skripsi.Status AS status_skripsi 
        FROM tb_mhs m 
        INNER JOIN tb_dosen d 
        INNER JOIN tb_pkl pkl 
        INNER JOIN tb_skripsi skripsi
        ON m.Nim = skripsi.Nim AND m.Nim = pkl.Nim 
        WHERE (m.Angkatan LIKE '%$angkatan%') AND (m.Nama LIKE '%$nama%') AND (m.Kode_Wali = d.Kode_Wali) AND (d.Nip = '$nip')";
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
          echo '<td>' . $row->status_pkl . '</td>';
          echo '<td>' . $row->status_skripsi . '</td>';
          echo '<td><a href="../all/detailMhs.php?nim=' . $row->Nim . '" class="btn btn-primary">Detail</a></td>';
          echo '</tr>';
          $i++;
        }
        
        $result->free();
        $db->close();
        ?>