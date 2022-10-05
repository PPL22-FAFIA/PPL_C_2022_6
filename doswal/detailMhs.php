<?php
require_once('../bootstrap/header.html');
require_once('../dashboard/db_login.php');
?>

<div class="content w-75 border rounded m-auto">
    <div class="profile-mhs d-flex m-auto">
        <div class="tengah d-flex">
            <div class="card">
                <div class="card-body">
                    <div class="summary-mhs m-auto">
                        <title> Prestasi Akademik</title>
                        <div class="nilai d-flex p-5">
                            <div class="left me-2">
                                <div class="sub-value">
                                    <div class="title-value fw-bold">SKS Semester</div>
                                    <div class="value text-center">92</div>
                                </div>
                                <div class="sub-value">
                                    <div class="title-value fw-bold">IP Semester Lalu</div>
                                    <div class="value text-center">3.70</div>
                                </div>
                            </div>
                            <div class="right ms-2">
                                <div class="sub-value">
                                    <div class="title-value fw-bold">SKS Kumulatif</div>
                                    <div class="value text-center">124</div>
                                </div>
                                <div class="sub-value">
                                    <div class="title-value fw-bold">IP Kumulatif</div>
                                    <div class="value text-center">3.80</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="profile w-50 card">
                        <div class="profile-img">
                            <img class="img-thumbnail rounded p-3" src="../lib/lecture.jpg" alt="profile">
                        </div>
                        <div class="profile-name text-center">
                            <h3>Farrel</h3>
                            <p>NIM</p>
                            <p>S1 - Informatika</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="w-100 mx-2" />
<div class="semester">
    <div class="input">
        <form action="POST">
            <select class="form-select w-25 mt-4">
                <option selected>Pilih angkatan...</option>
                <option value="1">2016</option>
                <option value="2">2017</option>
                <option value="3">2018</option>
                <option value="4">2019</option>
                <option value="5">2020</option>
                <option value="6">2021</option>
                <option value="7">2022</option>
            </select>
        </form>
    </div>
    <div class="nilai-mhs">

    </div>
</div>
<div class="pkl">

</div>
<div class="skripsi">

</div>
</div>