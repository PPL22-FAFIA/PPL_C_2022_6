<?php require_once '../bootstrap/header.html' ?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarOp.php' ?>

    </div>
    <div class="col p-4">
    <h1 class="d-flex justify-content-center">Cari User</h1>
        <div class="d-flex flex-row col-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                aria-describedby="button-addon2" class="f">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Filter</button>
        </div>
    <div class="row mt-3">
        <div class="card">
            <form class="card-body"></form>
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                        <img src="" alt="kosong" class="col-1">
                        <div class="col">
                            <h5 class="card-text">Abyan</h5>
                            <h5 class="p-0">201910370311001</h5>
                            <p class="p-0">Mahasiswa</p>
                        </div>
                        <div class="text-center">
                            <a href="editDataMhs.php" class="btn btn-primary fw-bold mt-4">Edit</a>
                        </div>
                    </div>
            </div>
        </div> 
    </div>

    <div class="row mt-3">
        <div class="card">
            <form class="card-body"></form>
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                        <img src="" alt="kosong" class="col-1">
                        <div class="col">
                            <h5 class="card-text">Farhan</h5>
                            <h5 class="p-0">391284431127</h5>
                            <p class="p-0">Dosen Wali</p>
                        </div>
                        <div class="text-center">
                            <a href="editDataDoswal.php" class="btn btn-primary fw-bold mt-4">Edit</a>
                        </div>
                    </div>
                </div>
        </div> 
    </div>

    <div class="row mt-3">
        <div class="card">
            <form class="card-body"></form>
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                        <img src="" alt="kosong" class="col-1">
                        <div class="col">
                            <h5 class="card-text">Farrel</h5>
                            <h5 class="p-0">1254809</h5>
                            <p class="p-0">Operator</p>
                        </div>
                        <div class="text-center">
                            <a href="editDataOp.php" class="btn btn-primary fw-bold mt-4">Edit</a>
                        </div>
                    </div>
            </div>
        </div> 
    </div>

    <div class="row mt-3">
        <div class="card">
            <form class="card-body"></form>
                <div class="row gx-5 d-flex">
                    <div class="d-flex flex-row">
                        <img src="" alt="kosong" class="col-1">
                        <div class="col">
                            <h5 class="card-text">Arif</h5>
                            <h5 class="p-0">391863754398</h5>
                            <p class="p-0">Departemen</p>
                        </div>
                        <div class="text-center">
                            <a href="editDataDept.php" class="btn btn-primary fw-bold mt-4">Edit</a>
                        </div>
                    </div>
            </div>
        </div> 
    </div>
    

        
<?php require_once '../bootstrap/footer.html' ?>