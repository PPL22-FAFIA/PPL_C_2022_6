<?php

require_once('../lib/db_login.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->query("select * from tb_matkul where Semester='$id'");
    ?>
    <option value="0">Pilih mata kuliah</option>
    <?php while ($data = $result->fetch_object()): ?>
        <option value="<?php echo $data->id ?>"><?php echo $data->Nama_Matkul ?></option>
    <?php
    endwhile;
}