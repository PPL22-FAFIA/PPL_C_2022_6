<?php 
    require_once('../lib/db_login.php');

    if (isset($_GET['smt'])){
        $nim = $_GET['nim'];
        $smt = $_GET['smt'];
        
        $query = "SELECT * FROM tb_irs
                WHERE Nim = '".$nim."' AND Semester = '".$smt."' ";
        $result = $db->query($query)->num_rows;
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
                echo '<th>' . $i . '</th>';
                echo '<td>' . $row->nama_mk . ' (' . $row->SKS .  ' SKS) </td>';
                echo '<td>' . $row->Nilai . '</td>';
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
                <button class="me-auto btn btn-primary mt-3">Download File KHS</button>
                <a href="../mahasiswa/addKhsPage.php?semester=<?php echo $smt?>" class="btn btn-primary mt-3">Tambah Data KHS</a>
            </div>
        <?php }
    }
?>
