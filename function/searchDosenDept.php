<?php
require_once("../lib/db_login.php");
$namaDosen = $_GET["nama"];
                $query = "SELECT Nip, Nama FROM tb_dosen WHERE Nama LIKE '%$namaDosen%' ";
                $result = $db->query($query);
                if (!$result) {
                    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                }
                $i = 1;
                
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<th scope="row">'.$i.'</th>';
                    echo '<td>'.$row->Nip.'</td>';
                    echo '<td>'.$row->Nama.'</td>';
                    echo '<td><a href="detailMhs.php?nip='.$row->Nip.'" class="btn btn-primary">Detail</a></td>';
                    echo '</tr>';
                    $i++;
                }
                
                $result->free();
                $db->close();
            ?>