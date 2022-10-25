<?php include_once '../lib/db_login.php';
$nip = $_SESSION['user']['Nim_Nip'];
$query = "SELECT * FROM tb_dosen WHERE Nip = '$nip'";
// execute query
$result = mysqli_query($db, $query);
// check result
if (mysqli_num_rows($result) > 0) {
    // get data
    $data = mysqli_fetch_assoc($result);
    // set session
    $_SESSION['dataDoswal'] = $data;
}

?>
<div class="main h-100">
    <div class="title-page text-center display-6 mt-3 fw-semibold">Dashboard Dosen Wali</div>
    <div class="content d-flex align-items-center ">
        <div class="left-content col-5">
            <div class="lurus d-flex justify-content-center">
                <div class="profile border rounded p-3 w-75">
                    <div>
                        <img class="img-thumbnail rounded" src="../lib/lecture.jpg" alt="profile">
                    </div>
                    <div class="profile-name text-center">
                        <h3><?php echo $_SESSION["dataDoswal"]["Nama"] ?></h3>
                        <p>Dosen Wali</p>
                    </div>
                </div>
            </div>
            <!-- Donut Chart Jumlah Mahasiswa -->
            <div class="lurus d-flex justify-content-center my-3">
    
                    <div class="chart-pkl border rounded p-1">
                        <h5 class="card-title">Data Mahasiswa PKL</h5>
                        <?php
                        if ($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs GROUP BY Angkatan")) {
                            $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs");
                            $row = mysqli_fetch_assoc($sum);
                            echo "Total : " . $row['total'] . "<br>";
                            $php_data_array = array(); // create PHP array
                            while ($row = $stmt->fetch_row()) {
                                $php_data_array[] = $row; // Adding to array
                            }
                        } else {
                            echo $db->error;
                        }
                        echo "<script>
                                                    var my_2d = " . json_encode($php_data_array) . "
                                                    for(i = 0; i < my_2d.length; i++){
                                                        data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                                    }
                                                </script>";
                        ?>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script>
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            // Draw the pie chart when Charts is loaded.
                            google.charts.setOnLoadCallback(draw_my_chart);
                            // Callback that draws the pie chart
                            function draw_my_chart() {
                                // Create the data table .
                                var data = new google.visualization.DataTable();
                                data.addColumn('string', 'Angkatan');
                                data.addColumn('number', 'Total');
                                for (i = 0; i < my_2d.length; i++)
                                    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                // above row adds the JavaScript two dimensional array data into required chart format
                                var options = {
                                    pieHole: 0.5,
                                    'width': 400,
                                    'height': 400,
                                    'legend': 'none',
                                    'alignment': 'center',
                                    'chartArea': {
                                        'width': '100%',
                                        'height': '90%'
                                    },
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
        <div class="right-content col d-flex flex-column">
            <!-- Donut Chart Jumlah Mahasiswa -->
            <div class="lurus d-flex justify-content-center mt-5 mb-3">
                <div class="chart-aktif border rounded p-3">
                    <h5 class="card-title">Data Mahasiswa Aktif</h5>
                    <?php
                    if ($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs GROUP BY Angkatan")) {
                        $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs");
                        $row = mysqli_fetch_assoc($sum);
                        echo "Total : " . $row['total'] . "<br>";
                        $php_data_array = array(); // create PHP array
                        while ($row = $stmt->fetch_row()) {
                            $php_data_array[] = $row; // Adding to array
                        }
                    } else {
                        echo $db->error;
                    }
                    echo "<script>
                                            var my_2d = " . json_encode($php_data_array) . "
                                            for(i = 0; i < my_2d.length; i++){
                                                data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                            }
                                        </script>";
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        // Draw the pie chart when Charts is loaded.
                        google.charts.setOnLoadCallback(draw_my_chart);
                        // Callback that draws the pie chart
                        function draw_my_chart() {
                            // Create the data table .
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Angkatan');
                            data.addColumn('number', 'Total');
                            for (i = 0; i < my_2d.length; i++)
                                data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                            // above row adds the JavaScript two dimensional array data into required chart format
                            var options = {
                                pieHole: 0.5,
                                'width': 400,
                                'height': 400,
                                'legend': 'none',
                                'alignment': 'center',
                                'chartArea': {
                                    'width': '100%',
                                    'height': '90%'
                                },
                                'pieSliceText': 'label',
                                'pieSliceTextStyle': {
                                    'color': 'white',
                                },
                                'backgroundColor': 'transparent',
                            };
                            // Instantiate and draw the chart
                            var chart = new google.visualization.PieChart(document.getElementById('totalChartAktif'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="totalChartAktif"></div>
                </div>
            </div>


            <div class="lurus d-flex justify-content-center mb-3">

                <div class="chart-skripsi border rounded p-3">
                    <h5 class="card-title">Data Mahasiswa Skripsi</h5>
                    <?php
                    if ($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs GROUP BY Angkatan")) {
                        $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs");
                        $row = mysqli_fetch_assoc($sum);
                        echo "Total : " . $row['total'] . "<br>";
                        $php_data_array = array(); // create PHP array
                        while ($row = $stmt->fetch_row()) {
                            $php_data_array[] = $row; // Adding to array
                        }
                    } else {
                        echo $db->error;
                    }
                    echo "<script>
                                            var my_2d = " . json_encode($php_data_array) . "
                                            for(i = 0; i < my_2d.length; i++){
                                                data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                                            }
                                        </script>";
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        // Draw the pie chart when Charts is loaded.
                        google.charts.setOnLoadCallback(draw_my_chart);
                        // Callback that draws the pie chart
                        function draw_my_chart() {
                            // Create the data table .
                            var data = new google.visualization.DataTable();
                            data.addColumn('string', 'Angkatan');
                            data.addColumn('number', 'Total');
                            for (i = 0; i < my_2d.length; i++)
                                data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
                            // above row adds the JavaScript two dimensional array data into required chart format
                            var options = {
                                pieHole: 0.5,
                                'width': 400,
                                'height': 400,
                                'legend': 'none',
                                'alignment': 'center',
                                'chartArea': {
                                    'width': '100%',
                                    'height': '90%'
                                },
                                'pieSliceText': 'label',
                                'pieSliceTextStyle': {
                                    'color': 'white',
                                },
                                'backgroundColor': 'transparent',
                            };
                            // Instantiate and draw the chart
                            var chart = new google.visualization.PieChart(document.getElementById('totalChartSkripsi'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="totalChartSkripsi"></div>
                </div>
            </div>
        </div>
    </div>
</div>