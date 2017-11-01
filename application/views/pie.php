<!DOCTYPE html>
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
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['PL', 'Ratings'],
                    <?php
                    $nilai = explode(',',$pie_data);
                    echo "[' Kurang 30 Hari', ".$nilai[0]."],[' Kurang 90 Hari', ".$nilai[1]."],[' Lebih Dari 90 Hari', ".$nilai[2]."]";
                        
                     ?>
                ]);
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {width: 400, height: 300, title: ''});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
 
    </script><br>
    
<div id="container">   
<div id="visualization"></div>
</div>
</body>
</html>