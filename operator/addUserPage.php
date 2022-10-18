<?php require_once '../bootstrap/header.html'; 
require_once '../lib/db_login.php';
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
}
else{
    $user = $_SESSION['user']['Role'];
    if($user!='3'){
        header("Location: ../index.php");
    }
}
// form validation
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $nimnip = $_POST['nimnip'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $query = "INSERT INTO tb_user (Nim_Nip, Username, Password, Role) VALUES ('$nimnip', '$username', '$password','$role')";
    $result =  $db->query($query);
    if($result){
        if($role==1){
            $query = "INSERT INTO tb_mhs (Nim, Nama, Email_SSO) VALUES ('$nimnip', '$nama', '$email')";
            $result =  $db->query($query);
            if($result){
                header("Location: ../operator/listUserPage.php");
            }
        }
        else {
            $query = "INSERT INTO tb_dosen (Nip, Nama, Email_SSO) VALUES ('$nimnip', '$nama', '$email')";
            $result =  $db->query($query);
            if($result){
                header("Location: ../operator/listUserPage.php");
            }
        }
        header("Location: ../index.php");
    }
    else{
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}
?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarOp.php' ?>
    </div>
    <div class="col p-4">
        <h1 class="d-flex justify-content-center">Add User</h1>
        <div class="card">
            <form class="card-body" method="POST" action="">
                    <div class="form-group mt-3">
                        <label class="fw-bold">Nama</label>
                        <div class="col">
                            <input type="text" name="nama" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">NIM/NIP</label>
                        <div class="col">
                            <input type="text" name="nimnip" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Username</label>
                        <div class="col">
                            <input type="text" name="username" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Email</label>
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Password</label>
                        <div class="col">
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="fw-bold">Role</label>
                        <div class="col">
                            <select name="role" id="role">
                                <option value="1">Mahasiswa</option>
                                <option value="2">Dosen</option>
                                <option value="3">Operator</option>
                                
                            </select>
                        </div>
                    </div>
                    <!-- button update data -->
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary fw-bold mt-4">Upload Data</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require_once '../bootstrap/footer.html' ?>