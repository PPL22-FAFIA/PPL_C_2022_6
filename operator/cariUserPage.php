<?php 
require_once ("../bootstrap/header.html");
require_once('../lib/db_login.php'); ?>
<div class="row g-0">
    <div class="col-2">
        <?php require_once '../dashboard/sidebarOp.php' ?>

    </div>
    <div class="col p-4">
    <h1 class="d-flex justify-content-center">Cari User</h1>
        <div class="d-flex flex-row col-3">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                aria-describedby="button-addon2" onkeyup="searchUser(this.value)">
        </div> 
        <div class="d-flex flex-row-reverse">
            <table class="table table-striped table-hover">
            <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">NIM/NIP</th>
            <th scope="col">Username</th>
            <th scope="col">Data User</th>
            </tr>
            </thead>
            <tbody id="daftarUser">
        <?php
                $query = "SELECT * FROM tb_user";
                $result = $db->query($query);
                if (!$result) {
                    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                }
                $i = 1;
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<th scope="row">'.$i.'</th>';
                    echo '<td>'.$row->Nim_Nip.'</td>';
                    echo '<td>'.$row->Username.'</td>';
                    if($row->Role == "1"){

                        echo '<td><a href="editDataMhs.php?nimnip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    else if($row->Role == "2"){
                        echo '<td><a href="editDataDoswal.php?nimnip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    else if($row->Role == "3"){
                        echo '<td><a href="editDataOp.php?nimnip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    else if($row->Role == "4"){
                        echo '<td><a href="editDataDept.php?nimnip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    echo '</tr>';
                    $i++;
                }
                $result->free();
                $db->close();
                ?>
                </tbody>
                </table>
        </div>
    </div>
    

<script src="../js/ajax.js"></script>
<?php require_once '../bootstrap/footer.html' ?>