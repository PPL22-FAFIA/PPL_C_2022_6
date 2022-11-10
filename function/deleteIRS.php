<?php
require_once('../lib/db_login.php');

$nim = $_POST['nim'];
$matkul = $_POST['matkul'];
$kelas = $_POST['kelas'];
$smt = $_POST['smt'];

// delete from tb_nilai
$query = "DELETE FROM tb_nilai WHERE Nim = '".$nim."' AND Kode_Matkul = '$matkul' AND Kelas = '".$kelas."' AND Semester = '".$smt."'";
$delete = $db->query($query);

if (!$delete) {
    die("Could not query the database: <br />" . $db->error);
} else {
    $nilai = "SELECT * FROM tb_nilai n JOIN tb_matkul k 
    WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
    $result = $db->query($nilai);
    if (!$result) {
        die ("Could not query the database: <br>".$db->error);
    }
    else{
        echo "<input type='hidden' name='edit_mk[]' value=''>";
        echo "<input type='hidden' name='edit_kelas[]' value=''>";
        while ($row = $result->fetch_object()) {
            echo '<tr>';
            echo '<td>'.$row->Nama_Matkul.'</td>';
            echo "<input type='hidden' name='edit_mk[]' value='$row->Kode_Matkul'>";
            echo "<td><input name='edit_kelas[]' aria-label='Default select example' value='".$row->Kelas."'></td>";
            echo "<td><button class='btn btn-danger' type='button' onclick='deleteIRS(`".$row->Nim."`,`".$row->Kode_Matkul."`,`".$row->Kelas."`,".$smt.")'>Hapus</button></td>";
            echo '</tr>';
        }
        $query3 = "SELECT SUM(SKS) as TotalSKS FROM tb_nilai n JOIN tb_matkul k WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
        $sumSKS = $db->query($query3)->fetch_object();
        if ($sumSKS->TotalSKS != null){
            $result2 = $db->query("UPDATE tb_irs SET Jml_SKS = '$sumSKS->TotalSKS' WHERE Nim = '$nim' AND Semester = '$smt'");
        }
    }               
}
?>