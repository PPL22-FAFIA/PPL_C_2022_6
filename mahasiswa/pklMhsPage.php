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
$dosen = $db->query("SELECT * FROM tb_dosen WHERE Kode_Wali = '$statuspkl->Kode_Pemb_P'");
?>

<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>

    <div class="col p-4">
        <h1 class="mt-1 mb-3 d-flex justify-content-center">PKL</h1>
        <div class="card ms-2 me-2">
            <h3 class="card-header">Entry PKL</h3>
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
                                                echo '<h4 class=" mx-auto rounded w-50 px-1 py-1 text-bg-success text-white text-center">' . $_SESSION["dataMhs"]["Status"] . '</h4>';
                                            } else if ($_SESSION['dataMhs']['Status'] == "Cuti") {
                                                echo '<h5 class=" mx-auto rounded w-50 px-2 py-1 text-bg-primary text-white text-center">' . $_SESSION["dataMhs"]["Status"] . '</h5>';
                                            } else {
                                                echo '<h5 class="  mx-auto rounded w-50 px-2 py-1 text-bg-danger text-white text-center">' . $_SESSION["dataMhs"]["Status"] . '</h5>';
                                            }
                                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-11 mt-3 mb-3">
                    <label class=" fs-5 fw-bold ms-4 mb-2">Status PKL</label>
                    <select class="ms-4 form-select" id="statuspkl" name="statuspkl" aria-label="Default select example">
                        <option value="Sudah Ambil" <?php if ($statuspkl->Status == "Sudah Ambil") echo "selected" ?>>Sudah Ambil</option>
                        <option value="Sedang Mengambil" <?php if ($statuspkl->Status == "Sedang Mengambil") echo "selected" ?>>Sedang Mengambil</option>
                        <option value="Belum Ambil" <?php if ($statuspkl->Status == "Belum Ambil") echo "selected" ?>>Belum Ambil</option>
                    </select>
                </div>
                <div class="col-11 mb-3">
                    <label for="nilai" class="fs-5 ms-4 fw-bold form-label">Nilai</label>
                    <!-- select option A-E -->
                    <select class="ms-4 form-select" id="nilai" name="nilai" aria-label="Default select example">
                        <option value="A" <?php if ($statuspkl->Nilai == "A") echo "selected" ?>>A</option>
                        <option value="B" <?php if ($statuspkl->Nilai == "B") echo "selected" ?>>B</option>
                        <option value="C" <?php if ($statuspkl->Nilai == "C") echo "selected" ?>>C</option>
                        <option value="D" <?php if ($statuspkl->Nilai == "D") echo "selected" ?>>D</option>
                        <option value="E" <?php if ($statuspkl->Nilai == "E") echo "selected" ?>>E</option>
                    </select></div>
                <div class="ms-4 mt-3 col-11">
                    <label class="fs-5 fw-bold mb-2">Tempat PKL</label>
                    <input class="form-group form-control" type="text" id="tempat" name="tempat" value="<?= $statuspkl->Tempat?>">
                </div>
                
                <h4 class="ms-4 mt-4 fw-bold">Upload Scan Berita Acara</h4>
                <div class="form-group d-flex flex-column">
                    <label for="exampleFormControlFile1" class="ms-4 mb-2">Upload File</label>
                    <p><button type="button" onclick="btnFilePick()" id="btn_file_pick" class="ms-4 btn btn-warning d-flex justify-content-between"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
                    <p id="file_info"></p>
                    <p><button type="button" onclick="btnUpload()" id="btn_upload" class="ms-4 btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
                    <input type="file" hidden id="selectfile">
                    <p id="message_info"></p>
                </div>
                <button class="ms-4 btn btn-success" type="button" onclick="editPKL()">Simpan</button>
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