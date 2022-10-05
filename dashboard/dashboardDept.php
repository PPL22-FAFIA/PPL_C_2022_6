<?php require_once('../lib/db_login.php'); ?>
<h1 class="d-flex justify-content-center">Dashboard Mahasiswa</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <!-- Donut Chart Jumlah Mahasiswa -->
                            <h5 class="card-title">Jumlah Mahasiswa</h5>
                            <?php
                                if($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs GROUP BY Angkatan")){
                                    $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs");
                                    $row = mysqli_fetch_assoc($sum); 
                                    echo "Total : ".$row['total']."<br>";
                                    $php_data_array = Array(); // create PHP array
                                    while ($row = $stmt->fetch_row()) {
                                        $php_data_array[] = $row; // Adding to array
                                    }
                                }else{
                                    echo $db->error;
                                }
                                echo "<script>
                                    var tot_diagram = ".json_encode($php_data_array)."
                                    for(i = 0; i < tot_diagram.length; i++){
                                        data.addRow([tot_diagram[i][0], parseInt(tot_diagram[i][1])]);
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
                                    for(i = 0; i < tot_diagram.length; i++)
                                data.addRow([tot_diagram[i][0], parseInt(tot_diagram[i][1])]);
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
                            
                            <!-- Donut Chart Mahasiswa Aktif -->
                            <h5 class="card-title">Mahasiswa Aktif</h5>
                            <?php
                                if($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs WHERE Status = 1 GROUP BY Angkatan")){
                                    $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs WHERE Status = 1");
                                    $row = mysqli_fetch_assoc($sum); 
                                    echo "Total : ".$row['total']."<br>";
                                    $array_mhs_active = Array(); // create PHP array
                                    while ($row = $stmt->fetch_row()) {
                                        $array_mhs_active[] = $row; // Adding to array
                                    }
                                }else{
                                    echo $db->error;
                                }
                                echo "<script>
                                    var act_diagram = ".json_encode($array_mhs_active)."
                                    for(i = 0; i < act_diagram.length; i++){
                                        data.addRow([act_diagram[i][0], parseInt(act_diagram[i][1])]);
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
                                    for(i = 0; i < act_diagram.length; i++)
                                data.addRow([act_diagram[i][0], parseInt(act_diagram[i][1])]);
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
                                    var chart = new google.visualization.PieChart(document.getElementById('activeChart'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="activeChart"></div>

                            <!-- Donut Chart Mahasiswa Non-Aktif -->
                            <h5 class="card-title">Mahasiswa Non-Aktif</h5>
                            <?php
                                if($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs WHERE Status = 0 GROUP BY Angkatan")){
                                    $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs WHERE Status = 0");
                                    $row = mysqli_fetch_assoc($sum); 
                                    echo "Total : ".$row['total']."<br>";
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
                                    var chart = new google.visualization.PieChart(document.getElementById('nonActiveChart'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="nonActiveChart"></div>
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
