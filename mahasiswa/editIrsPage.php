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
    $smt = $_POST['semester'];
    
    if (isset($_POST['submit'])) {
        for ($i=0; $i < count($_POST['mata_kuliah']); $i++) {
            if ($_POST['mata_kuliah'][$i] != "" && $_POST['kelas'][$i] != "") {
                $result = $db->query("UPDATE tb_nilai SET 'Nilai' = '".$_POST['nilai'][$i]."' WHERE 'Kode_Matkul' = '".$_POST['mata_kuliah'][$i]."', '");
            }
        }

        $query3 = "SELECT SUM(SKS) as TotalSKS FROM tb_nilai n JOIN tb_matkul k WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
        $sumSKS = $db->query($query3)->fetch_object();
        if ($sumSKS->TotalSKS != null){
            $result2 = $db->query("INSERT INTO tb_irs(Nim, Semester, Status, Jml_SKS) VALUES('$nim', '$smt', 'Aktif', '".$sumSKS->TotalSKS."')");
        }
        else{
            ?> <div class="alert alert-error">Data Gagal Disimpan <?php echo $db->error ?></div> <?php
        }
    }
?>

<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>
    <div class="col p-4">
        <h1 class="d-flex justify-content-center">IRS</h1>
        <div class="card">

            <h1 class="card-header">Edit Data IRS</h1>
            <form class="card-body" method="POST" action="">
                <div class="row gx-5">
                    <div class="col">
                        <label>Semester</label>
                        <select class="form-select" name="semester" id="semester" aria-label="Default select example">
                            <option value="">Open this select menu</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
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
                    <label for="editIRS">Edit IRS</label>
                    <table>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                        </tr>
                        <tbody id="editIRS">
                        <?php
                            $query = "SELECT k.Kode_Matkul, k.Nama_Matkul as nama_mk, Kelas FROM tb_nilai n JOIN tb_matkul k 
                            WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
                            $result = $db->query($query);
                            if (!$result) {
                                die ("Could not query the database: <br>".$db->error);
                            }
                            else{
                                while ($row = $result->fetch_object()) {
                                    echo '<tr>';
                                    echo "<td> <input name='edit_mk[]' aria-label='Default select example' value='".$row->nama_mk."' disabled='true'></td>";
                                    echo "<td><input name='edit_kelas[]' aria-label='Default select example' placeholder='".$row->Kelas."'></td>";
                                    echo "<td><button>Hapus</button></td>";
                                    echo '</tr>';
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    
                    <label for="tambahIRS">Tambah IRS</label>
                    <table>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                        </tr>
                        <tbody id="tambahIRS">
                        </tbody>
                    </table>
                </div>

                <div class="text-center">
                    <!-- button to add new row mata kuliah -->
                    <button type="button" class="btn btn-outline-dark fw-bold mt-4 rounded-circle" onclick="addEntryIRS()">+</button>
                </div>

                <h4 class="fw-bold">Upload IRS</h4>
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

<script>
    function addEntryIRS() {
        var html = "<tr>";
            html = html + "<td><select class='form-select' id='mata_kuliah' name='mata_kuliah[]' aria-label='Default select example'>";
            html = html + "<option selected>Pilih Mata Kuliah</option>";
            <?php $result = $db->query('select * from tb_matkul'); 
                while ($mk = $result->fetch_object()): ?>
                    html = html + "<option value='<?php echo $mk->Kode_Matkul ?>'><?php echo $mk->Nama_Matkul ?></option>";
            <?php endwhile ?>
            html = html + "</select></td>";

            html = html + "<td><input name='nilai[]' aria-label='Default select example' placeholder='Kelas'></td>";
        html += "<tr>"
        document.getElementById("tambahIRS").insertRow().innerHTML += html;
    }
</script>
<script src="../js/ajax.js"></script>
<?php require_once '../bootstrap/footer.html' ?>
