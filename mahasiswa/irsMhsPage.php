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
?>
       

<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>
    <div class="col p-4">
        <h1 class="d-flex justify-content-center">IRS</h1>
        <div class="card">

            <h1 class="card-header">Entry IRS</h1>
            <form class="card-body">
                <div class="row gx-5">
                    <div class="col">
                        <label>Semester</label>
                        <select class="form-select" id="semester" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Tahun Ajaran</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="2020/2021">2016/2017</option>
                            <option value="2020/2021">2017/2018</option>
                            <option value="2020/2021">2018/2019</option>
                            <option value="2020/2021">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                            <option value="2022/2023">2022/2023</option>
                        </select>
                    </div>
                </div>
                <!-- Input Matkul dan Kelas -->
                <div class="row mt-4 g-0">
                    <table>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                        </tr>
                        <tbody id="tambahIRS"></tbody>
                    </table>
                </div>

                <div class="text-center">
                    <!-- button to add new row mata kuliah -->
                    <button type="button" class="btn btn-outline-dark fw-bold mt-4 rounded-circle" onclick="addEntryIRS()">+</button>
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
    
</div>
<script src="../js/script.js"></script>
<?php require_once '../bootstrap/footer.html' ?>
