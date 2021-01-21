<?php
/**
 * Created by PhpStorm.
 * User: chapal
 * Date: 1/14/2021
 * Time: 2:10 AM
 */
require_once "connection.php";
$sql="SELECT * from budget";
$data = $conn->query($sql);
$rows = $data->fetchAll(PDO::FETCH_ASSOC);
$json=[];
$json2=[];
$color2=[];
foreach ($rows as $row)
{
 $json[]=  $row['catname'];
    $json2[]=$row['amount'];
}
$number=$data->rowCount();
echo $number;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="css/font/css/all.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="css/mainStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
</head>
<body style="background-color: whitesmoke">
<header class="jumbotron">
    <div class="container">
        <div class="row align-items-center row-header">
            <div class="col-12 col-sm-5">
                <h1>Welcome NAME</h1>
            </div>
            <div class="col-12 col-sm-4">
                <p>Current Time</p>
            </div>
            <div class="col-sm-2 justify-content-center" >
                <a href="logout.php">
                    <button type="button" class=" col-4 btn btn-warning" id="registration">Logout</button>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="main container">
    <div class="row">
        <canvas class="col-12 col-sm-6" id="myChart"></canvas>
    </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="css/font/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="boot/js/bootstrap.min.js"></script>
<script>
    var number= <?php echo $number ?>;
    console.log(number)
    var color="";
    for(i=0; i<number;i++)
    {
        color=color+ "'rgb(";
        for (j=0;j<3;j++)
        {
            color=color + Math.floor(Math.random() * 255) ;
            if (j<2)
            {
                color=color+ ",";
            }
        }
       color=color +")'";
        if(i< number-1 )
        {
            color=color+",";
        }
    }
    console.log(color);
</script>
<script>
    console.log(color);
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
            labels: <?php echo json_encode($json);?>,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: [color],
                borderColor: 'rgb(255, 255, 255)',
                data: <?php echo json_encode($json2);?>,
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>
</html>
