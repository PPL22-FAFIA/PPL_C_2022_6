<!-- login form -->
<?php require_once("../bootstrap/header.html");
session_start();
if (isset($_POST['submit'])) {
    // include db connection
    require_once("../lib/db_login.php");
    // get username password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // query
    $query = "SELECT * FROM tb_user WHERE Username = '$username' AND Password = '$password'";
    // execute query
    $result = mysqli_query($db, $query);
    // check result
    if (mysqli_num_rows($result) > 0) {
        // get data
        $data = mysqli_fetch_assoc($result);
        // set session
        $_SESSION['user'] = $data;
        // redirect
        header("Location: ../dashboard/index.php");
    } else {
        // set error
        $error = "Username atau password salah";
    }
}
?>

<div class="content-body" style="height:100vh; background-image: url('../lib/background.jpg')">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh ;">
        <div class="login mb-5" style="width: 20%;">
            <div class="card-header">
                <div class="card-title text-center mb-4">
                    <img src="https://sso.undip.ac.id/assets/app/images/logo-undip.png" alt="Universitas Diponegoro" style="width: 70%;">
                    <h2 class="text-black"><strong>SIAP</strong></h2>
                    <h3 class="text-black fw-bold">Informatika Undip</h3>
                </div>
            </div>
            <form class="form-horizontal" action="login.php" method="post" novalidate="">
                <fieldset class="form-group position-relative has-icon-left  wrapper_identity mb-3">
                    <label for="username" class="fw-bold">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="<?php if (isset($_POST["username"])) echo $username ?>">
                </fieldset>
                <div class="form-group">
                    <label for="password" class="fw-bold">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <div class="text-center mt-4">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary w-100 fw-semibold">Login</button>
                </div>
            </form>
        </div>
    </div >
</div>
<?php require_once("../bootstrap/header.html") ?>