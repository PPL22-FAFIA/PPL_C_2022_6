<?php require_once '../bootstrap/header.html' ?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarOp.php' ?>

    </div>
    <div class="col p-4">
        <h1 class="d-flex justify-content-center">Add User</h1>
        <div class="card">
            <form class="card-body">
                    <div class="form-group mt-3">
                        <label class="fw-bold">Nama</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">NIM/NIP</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Username</label>
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
                        <label class="fw-bold">Password</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Role</label>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <!-- button update data -->
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary fw-bold mt-4">Upload Data</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require_once '../bootstrap/footer.html' ?>