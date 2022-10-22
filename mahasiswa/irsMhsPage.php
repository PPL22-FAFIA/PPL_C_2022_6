<?php require_once '../bootstrap/header.html';
    require_once '../lib/db_login.php';
    session_start();

    $nim = $_SESSION['user']['Nim_Nip'];

    if(!isset($_SESSION['user'])){
        header("Location: ../auth/login.php");
    }
    else{
        $user = $_SESSION['user']['Role'];
        if($user!='1'){
            header("Location: ../index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $smt = $_POST['semester'];
        $sumIRS = 0;

        for ($i=0; $i < count($_POST['mata_kuliah']); $i++) { 
            $result = $db->query("INSERT INTO tb_nilai (Nim, Semester, Kode_Matkul, Kelas) VALUES ('$nim', '$smt', '".$_POST['mata_kuliah'][$i]."', '".$_POST['kelas'][$i]."')");

            // $sumIRS += $_POST['irs'][$i];
        }

        $result2 = $db->query("INSERT INTO tb_irs(Nim, Semester, Status, Jml_SKS) VALUES('$nim', '$smt', 'Aktif', '$sumIRS')");

        if ($result2):
        ?>
            <div class="alert alert-success">Data Tersimpan</div>
        <?php else: ?>
            <div class="alert alert-error">Data Gagal Disimpan <?php echo $db->error ?></div>
        }
        <?php endif; 
    }
?>
       

<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarMhs.php' ?>

    </div>
    <div class="col p-4">
        <h1 class="d-flex justify-content-center">IRS</h1>
        <div class="card">

            <h1 class="card-header">Data IRS</h1>
            <form class="card-body" method="POST" action="">
                <div class="row gx-5">
                    <div class="col">
                        <label>Semester</label>
                        <select class="form-select" name="semester" id="semester" aria-label="Default select example" onchange="showIRS(<?php echo $nim ?>, this.value)">
                            <option value="">Open this select menu</option>
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
                </div>

                <div class="" id="irs-mhs">
                </div>
            </form>
        </div>
    </div>
    
</div>

<script src="../js/ajax.js"></script>
<?php require_once '../bootstrap/footer.html' ?>
