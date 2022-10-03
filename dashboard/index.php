<?php include_once '../bootstrap/header.html' ?>
<?php $user = 2;
// switch case user
switch ($user) {
    case 1:
        include_once 'sidebarMhs.php';
        break;
    case 2:
        include_once 'sidebarDoswal.php';
        break;
    case 3:
        include_once 'sidebarDoswal.php';
        break;
    case 4:
        include_once 'sidebarDept.php';
        break;
}

?>
<?php include_once '../bootstrap/footer.html' ?>