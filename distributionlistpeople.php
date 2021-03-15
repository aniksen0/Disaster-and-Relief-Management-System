<?php
session_start();
require_once "connection.php";

$data=0;
$medium=0;
$low=0;
$male = 0;
$female = 0;
$children = 0;
$totaldata=0;


$no=$_SESSION['distpeople'];
$sql = "SELECT * FROM affectedpeople  WHERE status='no' AND priority='high' ORDER BY familyMember DESC LIMIT $no ";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (count($rows)<$no)
{
    $medium=1;
    $highcount=$no-count($rows);
    echo $highcount;
    $sql2 = "SELECT * FROM affectedpeople  WHERE status='no' AND priority='medium' ORDER BY familyMember DESC LIMIT $highcount ";
    $stmt2 = $conn->query($sql2);
    $medium = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    if (count($medium)<$highcount)
    {
        $low=1;
        $anotherhighcount=$highcount-count($medium);
        echo $anotherhighcount;
        $sql3 = "SELECT * FROM affectedpeople  WHERE status='no' AND priority='low' ORDER BY familyMember DESC LIMIT $anotherhighcount ";
        $stmt3 = $conn->query($sql3);
        $low = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    }
}

$data=1;
$totaldata = sizeof($rows);
foreach ($rows as $row) {
    $male = $male + $row['male'];
    $female = $female + $row['female'];
    $children = $children + $row['under_18'];

}
if (isset($_POST['add']))
{
    $sql= "UPDATE affectedpeople SET status=:status WHERE id=:id;)";
    $stmt= $conn->prepare($sql);
    $stmt->execute(array(

        ':id'=>htmlentities($_POST['id']),
        ':status'=>"done",
    ));
    header("Location:distributionlistpeople.php");
    $_SESSION['success']="Successful";
    return;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/font/css/all.min.css" crossorigin="anonymous">

    <link rel="stylesheeet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainSidebar.css" >
    <link rel="stylesheet" href="css/mainStyle.css" >
    <link href="css/mainStyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Relief Dashboard</title>
</head>
<body id="body">
<div class="container1">
    <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <div class="navbar--right">
            <img src="img/logo.svg" alt="mainlogo" id="farleft" height="50px" width="50px" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <i class="fas fa-search"></i></button>


            <a href="#">
                <i class="fas fa-clock-o" aria-hidden="true"></i>
            </a>
            <a href="#">
                <img width="30" src="img/avatar.png" alt="LoginPerson's img" />
                <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
            </a>
        </div>
    </nav>

    <main>
        <div class="main--container1 container-fluid">
            <!-- MAIN TITLE STARTS HERE -->

            <div class="main--title">

                <div class="main--greeting">
                    <h1>Hello </h1>
                    <p>Welcome to your relief dashboard</p>
                </div>
            </div>
            <hr>

            <!--            ############Beginn Chart Budget############-->
            <div class=" chart row budgetchart">

                <div class="firstChart  col-sm-4">
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="detailsforbudgetnotchart col-sm-8">
                    <div class="  col-sm-4">
                        <h4>Details:: </h4>
                        <p>Total Data:<?php echo $totaldata ; ?> </p>
                        <p> Male::<?php echo $male; ?></p>
                        <p> Female::<?php echo $female ; ?></p>
                        <p> Children::<?php echo $children ; ?></p>
                    </div>


                    <div class=" col-sm-4">
                        <h3></h3>
                        <p>Most populated Division::<?php echo $totaldata ; ?> </p>
                        <p>Most populated District<?php echo $totaldata ; ?> </p>
                        <p>Most populated Upazilla::<?php echo $totaldata ; ?> </p>
                        <p>Status <?php echo "Calucalation pending."; ?></p>
                        <!--                        calculation kora lagbe ration day er-->
                    </div>
                </div>


            </div>
            <!--###########Chart end###################-->
            <hr>
            <p></p>
            <hr>
            <div class="form-content form-inline row bg-danger justify-content-center">
            </div>
            <div class="table tablebudget" style="overflow-x:auto;">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Division</th>
                        <th scope="col">District</th>
                        <th scope="col">Upazilla</th>
                        <th scope="col">Thana</th>
                        <th scope="col">House Holding</th>
                        <th scope="col">Family Member</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Male</th>
                        <th scope="col">Female</th>
                        <th scope="col">Under_18</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($data>=1) {
                        foreach ($rows as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['division']; ?></td>
                                <td><?php echo $row['district']; ?></td>
                                <td><?php echo $row['jilla']; ?></td>
                                <td><?php echo $row['thana']; ?></td>
                                <td><?php echo $row['householding']; ?></td>
                                <td><?php echo $row['familyMember']; ?></td>
                                <td><?php echo $row['contact_no']; ?></td>
                                <td><?php echo $row['male']; ?></td>
                                <td><?php echo $row['female']; ?></td>
                                <td><?php echo $row['under_18']; ?></td>
                                <td><?php echo $row['Priority']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <button name="add" class="btn-info" type="submit">Relief_Given</button>
                                    </form>
                                </td>


                            </tr>
                    <?php } }
                    else
                    {
                        echo "<p> no data here </p>";
                    }
                    ?>
<!--                    //medium data-->
                    <?php
                    if ($medium>=1) {
                        foreach ($medium as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['division']; ?></td>
                                <td><?php echo $row['district']; ?></td>
                                <td><?php echo $row['jilla']; ?></td>
                                <td><?php echo $row['thana']; ?></td>
                                <td><?php echo $row['householding']; ?></td>
                                <td><?php echo $row['familyMember']; ?></td>
                                <td><?php echo $row['contact_no']; ?></td>
                                <td><?php echo $row['male']; ?></td>
                                <td><?php echo $row['female']; ?></td>
                                <td><?php echo $row['under_18']; ?></td>
                                <td><?php echo $row['Priority']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <button name="add" class="btn-info" type="submit">Relief_Given</button>
                                    </form>
                                </td>


                            </tr>
                        <?php } }
                    else
                    {
                        echo "<p> no data here </p>";
                    }
                    ?>
<!--                    low data here-->
                    <?php
                    if ($low>=1) {
                        foreach ($low as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['division']; ?></td>
                                <td><?php echo $row['district']; ?></td>
                                <td><?php echo $row['jilla']; ?></td>
                                <td><?php echo $row['thana']; ?></td>
                                <td><?php echo $row['householding']; ?></td>
                                <td><?php echo $row['familyMember']; ?></td>
                                <td><?php echo $row['contact_no']; ?></td>
                                <td><?php echo $row['male']; ?></td>
                                <td><?php echo $row['female']; ?></td>
                                <td><?php echo $row['under_18']; ?></td>
                                <td><?php echo $row['Priority']; ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <button name="add" class="btn-info" type="submit">Relief_Given</button>
                                    </form>
                                </td>


                            </tr>
                        <?php } }
                    else
                    {
                        echo "<p> no data here </p>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>







    </main>

    <div id="sidebar">
        <div class="sidebar--title">
            <div class="sidebar--img">
                <img src="img/logo.svg" alt="logo" />
                <h1>Disaster and Relief Ministry</h1>

            </div>
            <i
                onclick="closeSidebar()"
                class="far fa-clock"
                id="sidebarIcon"
                aria-hidden="true"
            ></i>
        </div>
        <p>Relief Section</p>
        <div class="sidebar--menu">
            <a href="reliefMainPage.php">
                <div class="sidebar--link" >
                    <i class="fa fa-home"> </i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="Budget.php">
                <div class="sidebar--link ">

                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    Budget
                </div>
            </a>

            <a href="expenseBudget.php">
                <div class="sidebar--link">
                    <i class="fa fa-building-o"></i>
                    Expense
                </div>
            </a>
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="category.php">Category</a>
            </div>
            <div class="sidebar--link active">
                <i class="fa fa-archive"></i>
                <a href="totalDistribution.php">Total Distribution</a>
            </div>
            <div class="sidebar--link active_menu_link">
                <i class="fa fa-handshake-o "></i>
                <a href="distributionlist.php">Distribution List</a>
            </div>
            <h2>Update</h2>
            <div class="sidebar--link">
                <i class="fa fa-sign-out"></i>
                <a href="addDistributionData.php">Add Distribution data</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-calendar-check-o"></i>
                <a href="addaffectedpeople.php">Add Affected People</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-files-o"></i>
                <a href="rationCalculator.php">Ration Calculator</a>
            </div>
            <h2>Disaster View</h2>
            <div class="sidebar--link">
                <i class="fa fa-money"></i>
                <a href="affectedareaview.php">Affected area</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-briefcase"></i>
                <a href="affectedStructure.php"> Affected Structure</a>
            </div>
            <div class="sidebar--logout">
                <i class="fa fa-power-off"></i>
                <a href="logout.php">Log out</a>
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    <p>&copyright All rights reserved. <?php echo $_SESSION['name']?></p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/script.js"></script>
<script defer src="css/font/js/all.js"></script>
<script src="boot/js/bootstrap.min.js"></script>\
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="css/font/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script>
    var ctx2 = document.getElementById('myChart1').getContext('2d');
    var chart2 = new Chart(ctx2, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Male','Female','Child'],
            datasets: [{
                label: 'Ratio of Gender',
                backgroundColor: ['rgb(255, 99, 132)','rgb(155, 155, 0)','rgb(255, 155, 155)'],
                borderColor: 'rgb(0, 99, 132)',
                data: [<?php echo $male ?>, <?php echo $female ?>, <?php echo $children?>]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>
</body>
</html>

