<?php require_once '../bootstrap/header.html';
    require_once '../lib/db_login.php';
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../auth/login.php");
    }
    else{
        $user = $_SESSION['user']['Role'];
        if($user!='1'){
            header("Location: ../index.php");
        }
    }

    $nim = $_SESSION['user']['Nim_Nip'];
    $smt = $_GET['semester'];
    
    if (isset($_POST['submit'])) {
        for ($i=0; $i < count($_POST['mata_kuliah']); $i++) {
            if ($_POST['mata_kuliah'][$i] != "" && $_POST['nilai'][$i] != "") {
                $nilai = $_POST['nilai'][$i];
                $matkul = $_POST['mata_kuliah'][$i];
                $queryEdit = "UPDATE tb_nilai SET Nilai = '$nilai' WHERE Kode_Matkul = '$matkul' AND Nim = '$nim' AND Semester = '$smt'";
                $result = $db->query($queryEdit);
            }
        }

        $ip = $_POST['ip'];
        $ipk = $_POST['ipk'];
        
    $namaFile = $_FILES['uploadKhs']['name'];
    $namaSementara = $_FILES['uploadKhs']['tmp_name'];
    
    // tentukan lokasi file akan dipindahkan
    $dirUpload = "../upload/khs/";
    
    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        $query4 = "SELECT SUM(Jml_SKS) as TotalSKS FROM tb_irs WHERE Nim = '".$nim."'";
        $sumSKS = $db->query($query4)->fetch_object();
        $query3 = "SELECT Jml_SKS FROM tb_irs WHERE Nim = $nim AND Semester = $smt ";
        $result3 = $db->query($query3)->fetch_object();
        
        $query2 = "SELECT * FROM tb_khs WHERE Nim = '".$nim."' AND Semester = '".$smt."' ";
        $result = mysqli_query($db, $query2);
        if (mysqli_num_rows($result) == 0) {
            $result2 = $db->query("INSERT INTO tb_khs(Nim, Semester, Ip, Ip_Kumulatif, Status, Jml_SKS_Kumulatif, Jml_SKS_Semester, File_KHS) VALUES('$nim', '$smt', '$ip', '$ipk', 'Disetujui', '".$sumSKS->TotalSKS."', '".$result3->Jml_SKS."','$namaFile')");
        }
        else{
            $queryEdit = "UPDATE tb_khs SET Ip = '$ip', Ip_Kumulatif = '$ipk', Jml_SKS_Kumulatif = '$sumSKS->TotalSKS', Jml_SKS_Semester = '$result3->Jml_SKS' WHERE Nim = '$nim' AND Semester = '$smt'";
            $result = $db->query($queryEdit);
        }
        header("Location: ./khsMhsPage.php");
    }
?>

<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>
    <div class="col p-4">
        <h1 class="d-flex justify-content-center">KHS</h1>
        <div class="card">

            <h1 class="card-header">Entry KHS</h1>
            <form class="card-body" method="POST" action="" enctype="multipart/form-data">
                <div class="row gx-5">
                    <div class="col">
                        <label>Semester</label>
                        <p><?php echo $smt?></p>
                    </div>
                    <div class="col">
                        <?php 
                            $query = "SELECT Ip, Ip_Kumulatif FROM tb_khs WHERE Nim = '".$nim."' AND Semester = '".$smt."' ";
                            $result = mysqli_query($db, $query);
                            // check result
                            if (mysqli_num_rows($result) > 0) {
                                $row = $result->fetch_object();
                                echo "<label>IP Semester</label>";
                                echo "<input type='text' name='ip' value='".$row->Ip."'><br>";
                                echo "<label>IP Komulatif</label>";
                                echo "<input type='text' name='ipk' value='".$row->Ip_Kumulatif."''>";
                            }
                            else{
                                echo "<label>IP Semester</label>";
                                echo "<input type='text' name='ip'><br>";
                                echo "<label>IP Komulatif</label>";
                                echo "<input type='text' name='ipk'>";
                            }
                        ?>
                    </div>
                </div>
                <!-- Input Matkul dan Kelas -->
                <div class="row mt-4 g-0">
                    <table>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Nilai</th>
                        </tr>
                        <tbody id="tambahKHS">
                        <?php
                            $query = "SELECT k.Kode_Matkul, k.Nama_Matkul as nama_mk, Nilai FROM tb_nilai n JOIN tb_matkul k 
                            WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
                            $result = $db->query($query);
                            if (!$result) {
                                die ("Could not query the database: <br>".$db->error);
                            }
                            else{
                                while ($row = $result->fetch_object()) {
                                    echo '<tr>';
                                    echo '<td>'.$row->nama_mk.'</td>';
                                    echo "<input type='hidden' name='mata_kuliah[]' value='".$row->Kode_Matkul."'>";
                                    echo "<td><input name='nilai[]' aria-label='Default select example' value='".$row->Nilai."'></td>";
                                    echo '</tr>';
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    
                </div>

                <h4 class="fw-bold">Upload KHS</h4>
                <div class="form-group d-flex flex-column mb-2">
                    <label for="uploadKhs">Upload File</label>
                    <input type="file" class="form-control-file" name="uploadKhs" id="uploadKhs">
                </div>
                <div class="d-flex mb-3">
                    <button type="submit" name="submit" class=" btn btn-primary mt-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php require_once '../bootstrap/footer.html' ?>
