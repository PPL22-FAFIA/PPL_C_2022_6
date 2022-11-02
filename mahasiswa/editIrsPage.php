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
        <div class="card mt-3">

            <h3 class="card-header">Edit Data IRS</h3>
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
                                    echo '<td>'.$row->Kelas.'</td>';
                                    echo "<input type='hidden' name='edit_mk[]' value='".$row->Kode_Matkul."'>";
                                    echo "<td><button class='btn btn-danger' type='button' onclick='deleteIRS($row->Nim, $row->Nama_Matkul, $row->Kelas, $smt)'>Hapus</button></td>";
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
                            <td><input class="form-control" name='kelas[]' aria-label='Default select example' placeholder='Kelas'></td>
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
                    <p><button type="button" onclick="btnFilePick()" id="btn_file_pick" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
                    <p id="file_info"></p>
                    <p><button type="button" onclick="btnUpload()" id="btn_upload" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
                    <input type="file" hidden id="selectfile">
                    <p id="message_info"></p>
                </div>
                <div class="d-flex mb-3">
                    <button type="submit" name="submit" class=" btn btn-success mt-3">Simpan</button>
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

            html = html + "<td><input class='form-control' name='kelas[]' aria-label='Default select example' placeholder='Kelas'></td>";
        html += "<tr>"
        document.getElementById("tambahIRS").insertRow().innerHTML += html;
    }
    var fileobj;
    function btnFilePick() {
        /*normal file pick*/
        document.getElementById('selectfile').click();
        document.getElementById('selectfile').onchange = function() {
            fileobj = document.getElementById('selectfile').files[0];
            var fname = fileobj.name;
            var fsize = fileobj.size;
            if (fname.length > 0) {
                document.getElementById('file_info').innerHTML = "File name : " + fname + ' <br>File size : ' + bytesToSize(fsize);
            }
            document.getElementById('btn_upload').style.display = "inline";
        };
    }
    function btnUpload() {
        if (fileobj == "" || fileobj == null) {
            alert("Please select a file");
            return false;
        } else {
            ajax_file_upload(fileobj);
        }
    }

    function ajax_file_upload(file_obj) {
        if (file_obj != undefined) {
            var form_data = new FormData();
            form_data.append('upload_file', file_obj);
            form_data.append('semester', <?= $smt?>);
            console.log(form_data);
            $.ajax({
                type: 'POST',
                url: '../function/upload_irs.php',
                contentType: false,
                processData: false,
                data: form_data,
                beforeSend: function(response) {
                    $('#message_info').html("Uploading your file, please wait...");
                },
                success: function(response) {
                    $('#message_info').html(response);
                    alert(response);
                    $('#selectfile').val('');
                }
            });
        }
    }

    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Byte';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
</script>
<script src="../js/ajax.js"></script>
<?php require_once '../bootstrap/footer.html' ?>
