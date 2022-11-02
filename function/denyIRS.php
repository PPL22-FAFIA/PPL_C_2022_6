<?php
    require_once('../lib/db_login.php');

    $nim = $_POST['nim'];
    $smt = $_POST['smt'];

    
    $query1 = "UPDATE tb_irs SET Status='Belum Disetujui' WHERE Nim = '$nim' AND Semester = '$smt'";
    $result1 = $db->query($query1);
    if (!$result1) {
        die("Could not query the database: <br />" . $db->error);
    } else {
        echo '<div id="setujui"  class="alert alert-danger" role="alert">IRS Batal Disetujui</div>';;   
    }