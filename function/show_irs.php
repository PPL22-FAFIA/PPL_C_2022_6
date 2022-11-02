<?php 
    require_once('../lib/db_login.php');

    if (isset($_GET['smt'])){
        $nim = $_GET['nim'];
        $smt = $_GET['smt'];
        
        $query = "SELECT * FROM tb_irs
                WHERE Nim = '".$nim."' AND Semester = '".$smt."' ";
        $result = $db->query($query)->num_rows;
        if ($result==0) { 
            echo '<a href="../mahasiswa/addIrsPage.php?semester='.$smt.'" class="btn btn-primary mt-3">Tambah Data IRS</a>';
        }
        else { ?>
        <table class="table table-borderless text-center">
            <thead>
                <th scope="col" class="h5">No</th>
                <th scope="col" class="h5">Mata Kuliah</th>
                <th scope="col" class="h5">Kelas</th>
            </thead>
            <tbody>
            <?php
            $query2 = "SELECT k.Nama_Matkul as nama_mk, Kelas, SKS FROM tb_nilai n JOIN tb_matkul k 
                    WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
            $result2 = $db->query($query2);
            $i = 1;
            while ($row = $result2->fetch_object()) {
                echo '<tr>';
                echo '<th class="text-center">' . $i . '</th>';
                echo '<td class="text-center">' . $row->nama_mk . ' (' . $row->SKS .  ' SKS) </td>';
                echo '<td class="text-center">' . $row->Kelas . '</td>';
                echo '</tr>';
                $i++;
            }
            $result2->free();
            echo '</tbody>';
            echo '</table>';
            $query3 = "SELECT Jml_SKS FROM tb_irs WHERE Nim = '$nim' AND Semester = '$smt' ";
            $sumSKS = $db->query($query3)->fetch_object();
            echo 'Jumlah SKS: ' . $sumSKS->Jml_SKS . ' SKS';
            ?>
            <div class="d-flex mb-3">
                <button class="me-auto btn btn-primary mt-3">Download File IRS</button>
                <?php
                    $query4 = "SELECT Status FROM tb_irs WHERE Nim = '$nim' AND Semester = '$smt' ";
                    $status = $db->query($query4)->fetch_object();
                    if ($status->Status == 'Belum Disetujui') {
                        echo '<a href="../mahasiswa/editIrsPage.php?semester=<?php echo $smt?>" class="btn btn-warning mt-3">Edit Data IRS</a>';
                    } else {
                        echo '<div class="btn btn-success mt-3">IRS Telah Disetujui</div>';
                    }

                ?>
            </div>
        <?php }
    }
?>
