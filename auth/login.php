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
<!-- login form in center of page-->
<!-- <div class="box">
    <div class="row d-flex align-items-center text-center ms-auto justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php if (isset($_POST["username"])) echo $username ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <div class="text-center mt-3">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
<div class="app-content content ">
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
                                    <h2>Universitas Diponegoro</h2>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Silahkan Masuk</span></h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 mb-1">
                                            <marquee onmouseover="this.stop();" onmouseout="this.start();">
                                                Berita : <a href="https://sso.undip.id" target="_blank" class="red"><u><b>TRYOUT UNDIP</b> dapat diakses di sini .</u></a> atau link : <a href="https://sso.undip.id" target="_blank" class="red"><u>https://sso.undip.id</u></a>
                                            </marquee>
                                        </div>
                                    </div>
                                    <form class="form-horizontal" action="login.php" method="post" novalidate="">
                                        <fieldset class="form-group position-relative has-icon-left  wrapper_identity mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="NIM/NIP/username/e-mail official Undip" required="">
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