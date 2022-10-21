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
?><div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>

    <div class="col p-4">
        <h1 class="d-flex justify-content-center">KHS</h1>
        <div class="card">

            <h1 class="card-header">Entry KHS</h1>
            <form class="card-body">
                <div class="row gx-5">
                    <div class="col">
                        <label>Semester</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Tahun Ajaran</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <!-- Input Matkul dan Nilai -->
                <div class="row mt-4 g-0">
                    <table>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Nilai</th>
                        </tr>
                        <tbody id="tambahKHS"></tbody>
                    </table>
                </div>

                <div class="text-center">
                    <!-- button to add new row mata kuliah -->
                    <button type="button" class="btn btn-outline-dark fw-bold mt-4 rounded-circle" onclick="addEntryKHS()">+</button>
                </div>
                <h4 class="fw-bold">Upload KHS</h4>
                <div class="form-group d-flex flex-column mb-2">
                    <label for="exampleFormControlFile1">Upload File</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="d-flex mb-3">
                    <button class="me-auto btn btn-primary mt-3">Upload</button>
                    <button class=" btn btn-primary mt-3">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../js/script.js"></script>
<?php require_once '../bootstrap/footer.html' ?>