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
<div class="app-content content ">
    <br>
    <br>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container" style="overflow: auto;">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <img src="https://sso.undip.ac.id/assets/app/images/logo-undip.png" alt="Universitas Diponegoro" style="width: 150px;">
                                    <h1><strong>SIAP</strong></h1>
                                    <h2>Informatika Undip</h2> 
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 mb-1">
                                            <marquee onmouseover="this.stop();" onmouseout="this.start();">
                                                Selamat Datang di Sistem Informasi Akademik Informatika Universitas Diponegoro
                                            </marquee>
                                        </div>
                                    </div>
                                    <form class="form-horizontal" action="login.php" method="post" novalidate="">
                                        <fieldset class="form-group position-relative has-icon-left  wrapper_identity mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="NIM/NIP/username/e-mail official Undip" required value="<?php if(isset($_POST["username"])) echo $username?>">
                                        </fieldset>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <?php if (isset($error)) : ?>
                                            <div class="alert alert-danger mt-3" role="alert">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="text-center mt-4">
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<?php require_once("../bootstrap/header.html") ?>