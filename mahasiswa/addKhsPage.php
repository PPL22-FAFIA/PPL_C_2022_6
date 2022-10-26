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

        // $query3 = "SELECT SUM(SKS) as TotalSKS FROM tb_nilai n JOIN tb_matkul k WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
        // $sumSKS = $db->query($query3)->fetch_object();
        // if ($sumSKS->TotalSKS != null){
        //     $result2 = $db->query("INSERT INTO tb_irs(Nim, Semester, Status, Jml_SKS) VALUES('$nim', '$smt', 'Aktif', '".$sumSKS->TotalSKS."')");
        // }
        // else{
        // }
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
            <form class="card-body" method="POST" action="">
                <div class="row gx-5">
                    <div class="col">
                        <label>Semester</label>
                        <p><?php echo $smt?></p>
                    </div>
                    <div class="col">
                        <label>Tahun Ajaran</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="2020/2021">2016/2017</option>
                            <option value="2020/2021">2017/2018</option>
                            <option value="2020/2021">2018/2019</option>
                            <option value="2020/2021">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                            <option value="2022/2023">2022/2023</option>
                        </select>
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
                    <label for="exampleFormControlFile1">Upload File</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="d-flex mb-3">
                    <button class="me-auto btn btn-primary mt-3">Upload</button>
                    <button type="submit" name="submit" class=" btn btn-primary mt-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php require_once '../bootstrap/footer.html' ?>
