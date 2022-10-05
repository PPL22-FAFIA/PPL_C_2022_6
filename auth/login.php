<!-- login form -->
<?php require_once("../bootstrap/header.html")?>
<!-- isset submit post username password -->
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    // include db connection
    include_once("../lib/db_login.php");
    // get username password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // query
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    // execute query
    $result = mysqli_query($conn, $query);
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once("../bootstrap/header.html")?>