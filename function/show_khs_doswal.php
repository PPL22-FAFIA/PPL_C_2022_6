<?php
    require_once('../lib/db_login.php');

 

    if (isset($_GET['smt'])){
        $nim = $_GET['nim'];
        $smt = $_GET['smt'];
        
        $query = "SELECT k.Nama_Matkul as nama_mk, n.Nilai as nilai
                FROM tb_nilai n JOIN tb_mhs m JOIN tb_matkul k 
                WHERE n.Nim = m.Nim AND n.Kode_Matkul = k.Kode_Matkul AND m.Nim = '$nim' AND n.Semester = '$smt' ";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
?>
        <!-- label status irs-->

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

<?php
        } else {
            echo '<div class="alert alert-danger" role="alert">Data tidak ditemukan</div>';
        }   
    } 
?>
    <script src="../js/ajax.js"></script>