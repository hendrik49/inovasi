<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pie Chart with Google Chart</title>
 <!--js google chart-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
</head>
<body>
<script type="text/javascript">
       //load package
       google.load('visualization', '1', {packages: ['corechart']});
 </script>
<?php $result = $pie_data;
    //get number of rows returned
    $num_results = $result->num_rows;
    if( $num_results > 0){ ?>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    foreach ($result->result_array() as $row) {
                        extract($row);
                        echo "['{$nama_inovasi}', {$status}],";
                    } ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Data Perkembangan Inovasi Perangkat Daerah"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
    }else{
        echo "Tidak ada data di database.";
    } ?>
    </script><br>
<div id="container">
  
    <div id="visualization"></div>

    
</div>
</body>
</html>