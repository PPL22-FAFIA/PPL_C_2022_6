<?php
require_once('../lib/db_login.php');

$nim = $_GET['nim'];
$matkul = $_GET['matkul'];
$kelas = $_GET['kelas'];
$smt = $_GET['smt'];
$query = "DELETE FROM tb_nilai WHERE Nim = '$nim' AND Kode_Matkul = '$matkul' AND Kelas = '$kelas'";
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
                                while ($row = $result->fetch_object()) {
                                    echo '<tr>';
                                    echo "<td> <input name='edit_mk[]' aria-label='Default select example' value='".$row->Nama_Matkul."'></td>";
                                    echo "<td><input name='edit_kelas[]' aria-label='Default select example' value='".$row->Kelas."'></td>";
                                    echo "<td><button onclick='deleteIRS($row->Nim, $row->Nama_Matkul, $row->Kelas, $smt)'>Hapus</button></td>";
                                    echo '</tr>';
                                }
                            }
                        
}
?>