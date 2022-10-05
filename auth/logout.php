<?php
//File : logout.php
//Deskripsi : untuk logout (menghapus session yang dibuat saat login)
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy();
}
header('Location: login.php');
?>