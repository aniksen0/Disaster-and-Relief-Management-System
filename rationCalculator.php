<?php
/**
 * Created by PhpStorm.
 * User: Anik
 * Date: 11/27/2020
 * Time: 1:59 PM
 */
session_start();
require_once "connection.php";
if (!$_SESSION['id']&&!$_SESSION['role'])
{
    header("Location:AcessDenied.php");
}
$sql = "SELECT * FROM affectedpeople";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql2 = "SELECT * FROM affectedpeople WHERE status='no'";
$stmt1 = $conn->query($sql2);
$rows2= $stmt1->fetchAll(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM categoryname";
$stmt2 =$conn->query($sql3);
$rows3= $stmt2->fetchAll(PDO::FETCH_ASSOC);

$sql4 = "SELECT * FROM disaster";
$stmt4 =$conn->query($sql4);
$disastera= $stmt4->fetchAll(PDO::FETCH_ASSOC);


$sql5 = "SELECT * FROM budget";
$stmt5 =$conn->query($sql5);
$disastera= $stmt5->fetchAll(PDO::FETCH_ASSOC);

$sql6 = "SELECT * FROM expense";
$stmt6 =$conn->query($sql6);
$disastera= $stmt6->fetchAll(PDO::FETCH_ASSOC);

//donation
$sql7 = "SELECT * FROM eachdonation";
$stmt7 =$conn->query($sql7);
$donation= $stmt7->fetch(PDO::FETCH_ASSOC);

$dd= $donation["donationtaka"];

$budgetquery="SELECT SUM(budget) as value_sum FROM budget";
$budget=$conn->query($budgetquery)->fetch(PDO::FETCH_ASSOC);

$amountquery="SELECT SUM(amount) as value_sum FROM budget";
$amount=$conn->query($amountquery)->fetch(PDO::FETCH_ASSOC);

$afford= (int)$budget['value_sum']/(int)$dd;
$affectquery="SELECT SUM(familyMember) as value_sum FROM affectedpeople";
$totalpeople=$conn->query($affectquery)->fetch(PDO::FETCH_ASSOC);

//total affected people
$peopleaffect="SELECT count(id) as value_sum FROM affectedpeople";
$affectedtotal=$conn->query($affectquery)->fetch(PDO::FETCH_ASSOC);

$data=0;
$medium=0;
$low=0;
$male = 0;
$female = 0;
$children = 0;
$totaldata=0;


$no=floor($afford);
$sql = "SELECT * FROM affectedpeople  WHERE status='no' AND priority='high' ORDER BY familyMember DESC LIMIT $no ";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (count($rows)<$no)
{
    $medium=1;
    $highcount=$no-count($rows);
//    echo $highcount;
    $sql2 = "SELECT * FROM affectedpeople  WHERE status='no' AND priority='medium' ORDER BY familyMember DESC LIMIT $highcount ";
    $stmt2 = $conn->query($sql2);
    $medium = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    if (count($medium)<$highcount)
    {
        $low=1;
        $anotherhighcount=$highcount-count($medium);
//        echo $anotherhighcount;
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
foreach ($medium as $row) {
    $male = $male + $row['male'];
    $female = $female + $row['female'];
    $children = $children + $row['under_18'];

}
foreach ($low as $row) {
    $male = $male + $row['male'];
    $female = $female + $row['female'];
    $children = $children + $row['under_18'];

}
if (isset($_POST['add'])) {
    $sql = "UPDATE affectedpeople SET status=:status WHERE id=:id;)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(

        ':id' => htmlentities($_POST['id']),
        ':status' => "done",
    ));
    date_default_timezone_set("Asia/Dhaka");
    $sql1= "INSERT INTO syslog (Action,time,id) VALUES(:action, :time,:id)";
    $stmt1= $conn->prepare($sql1);
    $stmt1->execute(array(
        ':id'=>htmlentities($_SESSION['id']) ,
        ':action'=>"Updated Ration Taka",
        ':time'=>date("Y-m-d h:i:s"),
//       ############# need to work on that addid..........#################
    ));
}
if (floor($afford)<(int)$affectedtotal['value_sum'])
{
    $lackings=floor($afford)-(int)$affectedtotal['value_sum'];
}
else
{
    $lackings=0;
}

echo "eita".$lackings;
if (isset($_POST['donation']))
{
    $number=$_POST['updatedonation'];
    $sql = "UPDATE eachdonation SET donationtaka=:donation WHERE id=1;)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ":donation"=>htmlentities($number)

    ));
    header("location:rationCalculator.php");
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/font/css/all.min.css" crossorigin="anonymous">

    <link href="css/font/css/all.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="css/mainStyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!--    <link rel="stylesheet" href="css/mainStyle.css">-->
    <link href="boot/css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/mainSidebar.css" >
    <link rel="stylesheet" href="css/mainStyle.css" >

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <title>Relief Dashboard</title>
</head>
<body id="body" class="bg-danger">
<div class="container1">
    <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <div class="navbar--right">
            <img src="img/logo.svg" alt="mainlogo" id="farleft" height="50px" width="50px" />
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> <i class="fas fa-search"></i></button>


            <a href="#">
                <i class="fas fa-clock-o" aria-hidden="true"></i>
            </a>
            <a href="#">
                <img width="30" src="<?php echo  $_SESSION['img'];?>" alt="LoginPerson's img" />
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
            <!-- MAIN CARDS STARTS HERE -->

            <!-- MAIN CARDS ENDS HERE -->
            <!--            charts start here 3 charts#includeaffectedPeople (Gender) Relief(total distribution,nested totalexpense,)Category(need some improvise)-->
            <div class="chart row">
                <div class="firstChart col-sm-6 col-6">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="secondChart col-sm-6 col-6">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
            <!--        charts end here-->

            <hr>
            <hr>


            <div class="table affectedPeople" style="overflow-x:auto;">
                <div class="tableName">
                    <p class="labelAffected">Table: Affected people list</p>


                </div>

                <table class="table table-hover">
                    <thead>
                    <form method="POST" style="border: solid black 2px;">
                        <label for="donation">Relief Taka Distribution Amount:</label>
                        <input name="updatedonation" value="<?php echo $donation['donationtaka']?>" id="donation" type="text" >
                        <button name="donation" class="btn btn-info">Update</button>
                    </form>
                    <p class="alert alert-info text-center">We Can afford <?php echo floor($afford )?> Family</p>
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
            <hr>

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
                <div class="sidebar--link  ">
                    <i class="fa fa-home"></i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="currentdisastersituation.php">
                <div class="sidebar--link  ">

                    <i class="fas fa-house-damage"></i>
                    Current Disaster
                </div>
            </a>
            <a href="Budget.php">
                <div class="sidebar--link ">

                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    Budget
                </div>
            </a>

            <a href="expenseBudget.php">
                <div class="sidebar--link">
                    <i class="fas fa-money-check-alt"></i>
                    Expense
                </div>
            </a>
            <div class="sidebar--link ">
                <i class="fa fa-wrench"></i>
                <a href="category.php">Category</a>
            </div>
            <div class="sidebar--link ">
                <i class="fa fa-archive"></i>
                <a href="totalDistribution.php">Total Distribution</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-list"></i>
                <a href="distributionlist.php">Distribution List</a>
            </div>
            <h2>Update</h2>
            <div class="sidebar--link">
                <i class="fas fa-pen"></i>
                <a href="addDistributionData.php">Add Distribution data</a>
            </div>
            <div class="sidebar--link">
                <i class="fas fa-pen"></i>
                <a href="addaffectedpeople.php">Add Affected People</a>
            </div>
            <div class="sidebar--link active_menu_link">
                <i class="fas fa-calculator"></i>
                <a href="rationCalculator.php">Ration Calculator</a>
            </div>
            <h2>Disaster View</h2>
            <div class="sidebar--link">
                <i class="fas fa-chart-area"></i>
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
    <p>&copy All rights reserved</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/script.js"></script>
<script defer src="css/font/js/all.js"></script>
<script src="boot/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Budget', 'Amount', 'Total-People', 'Lackings'],
            datasets: [{
                label: 'Basic Data',
                backgroundColor: 'rgb(132, 160, 124)',
                borderColor: 'rgb(132, 160, 124)',
                data: [<?php echo $budget['value_sum']?>, <?php echo $amount['value_sum']?>, <?php echo $totalpeople['value_sum']?>, <?php echo $lackings?>]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>
<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Budget', 'Amount', 'Total-People', 'Lackings'],
            datasets: [{
                label: 'Ration Data',
                backgroundColor: ['rgb(87, 93, 144)','rgb(89, 95, 114)','rgb(132, 160, 124)','rgb(195, 211, 80)'],
                borderColor: 'rgb(89, 95, 114)',
                data: [<?php echo $budget['value_sum']?>, <?php echo $amount['value_sum']?>, <?php echo $totalpeople['value_sum']?>, <?php echo $lackings?>]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>
</body>
</html>

