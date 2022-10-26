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
        for ($i=0; $i < count($_POST['edit_mk']); $i++) {
            if ($_POST['edit_mk'][$i] != "" && $_POST['edit_kelas'][$i] != "") {
                $editKelas = $_POST['edit_kelas'][$i];
                $kodeMatkul = $_POST['edit_mk'][$i];
                $queryEdit = "UPDATE tb_nilai SET Kelas = '$editKelas' WHERE Kode_Matkul = '$kodeMatkul' AND Nim = '$nim' AND Semester = '$smt'";
                $result = $db->query($queryEdit);
            }
        }
        
        for ($i=0; $i < count($_POST['mata_kuliah']); $i++) {
            $kodeMatkul = $_POST['mata_kuliah'][$i];
            $editKelas = $_POST['kelas'][$i];
            if ($kodeMatkul != "" && $editKelas != "") {
                $query4 = "SELECT * FROM tb_nilai WHERE Nim = '$nim' AND Semester = '$smt' AND Kode_Matkul = '$kodeMatkul'";
                $result = mysqli_query($db, $query4);
                if (mysqli_num_rows($result) == 0) {
                    $result = $db->query("INSERT INTO tb_nilai (Nim, Semester, Kode_Matkul, Kelas) VALUES ('$nim', '$smt', '".$kodeMatkul."', '".$editKelas."')");
                }
            }
        }

        $query3 = "SELECT SUM(SKS) as TotalSKS FROM tb_nilai n JOIN tb_matkul k WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
        $sumSKS = $db->query($query3)->fetch_object();
        if ($sumSKS->TotalSKS != null){
            $result2 = $db->query("UPDATE tb_irs SET Jml_SKS = '$sumSKS->TotalSKS' WHERE Nim = '$nim' AND Semester = '$smt'");
        }
        else{
            ?> <div class="alert alert-error">Data Gagal Disimpan <?php echo $db->error ?></div> <?php
        }
        header("Location: ./irsMhsPage.php");
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
                        <p><?php echo $smt?></p>
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
                            $query = "SELECT * FROM tb_nilai n JOIN tb_matkul k 
                            WHERE n.Kode_Matkul = k.Kode_Matkul AND n.Nim = '".$nim."' AND n.Semester = '".$smt."' ";
                            $result = $db->query($query);
                            if (!$result) {
                                die ("Could not query the database: <br>".$db->error);
                            }
                            else{
                                while ($row = $result->fetch_object()) {
                                    echo '<tr>';
                                    echo '<td>'.$row->Nama_Matkul.'</td>';
                                    echo "<input type='hidden' name='edit_mk[]' value='".$row->Kode_Matkul."'>";
                                    echo "<td><input name='edit_kelas[]' aria-label='Default select example' value='".$row->Kelas."'></td>";
                                    echo "<td><button type='button' onclick='deleteIRS($row->Nim, $row->Nama_Matkul, $row->Kelas, $smt)'>Hapus</button></td>";
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
                            <td><select class='form-select' id='mata_kuliah' name='mata_kuliah[]' aria-label='Default select example'>
                                <option selected>Pilih Mata Kuliah</option>
                                <?php $result = $db->query('select * from tb_matkul'); 
                                    while ($mk = $result->fetch_object()): ?>
                                        <option value='<?php echo $mk->Kode_Matkul ?>'><?php echo $mk->Nama_Matkul ?></option>;
                                <?php endwhile ?>
                            </select></td>
                            <td><input name='kelas[]' aria-label='Default select example' placeholder='Kelas'></td>
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
            html = html + "<option>Pilih Mata Kuliah</option>";
            <?php $result = $db->query('select * from tb_matkul'); 
                while ($mk = $result->fetch_object()): ?>
                    html = html + "<option value='<?php echo $mk->Kode_Matkul ?>'><?php echo $mk->Nama_Matkul ?></option>";
            <?php endwhile ?>
            html = html + "</select></td>";

            html = html + "<td><input name='kelas[]' aria-label='Default select example' placeholder='Kelas'></td>";
        html += "<tr>"
        document.getElementById("tambahIRS").insertRow().innerHTML += html;
    }
</script>
<script src="../js/ajax.js"></script>
<?php require_once '../bootstrap/footer.html' ?>
