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
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <div>
                        <div class="profile border rounded p-3 h-100 w-100">
                            <div>
                                <img class="img-fluid" src="../lib/pp.jpg" alt="profile">
                            </div>
                            <div class="profile-name text-center">
                                <h4 class="mt-1"><?php echo $_SESSION["dataDoswal"]["Nama"] ?></h4>
                                <h5 class="mt-1">Dosen Wali</h5>
                                <h6 class="mt-1"><?= $nip ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Donut Chart Jumlah Mahasiswa -->
            <div class="col text-center">
                <div class="chart-pkl border rounded p-3 h-100">
                    <h5 class="card-title">Data Mahasiswa PKL</h5>
                    <?php
                    $kodewali =  $_SESSION['dataDoswal']['Kode_Wali'];
                    if ($stmt = $db->query("SELECT p.Status, COUNT(*) AS total FROM tb_pkl p JOIN tb_mhs m ON p.Nim = m.Nim WHERE m.Kode_Wali = '$kodewali' GROUP BY p.Status")) {
                        $sum = $db->query("SELECT COUNT(*) AS total FROM tb_pkl p JOIN tb_mhs m ON p.Nim = m.Nim WHERE m.Kode_Wali = '$kodewali'");
                        $row = mysqli_fetch_assoc($sum);
                        echo "Total : " . $row['total'] . "<br>";
                        $array_pkl_done = array(); // create PHP array
                        while ($row = $stmt->fetch_row()) {
                            $array_pkl_done[] = $row; // Adding to array
                        }
                    } else {
                        echo $db->error;
                    }
                    echo "<script>
                                var my_1d = " . json_encode($array_pkl_done) . "
                                for(i = 0; i < my_1d.length; i++){
                                    data.addRow([my_1d[i][0], parseInt(my_1d[i][1])]);
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
                            for (i = 0; i < my_1d.length; i++)
                                data.addRow([my_1d[i][0], parseInt(my_1d[i][1])]);
                            // above row adds the JavaScript two dimensional array data into required chart format
                            var options = {
                                pieHole: 0.3,
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
                    <div class="d-flex justify-content-center">
                        <div class="mx-auto" id="totalChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Donut Chart Jumlah Mahasiswa -->
            <div class="col text-center">
                <div class="chart-aktif border rounded p-3">
                    <h5 class="card-title">Data Mahasiswa Aktif</h5>
                    <?php
                    if ($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs WHERE Kode_Wali = '$kodewali' GROUP BY Angkatan")) {
                        $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs WHERE Kode_Wali = '$kodewali'");
                        $row = mysqli_fetch_assoc($sum);
                        echo "Total : " . $row['total'] . "<br>";
                        $array_mhs_active = array(); // create PHP array
                        while ($row = $stmt->fetch_row()) {
                            $array_mhs_active[] = $row; // Adding to array
                        }
                    } else {
                        echo $db->error;
                    }
                    echo "<script>
                            var act_diagram = " . json_encode($array_mhs_active) . "
                            for(i = 0; i < act_diagram.length; i++){
                                data.addRow([act_diagram[i][0], parseInt(act_diagram[i][1])]);
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
                            for (i = 0; i < act_diagram.length; i++)
                                data.addRow([act_diagram[i][0], parseInt(act_diagram[i][1])]);
                            // above row adds the JavaScript two dimensional array data into required chart format
                            var options = {
                                pieHole: 0.3,
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
                    <div class="d-flex justify-content-center">
                        <div id="totalChartAktif"></div>
                    </div>
                </div>
            </div>


            <div class="col text-center">

                <div class="chart-skripsi border rounded p-3">
                    <h5 class="card-title">Data Mahasiswa Skripsi</h5>
                    <?php
                    $kodewali =  $_SESSION['dataDoswal']['Kode_Wali'];
                    if ($stmt = $db->query("SELECT p.Status, COUNT(*) AS total FROM tb_skripsi p JOIN tb_mhs m ON p.Nim = m.Nim WHERE m.Kode_Wali = '$kodewali' GROUP BY p.Status")) {
                        $sum = $db->query("SELECT COUNT(*) AS total FROM tb_skripsi p JOIN tb_mhs m ON p.Nim = m.Nim WHERE m.Kode_Wali = '$kodewali'");
                        $row = mysqli_fetch_assoc($sum);
                        echo "Total : " . $row['total'] . "<br>";
                        $array_skripsi_done = array(); // create PHP array
                        while ($row = $stmt->fetch_row()) {
                            $array_skripsi_done[] = $row; // Adding to array
                        }
                    } else {
                        echo $db->error;
                    }
                    echo "<script>
                            var my_3d = " . json_encode($array_skripsi_done) . "
                            for(i = 0; i < my_3d.length; i++){
                                data.addRow([my_3d[i][0], parseInt(my_3d[i][1])]);
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
                            for (i = 0; i < my_3d.length; i++)
                                data.addRow([my_3d[i][0], parseInt(my_3d[i][1])]);
                            // above row adds the JavaScript two dimensional array data into required chart format
                            var options = {
                                pieHole: 0.3,
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
                                '   backgroundColor': 'transparent',
                            };
                            // Instantiate and draw the chart
                            var chart = new google.visualization.PieChart(document.getElementById('totalChartSkripsi'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div class="d-flex justify-content-center">
                        <div id="totalChartSkripsi"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>