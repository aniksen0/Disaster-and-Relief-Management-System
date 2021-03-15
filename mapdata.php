<?php
session_start();
require "connection.php";

$sql= "SELECT * from census";
$data= $conn->query($sql);
$rows = $data->fetchALL(PDO::FETCH_ASSOC);

$data1=[10,20,20,30,40];
?>

<html>
    <head>
        <title>Anik Sen</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="crossorigin=""></script>
    
        
        <style>
                #mapid { height: 500px; }
        </style>
   
    </head>
   
    <body>
        <div id="mapid"></div>
    </body>

    <script>

    var mymap = L.map('mapid').setView([22.356572, 91.825847], 13);
    L.tileLayer("https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}.jpg?key=3S1E9FJBL7vy30yMkrwX",
    {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    }).addTo(mymap);
    <?php
    foreach ($rows as $row)
    {
    ?>

        var marker = L.marker([<?php echo $row['lat']?>, <?php echo $row['lang']?>]).addTo(mymap);
        marker.bindPopup("<b><?php echo $row['Name']?><br> Division Name: <?php echo $row['divname']?></b><br> <span>2021: <?php echo $row['projection']?> <br>Male: <?php echo $row['projectionMale']?> <br>Female: <?php echo $row['projectionFemale']?><br>Child: <?php echo $row['projectionChild']?><br> Density:<?php echo $row['Density']?> </span>").openPopup();


    console.log("here is nai");
    <?php
        }
        ?>

    var circle = L.circle([22.356572, 91.825847],
        {
            color:'red',
            fillColor:'blue',
            radius:50

        }).addTo(mymap);





        console.log("here");


    </script>

</html>