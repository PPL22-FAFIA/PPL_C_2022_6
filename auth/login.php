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
    $result = mysqli_query($db,$query);
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
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php if(isset($_POST["username"])) echo $username?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <!-- error message -->
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
    </div>
<?php require_once("../bootstrap/header.html")?>