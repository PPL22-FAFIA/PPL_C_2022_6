<?php
    require_once('../lib/db_login.php');

    if (isset($_GET['smt'])){
        $nim = $_GET['nim'];
        $smt = $_GET['smt'];
        
        $query = "SELECT k.Nama_Matkul as nama_mk, n.Nilai as nilai, k.SKS as sks 
                FROM tb_nilai n JOIN tb_mhs m JOIN tb_matkul k 
                WHERE n.Nim = m.Nim AND n.Kode_Matkul = k.Kode_Matkul AND m.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
        }
?>
        <table class="table table-borderless text-center">
            <thead>
                <th scope="col" class="h5">No</th>
                <th scope="col" class="h5">Mata Kuliah</th>
                <th scope="col" class="h5">Nilai</th>
                <th scope="col" class="h5">SKS</th>
            </thead>
            <tbody>
            <?php
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<th>' . $i . '</th>';
                echo '<td>' . $row->nama_mk . '</td>';
                echo '<td>' . $row->nilai . '</td>';
                echo '<td>' . $row->sks . '</td>';
                echo '</tr>';
                $i+=1;
            }
            $result->free();
            $db->close();
        }
            ?>
            </tbody>
        </table>