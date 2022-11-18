<?php require_once("../lib/db_login.php");
$nim = $_SESSION['user']['Nim_Nip'];
$query1 = "SELECT * FROM tb_mhs";
// execute query
$result1 = mysqli_query($db, $query1);

$nip = $_SESSION['user']['Nim_Nip'];
$query2 = "SELECT * FROM tb_dosen";
// execute query
$result2 = mysqli_query($db, $query2);

$total = $_SESSION['user']['Nim_Nip'];
$query3 = "SELECT * FROM tb_User";
// execute query
$result3 = mysqli_query($db, $query3);

?>
<div class="container">
    <h3 class="d-flex justify-content-center mt-3 fw-semibold display-6">Dashboard Operator</h3>
    <div class="row mt-5">
        <div class="col d-flex align-item-center justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Data Mahasiswa</h3>
                    <div class="row">
                        <div class="tengah d-flex justify-content-center">
                            <div class="chart col text-center ml-5">
                                <?php
                                if ($stmt = $db->query("SELECT Angkatan, COUNT(*) AS total FROM tb_mhs GROUP BY Angkatan")) {
                                    $sum = $db->query("SELECT COUNT(*) AS total FROM tb_mhs");
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
                                <div class="d-flex justify-content-center align-item-center">
                                    <div id="totalChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex align-item-center justify-content-center">

                <div class="align">
                    <div class="card w-100">
                        <div class="card-body text-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png" width="150" alt="gene">
                            <h2><?php echo $_SESSION["user"]["Username"] ?></h2>
                            <h5>Operator</h5>
                            <a href="editDataOp.php?nimnip=<?php echo $_SESSION["user"]["Nim_Nip"] ?>" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                    <div class="row mt-3"></div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Data User</h3>
                            <div class="row">
                                <div class="col">
                                    <div class="text-center m-0">Mahasiswa</div>
                                    <h3 class="text-center"><?php echo mysqli_num_rows($result1); ?></h3>
                                </div>
                                <div class="col">
                                    <div class="text-center m-0">Dosen</div>
                                    <h3 class="text-center"><?php echo mysqli_num_rows($result2); ?></h3>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center ">Total User</div>
                                        <h3 class="text-center"><?php echo mysqli_num_rows($result3); ?></h3>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="../operator/addUserPage.php" class="btn btn-primary px-3 py-2">Add User</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>