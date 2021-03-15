<?php
session_start();
require "connection.php";

$sql1= "SELECT * from disaster JOIN census WHERE disaster.district=census.Name";
$data1= $conn->query($sql1);
$dists = $data1->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
    <head>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        />
        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
        <script src="https://api.windy.com/assets/map-forecast/libBoot.js"></script>
        <style>
            #windy {
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div id="windy"></div>
    </body>
    <script>
        const options = {
    // Required: API key
    key: 'LwoyhbNqjlhbP5PJP3S171T2KMA7nH4w', // REPLACE WITH YOUR KEY !!!

    // Put additional console output
    verbose: true,

    // Optional: Initial state of the map
    lat: 23.796909,
    lon: 90.422746,
    zoom: 7,
};

// Initialize Windy API
windyInit(options, windyAPI => {
    // windyAPI is ready, and contain 'map', 'store',
    // 'picker' and other usefull stuff

    const { map } = windyAPI;
    // .map is instance of Leaflet map

//    L.popup()
//        .setLatLng([50.4, 14.3])
//        .setContent('Hello World')
//        .openOn(map);
//    var marker = L.marker([22.1512, 91.1515]).addTo(map)
//	var marker2 = L.marker([22.356572, 91.825847]).addTo(map)
//	marker2.bindPopup("new eita").addTo(map)
//    var circle = L.circle([22.21225, 91.51473],
//    {
//        color:'red',
//        fillColor:'blue',
//        radius:5000
//
//    }).addTo(map);
//    marker.bindPopup("<b> Hey there</b><br>").openPopup();
<?php foreach ($dists as $dist)
{?>
        var circle = L.circle([<?php echo $dist['lat'] ?>, <?php echo $dist['lang']?>],
            {
                color:'red',
                fillColor:'blue',
                radius:5000

            }).addTo(map);

        var marker = L.marker([<?php echo $dist['lat']?>, <?php echo $dist['lang']?>]).addTo(map);
        marker.bindPopup("<b><?php echo $dist['Name']?><br> Division Name: <?php echo $dist['divname']?></b><br> <span>2021: <?php echo $dist['projection']?> <br>Male: <?php echo $dist['projectionMale']?> <br>Female: <?php echo $dist['projectionFemale']?><br>Child: <?php echo $dist['projectionChild']?><br> Density:<?php echo $dist['Density']?> </span> <br> <span style:{color:red}>Affected_By:<?php echo $dist['disastertype']?> </span>").openPopup();
        console.log("here is nai");
<?php } ?>



});
    </script>


</html>