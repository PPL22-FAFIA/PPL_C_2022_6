<?php 
    require_once('../lib/db_login.php'); 

    if (isset($_GET['smt'])){
        $nim = $_GET['nim'];
        $smt = $_GET['smt'];
        
        $query = " SELECT k.Nama as nama_mk, n.Nilai as nilai, k.SKS as sks FROM tb_nilai n JOIN tb_mhs m JOIN tb_matkul k WHERE n.Nim = m.Nim AND n.Kode_Matkul = k.Kode AND m.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
        }

        // Execute the query 
        // Fetch and display the results 
        echo("<table>");
        echo("<tr>");
        echo("<th>Mata Kuliah</th>");
        echo("<th>Nilai</th>");
        echo("<th>SKS</th>");
        echo("</tr>");
        while ($row = $result->fetch_object()) {
            echo '<tr>';
            echo '<td>' . $row->nama_mk . '</td>';
            echo '<td>' . $row->nilai . '</td>';
            echo '<td>' . $row->sks . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    
        $result->free();
        $db->close();
    }

    
?>