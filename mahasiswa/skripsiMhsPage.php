<?php require_once '../bootstrap/header.html';
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
require_once("../lib/db_login.php");
$statusskripsi = $db->query("SELECT * FROM tb_skripsi WHERE Nim = '$nim'")->fetch_object();
$dosen = $db->query("SELECT * FROM tb_dosen WHERE Kode_Wali = '$statusskripsi->Kode_Pemb_S'");
?><div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>

    <div class="col p-4">
        <h1 class="mt-1 mb-3 d-flex justify-content-center">Skripsi</h1>
        <div class="card ms-2 me-2">

            <h3 class="card-header">Entry Skripsi</h3>
            <form class="card-body">
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                    <img class="ms-4 mt-3 img-thumbnail rounded p-3" src="../lib/pp.jpg" alt="profile" width="150">
                        <div class="col ms-3 my-auto">

                            <h4 class="fw-bold mt-3"><?php echo $_SESSION["dataMhs"]["Nama"] ?></h4>
                            <h5><?php echo $_SESSION["dataMhs"]["Nim"] ?></h5>
                            <h6>Dosen Pembimbing: <?php 
                            if($dosen->num_rows >0){
                                $dosen = $dosen->fetch_object();
                            echo $dosen->Nama ;
                            }
                            else{
                                echo "Belum ada dosen pembimbing";
                            }?></h6>
                        </div>
                        <div class="col-3">
                            <h5 class="fs-4 fw-bold mt-3 mb-2 text-center">Status</h5><?php
                        if ($_SESSION['dataMhs']['Status'] == "Aktif") {
                            echo '<h4 class="mx-auto rounded w-50 px-1 py-1 text-bg-success text-bg-success text-white text-center">'.$_SESSION["dataMhs"]["Status"].'</h5>';
                        } else if($_SESSION['dataMhs']['Status'] == "Cuti"){ 
                            echo '<h4 class="mx-auto rounded w-50 px-2 py-1 text-bg-primary text-white text-center">'.$_SESSION["dataMhs"]["Status"].'</h5>';
                        }
                        else{
                            echo '<h4 class="col badge fs-4 text-bg-danger text-white text-center">'.$_SESSION["dataMhs"]["Status"].'</h5>';
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-11 mt-3 mb-3">
                    <label class=" fs-5 fw-bold ms-4 mb-2">Status Skripsi</label>
                    <select class="ms-4 form-select" id="statusskripsi" name="statusskripsi" aria-label="Status Skripsi">
                        <option value="Sudah Ambil" <?php if ($statusskripsi->Status == "Sudah Ambil") echo "selected" ?>>Sudah Ambil</option>
                        <option value="Sedang Mengambil" <?php if ($statusskripsi->Status == "Sedang Mengambil") echo "selected" ?>>Sedang Mengambil</option>
                        <option value="Belum Ambil" <?php if ($statusskripsi->Status == "Belum Ambil") echo "selected" ?>>Belum Ambil</option>
                    </select>
                </div>
                <div class="col-11 mb-3">
                    <label for="nilai" class="fs-5 ms-4 fw-bold form-label">Nilai</label>
                    <!-- select option A-E -->
                    <select class="ms-4 form-select" id="nilai" name="nilai" aria-label="Nilai Skripsi">
                        <option value="A" <?php if ($statusskripsi->Nilai == "A") echo "selected" ?>>A</option>
                        <option value="B" <?php if ($statusskripsi->Nilai == "B") echo "selected" ?>>B</option>
                        <option value="C" <?php if ($statusskripsi->Nilai == "C") echo "selected" ?>>C</option>
                        <option value="D" <?php if ($statusskripsi->Nilai == "D") echo "selected" ?>>D</option>
                        <option value="E" <?php if ($statusskripsi->Nilai == "E") echo "selected" ?>>E</option>
                    </select></div>
                <div class="col">
                    <h4 class="ms-4 mt-4 fw-bold">Upload Scan Berita Acara</h4>
                <div class="form-group d-flex mb-2">
                    <!--<label for="exampleFormControlFile1" class="ms-4 mb-2">Upload File</label>-->
                    <p><button type="button" onclick="btnFilePick()" id="btn_file_pick" class="ms-4 btn btn-warning mt-3"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
                    <p id="file_info"></p>
                    <p><button type="button" onclick="btnUpload()" id="btn_upload" class="ms-4 btn btn-primary mt-3"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
                    <input type="file" hidden id="selectfile">
                    <p id="message_info"></p>
                </div>

                <div class="d-flex justify-content-center">
                    <div>
                        <button class="btn btn-success ms-4" type="button" onclick="editSkripsi()">Simpan</button>
                        <div id="responseedit"></div>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../js/ajax.js"></script>
<?php require_once '../bootstrap/footer.html' ?>
<script>
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
            $.ajax({
                type: 'POST',
                url: '../function/upload_skripsi.php',
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