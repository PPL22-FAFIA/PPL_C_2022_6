<?php include_once '../bootstrap/header.html' ?>
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
}
?>
<div class="row g-0">
    <div class="col-2">

        <?php
        $user = $_SESSION['user']['Role'];
        // switch case user
        switch ($user) {
            case 1:
                include_once 'sidebarMhs.php';
                break;
            case 2:
                include_once 'sidebarDoswal.php';
                break;
            case 3:
                include_once 'sidebarOp.php';
                break;
            case 4:
                include_once 'sidebarDept.php';
                break;
        }
        ?>
    </div>
    <div class="col">
        <!-- switch user dashboard -->
        <?php
        switch ($user) {
            case 1:
                include_once 'dashboardMhs.php';
                break;
            case 2:
                include_once 'dashboardDoswal.php';
                break;
            case 3:
                include_once 'dashboardOp.php';
                break;
            case 4:
                include_once 'dashboardDept.php';
                break;
        }
        ?>
    </div>
</div>

<?php include_once '../bootstrap/footer.html' ?>