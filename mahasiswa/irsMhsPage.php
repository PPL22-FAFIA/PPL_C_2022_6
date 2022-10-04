<?php require_once '../bootstrap/header.html' ?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>
</div>
<div class="col p-4">
    <h1 class="d-flex justify-content-center">IRS</h1>
    <div class="card">

        <h1 class="card-header">Entry IRS</h1>
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
            <div class="row mt-4 g-0">
                <div class="col me-0">
                    <label>Mata Kuliah</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-3 ms-0">
                    <label>Kelas</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <!-- button to add new row mata kuliah -->
                <button type="button" class="btn btn-outline-dark fw-bold mt-4 rounded-circle">+</button>
            </div>
            <h4 class="fw-bold">Upload IRS</h4>
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
<?php require_once '../bootstrap/footer.html' ?>