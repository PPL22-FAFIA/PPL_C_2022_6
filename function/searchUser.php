<?php
require_once("../lib/db_login.php");
    $user = $_GET["username"];
                $query = "SELECT * FROM tb_user WHERE Username LIKE '%$user%' or Nim_Nip LIKE '%$user%' ";
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

                        echo '<td><a href="editDataMhs.php?nip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    else if($row->Role == "2"){
                        echo '<td><a href="editDataDoswal.php?nip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    else if($row->Role == "3"){
                        echo '<td><a href="editDataOp.php?nip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    else if($row->Role == "4"){
                        echo '<td><a href="editDataDept.php?nip='.$row->Nim_Nip.'" class="btn btn-primary">Edit</a></td>';
                    }
                    echo '</tr>';
                    $i++;
                }
                $result->free();
                $db->close();
                ?>