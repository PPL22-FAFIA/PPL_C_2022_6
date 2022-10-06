<?php require_once("../lib/db_login.php");?>
<div class="container">
        <h1 class="d-flex justify-content-center">Dashboard Mahasiswa</h1>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Status Akademik</h4>
                        <p class="card-text">Dosen Wali</p>
                        <p class="card-text">NIP</p>
                        <div class="row text-center">
                            <div class="col">Semester</div>
                            <div class="col">Status</div>
                        </div>
                        <div class="row text-center">
                            <h1 class="col">5</h1>
                            <h3 class="col badge fs-4 text-bg-success text-white">Aktif</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" width="150" alt="gene">
                        <h3 class="m-0">Farrel</h3>
                        <p class="m-0">NIM</p>
                        <p class="m-0">Dosen</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Data Mahasiswa</h4>
                        <div class="mt-3">
                            <p class="m-0">Nama Lengkap</p>
                            <p class="fw-bold m-0">Abyan</p>
                        </div>
                        <div class="mt-3">
                            <p class="m-0">NIM</p>
                            <p class="fw-bold m-0">05111940000001</p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <!-- anchor editProfil -->
                            <a href="../mahasiswa/editProfilMhsPage.php" class="btn btn-primary mt-3">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Prestasi Akademik</h5>
                        <div class="row">
                            <div class="col">
                                <p class="text-center m-0">SKS semester</p>
                                <h3 class="text-center">93</h3>
                            </div>
                            <div class="col">
                                <p class="text-center m-0">SKS Kumulatif</p>
                                <h3 class="text-center">93</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-center m-0">IP semester</p>
                                <h3 class="text-center">93</h3>
                            </div>
                            <div class="col">
                                <p class="text-center m-0">IP Kumulatif</p>
                                <h3 class="text-center">93</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>