<?php
    require_once('../lib/db_login.php');

 

    if (isset($_GET['smt'])){
        $nim = $_GET['nim'];
        $smt = $_GET['smt'];
        
        $query = "SELECT k.Nama_Matkul as nama_mk, n.Nilai as nilai
                FROM tb_nilai n JOIN tb_mhs m JOIN tb_matkul k 
                WHERE n.Nim = m.Nim AND n.Kode_Matkul = k.Kode_Matkul AND m.Nim = '$nim' AND n.Semester = '$smt' ";
        $result = $db->query($query);
?>
        <!-- label status khs-->
        <div class="status" id="status">
            
        <?php
        if ($result->num_rows > 0) {
            $query2 = "SELECT Status FROM tb_khs WHERE Nim = '$nim' AND Semester = '$smt' ";
            $status = $db->query($query2)->fetch_object();
            if ($status->Status == 'Disetujui') {
                echo '<div id="setujui"  class="alert alert-success" role="alert">KHS Telah Disetujui</div>';
            }
            else{
                echo '<div id="setujui"  class="alert alert-danger" role="alert">KHS Belum Disetujui</div>';
            }
?>
        
        </div>
        <table class="table table-borderless text-center">
            <thead>
                <th scope="col" class="h5">No</th>
                <th scope="col" class="h5">Mata Kuliah</th>
                <th scope="col" class="h5">Nilai</th>
            </thead>
            <tbody>
            <?php
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<th class="text-center">' . $i . '</th>';
                echo '<td class="text-center">' . $row->nama_mk . '</td>';
                echo '<td class="text-center">' . $row->nilai . '</td>';
                echo '</tr>';
                $i++;
            }
            $result->free();
            $db->close();
            ?>
            </tbody>
        </table>
        <!-- button approve -->
        <input type="hidden" id="smt" value="<?= $smt?>">
        
        <input id="nim" type="hidden" value="<?= $nim?>">
        <button type="button" onclick="approveKHS()" class="btn btn-success">Setujui</button>
        
        <button class="btn btn-danger" onclick="denyKHS()">Batal Setujui</button>
<?php
        } else {
            echo '<div class="alert alert-danger" role="alert">Data tidak ditemukan</div>';
        }   
    } 
?>
    <script src="../js/ajax.js"></script>