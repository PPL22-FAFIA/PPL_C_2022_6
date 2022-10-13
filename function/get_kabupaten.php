<?php

require_once('../lib/db_login.php');

if (isset($_GET['id_prov'])) {
    $id = $_GET['id_prov'];
    $query= "SELECT * from tb_kabupaten WHERE Kode_Provinsi='".$id."'";
    $result = $db->query($query);
    ?>
    <option value="0">Pilih Kabupaten</option>
    <?php while ($data = $result->fetch_object()): ?>
        <option value="<?php echo $data->Kode_Kabupaten ?>"><?php echo $data->Nama_Kabupaten ?></option>
    <?php
    endwhile;
}