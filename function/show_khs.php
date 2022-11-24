<?php 
    require_once('../lib/db_login.php');

    if (isset($_GET['smt'])){
        $nim = $_GET['nim'];
        $smt = $_GET['smt'];
        
        $query = "SELECT * FROM tb_irs
                WHERE Nim = '".$nim."' AND Semester = '".$smt."' ";
        $result = $db->query($query)->num_rows;
        $query4 = "SELECT * FROM tb_khs
        WHERE Nim = '".$nim."' AND Semester = '".$smt."' ";
        $resultobjek = $db->query($query4)->fetch_object();
        if ($result==0) { 
            echo 'Mohon Isi IRS Terlebih Dahulu';
        }
        else { ?>
        <table class="table table-borderless text-center">
            <thead>
                <th scope="col" class="h5">No</th>
                <th scope="col" class="h5">Mata Kuliah</th>
                <th scope="col" class="h5">Nilai</th>
            </thead>
            <tbody>
            <?php
            $query2 = "SELECT k.Nama_Matkul as nama_mk, Nilai, SKS FROM tb_nilai n JOIN tb_matkul k 
                    WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
            $result2 = $db->query($query2);
            $i = 1;
            while ($row = $result2->fetch_object()) {
                echo '<tr>';
                echo '<th class="text-center">' . $i . '</th>';
                echo '<td class="text-center">' . $row->nama_mk . ' (' . $row->SKS .  ' SKS) </td>';
                echo '<td class="text-center">' . $row->Nilai . '</td>';
                echo '</tr>';
                $i++;
            }
            $result2->free();
            echo '</tbody>';
            echo '</table>';
            $query3 = "SELECT SUM(SKS) as TotalSKS FROM tb_nilai n JOIN tb_matkul k WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
            $sumSKS = $db->query($query3)->fetch_object();
            echo 'Jumlah SKS: ' . $sumSKS->TotalSKS . ' SKS';
            ?>
            <div class="d-flex mb-3">
                
                <button type="button" onclick="location.href = '../upload/khs/<?php echo $resultobjek->File_KHS ?>'" class="me-auto btn btn-primary mt-3">Download File KHS</button>
                <?php
                    $query4 = "SELECT Status FROM tb_khs WHERE Nim = '$nim' AND Semester = '$smt' ";
                    $status = $db->query($query4)->fetch_object();
                    if ($status->Status == 'Disetujui') {
                        echo '<div class="btn btn-success mt-3">KHS Telah Disetujui</div>';
                    } else {
                        echo '<a href="../mahasiswa/addKhsPage.php?semester='.$smt.'" class="btn btn-warning mt-3">Edit Data KHS</a>';
                    }

                ?>
            </div>
        <?php }
    }
?>
