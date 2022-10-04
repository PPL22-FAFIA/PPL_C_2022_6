
<h1 class="d-flex justify-content-center">Dashboard Mahasiswa</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rekap Data Mahasiswa</h4>
                        <div class="text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Mahasiswa</h5>
                                    <!-- <p class="card-text">Total Mahasiswa</p>
                                    <h1 class="card-text">100</h1> -->
                                    <?php
                                        require_once('db_login.php');
                                        if($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs GROUP BY Angkatan")){
                                            echo "Total : ".$stmt->num_rows."<br>";
                                            $php_data_array = Array(); // create PHP array
                                            // echo "<table>
                                            //     <tr> <th>Angkatan</th><th>Total</th></tr>";
                                            while ($row = $stmt->fetch_row()) {
                                                // echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
                                                $php_data_array[] = $row; // Adding to array
                                            }
                                            // echo "</table>";
                                        }else{
                                            echo $db->error;
                                        }
                                        // $php_data_array[] = $row; // Adding to array
                                        // echo json_encode($php_data_array);
                                        echo "<script>
                                        var my_2d = ".json_encode($php_data_array)."
                                        for(i = 0; i < my_2d.length; i++){
                                            data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                        }
                                        </script>";
                                        ?>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script>
                                    google.charts.load('current', {'packages':['corechart']});
                                        // Draw the pie chart when Charts is loaded.
                                        google.charts.setOnLoadCallback(draw_my_chart);
                                        // Callback that draws the pie chart
                                        function draw_my_chart() {
                                            // Create the data table .
                                            var data = new google.visualization.DataTable();
                                            data.addColumn('string', 'language');
                                            data.addColumn('number', 'Nos');
                                            for(i = 0; i < my_2d.length; i++)
                                        data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                    // above row adds the JavaScript two dimensional array data into required chart format
                                        var options = {title:'',
                                        pieHole: 0.5,
                                        'width':600,
                                        'height':500,			   
                                            };
                                            // Instantiate and draw the chart
                                            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                                            chart.draw(data, options);
                                        }
                                    </script>
                                    <div id="donutchart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://1.bp.blogspot.com/-ofTtY8AGS78/YZhezd9jcrI/AAAAAAAACj4/-Mku0-NCv34U0UA3U6QfVdTJWMvfHykVgCNcBGAsYHQ/s2048/logo-undip-01.png" width="150" alt="gene">
                        <h3 class="m-0">Departemen Informatika</h3>
                        <p class="m-0">Fakultas Sains dan Matematika</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary">Data PKL Mahasiswa</button>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary">Data Skripsi Mahasiswa</button>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary">Rekap Status Mahasiswa</button>
                </div>
            </div>
        </div>
    </div>