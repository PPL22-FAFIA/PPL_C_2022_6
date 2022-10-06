<?php require_once '../bootstrap/header.html' ?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarOp.php' ?>

    </div>
    <div class="col p-4">
    <h1 class="d-flex justify-content-center">Edit Data Operator</h1>
    <div class="row">
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
                            <button type="submit" class="btn btn-primary fw-bold mt-4">Edit</button>
                        </div>
                    </div>
            </div>
        </div> 
        <form class="card-body">
                    <div class="form-group mt-3">
                        <label class="fw-bold">Nama</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Status</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">No.Telepon</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Alamat</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Provinsi</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Kabupaten</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <!-- button update data -->
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary fw-bold mt-4">Update Data</button>
                </div>
        </form>
    </div>
    </div>