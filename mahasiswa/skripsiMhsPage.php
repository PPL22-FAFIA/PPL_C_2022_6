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
$statuspkl = $db->query("SELECT * FROM tb_skripsi WHERE Nim = '$nim'")->fetch_object();
?><div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>

    <div class="col p-4">
        <h1 class="d-flex justify-content-center">Skripsi</h1>
        <div class="card">

            <h1 class="card-header">Entry Skripsi</h1>
            <form class="card-body">
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                    <img class="img-thumbnail rounded p-3" src="../lib/pp.jpg" alt="profile" width="150">
                        <div class="col ms-3">

                            <h5 class="mt-3"><?php echo $_SESSION["dataMhs"]["Nama"] ?></h5>
                            <p><?php echo $_SESSION["dataMhs"]["Nim"] ?></p>
                        </div>
                        <div class="col-3">
                            <h4 class="text-center">Status</h4><?php
                        if ($_SESSION['dataMhs']['Status'] == "Aktif") {
                            echo '<h5 class="mx-auto rounded w-50 px-1 py-1 text-bg-success text-bg-success text-white text-center">'.$_SESSION["dataMhs"]["Status"].'</h5>';
                        } else if($_SESSION['dataMhs']['Status'] == "Cuti"){ 
                            echo '<h5 class="mx-auto rounded w-50 px-2 py-1 text-bg-primary text-white text-center">'.$_SESSION["dataMhs"]["Status"].'</h5>';
                        }
                        else{
                            echo '<h5 class="col badge fs-4 text-bg-danger text-white text-center">'.$_SESSION["dataMhs"]["Status"].'</h5>';
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label>Status Skripsi</label>
                    <select class="form-select" id="statuspkl" name="statuspkl" aria-label="Default select example">
                        <option value="Sudah Ambil" <?php if ($statuspkl->Status == "Sudah Ambil") echo "selected" ?>>Sudah Ambil</option>
                        <option value="Sedang Mengambil" <?php if ($statuspkl->Status == "Sedang Mengambil") echo "selected" ?>>Sedang Mengambil</option>
                        <option value="Belum Ambil" <?php if ($statuspkl->Status == "Belum Ambil") echo "selected" ?>>Belum Ambil</option>
                    </select>
                </div>
                <div class="col">
                    <h4 class="fw-bold">Upload Scan Berita Acara</h4>
                <div class="form-group d-flex flex-column mb-2">
                    <label for="exampleFormControlFile1">Upload File</label>
                    <p><button type="button" onclick="btnFilePick()" id="btn_file_pick" class="btn btn-warning"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
                    <p id="file_info"></p>
                    <p><button type="button" onclick="btnUpload()" id="btn_upload" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
                    <input type="file" hidden id="selectfile">
                    <p id="message_info"></p>
                </div>
                <button class=" btn btn-success mt-3">Simpan</button>

                </div>
            </form>
        </div>
    </div>
</div>
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