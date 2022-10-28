<?php require_once '../bootstrap/header.html';
require_once '../lib/db_login.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
} else {
    $user = $_SESSION['user']['Role'];
    if ($user != '1') {
        header("Location: ../index.php");
    }
}
$nim = $_SESSION['user']['Nim_Nip'];
$query = "SELECT * FROM tb_mhs WHERE Nim = '$nim'";
// execute query
$result = mysqli_query($db, $query);
// check result
if (mysqli_num_rows($result) > 0) {
    // get data
    $data = mysqli_fetch_assoc($result);
    // set session
    $_SESSION['dataMhs'] = $data;
}
$statuspkl = $db->query("SELECT * FROM tb_pkl WHERE Nim = '$nim'")->fetch_object();
?>

<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>

    <div class="col p-4">
        <h1 class="d-flex justify-content-center">PKL</h1>
        <div class="card">
            <h1 class="card-header">Entry PKL</h1>
            <form class="card-body">
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                        <img class="img-thumbnail rounded p-3" src="../lib/pp.jpg" alt="profile" width="150">
                        <div class="col ms-3">

                            <h5 class="mt-3"><?php echo $_SESSION["dataMhs"]["Nama"] ?></h5>
                            <p><?php echo $_SESSION["dataMhs"]["Nim"] ?></p>
                        </div>
                        <div class="col-3">
                            <h4>Status</h4><?php
                                            if ($_SESSION['dataMhs']['Status'] == "Aktif") {
                                                echo '<h3 class="col badge fs-4 text-bg-success text-white">' . $_SESSION["dataMhs"]["Status"] . '</h3>';
                                            } else if ($_SESSION['dataMhs']['Status'] == "Cuti") {
                                                echo '<h3 class="col badge fs-4 text-bg-primary text-white">' . $_SESSION["dataMhs"]["Status"] . '</h3>';
                                            } else {
                                                echo '<h3 class="col badge fs-4 text-bg-danger text-white">' . $_SESSION["dataMhs"]["Status"] . '</h3>';
                                            }
                                            ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label>Status PKL</label>
                    <select class="form-select" id="statuspkl" name="statuspkl" aria-label="Default select example">
                        <option value="Sudah Ambil" <?php if ($statuspkl->Status == "Sudah Ambil") echo "selected" ?>>Sudah Ambil</option>
                        <option value="Sedang Mengambil" <?php if ($statuspkl->Status == "Sedang Mengambil") echo "selected" ?>>Sedang Mengambil</option>
                        <option value="Belum Ambil" <?php if ($statuspkl->Status == "Belum Ambil") echo "selected" ?>>Belum Ambil</option>
                    </select>
                </div>
                <div class="col">
                    <label>Tempat PKL</label>
                </div>
                <input class="form-group" type="text" id="tempat" name="tempat">
                <h4 class="fw-bold">Upload Scan Berita Acara</h4>
                <div class="form-group d-flex flex-column mb-2">
                    <label for="exampleFormControlFile1">Upload File</label>
                    <p><button type="button" onclick="btnFilePick()" id="btn_file_pick" class="btn btn-primary"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
                    <p id="file_info"></p>
                    <p><button type="button" onclick="btnUpload()" id="btn_upload" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
                    <input type="file" hidden id="selectfile">
                    <p id="message_info"></p>
                </div>
                <button class="btn btn-primary mt-3" type="button" onclick="editPKL()">Simpan</button>
                <div id="responseedit"></div>
            </form>
        </div>
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
                url: '../function/upload_pkl.php',
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