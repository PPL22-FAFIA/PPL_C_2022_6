<?php require_once("../lib/db_login.php");?>
<h1 class="d-flex justify-content-center">Dashboard Operator</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User</h4>
                        <?php
                                if($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs GROUP BY Angkatan")){
                                    $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs");
                                    $php_data_array = Array(); // create PHP array
                                    while ($row = $stmt->fetch_row()) {
                                        $php_data_array[] = $row; // Adding to array
                                    }
                                }else{
                                    echo $db->error;
                                }
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
                                    data.addColumn('string', 'Angkatan');
                                    data.addColumn('number', 'Total');
                                    for(i = 0; i < my_2d.length; i++)
                                data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                // above row adds the JavaScript two dimensional array data into required chart format
                                var options = {pieHole: 0.5,
                                    'width':500, 'height':500,
                                    'legend':'none',
                                    'alignment':'center',
                                    'chartArea': {'width': '100%', 'height': '90%'},
                                    'pieSliceText': 'label',
                                    'pieSliceTextStyle': {
                                        'color': 'white',
                                    },
                                    'backgroundColor': 'transparent',
                                };
                                    // Instantiate and draw the chart
                                    var chart = new google.visualization.PieChart(document.getElementById('totalChart'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="totalChart"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" width="150" alt="gene">
                        <h3 class="m-0">Farrel</h3>
                        <p class="m-0">ID Operator</p>
                        <p class="m-0">Operator</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="../operator/addUserPage.php" class="btn btn-primary">Add User</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Data Mahasiswa</h4>
                        <table border=5 width=50% align=”center”>
                            <tr>
                                <td>Mahasiswa</td>
                                <td>---</td> </tr><tr>
                                <td>Dosen Wali</td>
                                <td>---</td> </tr><tr>
                                <td>Operator</td>
                                <td>---</td> </tr><tr>
                                <td>Departemen</td> <td>---</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total User</h5>
                        <div class="row">
                            <div class="col">
                               <h3 class="card-title text-center">765</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>