<?php
$_GET['status'];
if($_GET['status'] == 'Sudah Ambil'){
    echo '<div class="col-11 mb-3" id="divnilai">
    <label for="nilai" class="fs-5 ms-4 fw-bold form-label">Nilai</label>
<!-- select option A-E -->
<select class="ms-4 form-select" id="nilai" name="nilai" aria-label="Nilai Skripsi" required>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
</select>
</div>
<div class="col" id="divupload">
    <h4 class="ms-4 mt-4 fw-bold">Upload Scan Berita Acara</h4>
    <div class="form-group d-flex mb-2">
        <!--<label for="exampleFormControlFile1" class="ms-4 mb-2">Upload File</label>-->
        <p><button type="button" onclick="btnFilePick()" id="btn_file_pick" class="ms-4 btn btn-warning mt-3"><span class="glyphicon glyphicon-folder-open"></span> Select File</button></p>
        <p id="file_info"></p>
        <p><button type="button" onclick="btnUpload()" id="btn_upload" class="ms-4 btn btn-primary mt-3"><span class="glyphicon glyphicon-arrow-up"></span> Upload To Server</button></p>
        <input type="file" hidden id="selectfile">
        <p id="message_info"></p>
    </div>
</div>';
}
else{
    echo '';
}
