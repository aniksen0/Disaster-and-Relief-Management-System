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


$sql2 = "SELECT * FROM affectedpeople WHERE status='done'";
$stmt1 = $conn->query($sql2);

$rows2= $stmt1->fetchAll(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM categoryname";
$stmt2 =$conn->query($sql3);
$rows3= $stmt2->fetchAll(PDO::FETCH_ASSOC);

$sql4 = "SELECT * FROM disaster";
$stmt4 =$conn->query($sql4);
$disastera= $stmt4->fetchAll(PDO::FETCH_ASSOC);

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
                <h3 class="alert alert-danger col-12 text-center"> Current disaster:: <?php foreach ($disastera as $disaster)
                    {
                        echo $disaster['disasterName'];
                    }?>
                </h3>
            <!-- MAIN CARDS STARTS HERE -->
            <div class="main--cards">
                <div class="card">
                    <i
                        class="fas fa-money-bill-alt fa-2x text-green"
                        aria-hidden="true"
                    ></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Total Budget</p>
                        <span class="font-bold text-title"><?php echo"578" ?></span>
                    </div>
                </div>

                <div class="card">
                    <i class="fas fa-dollar-sign fa-2x text-red"></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Expense</p>
                        <span class="font-bold text-title"><?php echo"578" ?></span>
                    </div>
                </div>

                <div class="card">
                    <i class="fas fa-exclamation-triangle text-yellow fa-2x"></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Total Affected People</p>
                        <span class="font-bold text-title"><?php echo"578" ?></span>
                    </div>
                </div>

                <div class="card">
                    <i
                        class="fas fa-thumbs-up fa-2x text-green"
                        aria-hidden="true"
                    ></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Total distribution</p>
                        <span class="font-bold text-title"><?php echo"578" ?></span>
                    </div>
                </div>
            </div>
            <!-- MAIN CARDS ENDS HERE -->
            <!--            charts start here 3 charts#includeaffectedPeople (Gender) Relief(total distribution,nested totalexpense,)Category(need some improvise)-->
            <div class="chart row row-cols-4">
                <div class="firstChart col-sm-4 col-4">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="secondChart col-sm-4 col-4">
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="thirdChart col-2 col-sm-4 col-4">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <!--        charts end here-->

                <hr>
            <hr>
        

            <div class="table affectedPeople" style="overflow-x:auto;">
                <div class="tableName">
                    <p class="labelAffected">Table: Affected people list</p>
                    <form method="post" class="search">
                        <input type="search">
                        <button type="submit">Search</button>
                    </form>
                </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Division</th>
                            <th scope="col">District</th>
                            <th scope="col">Thana</th>
                            <th scope="col">householding</th>
                            <th scope="col">Contact_no </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row)
                        {
                            echo "<tr><td>";
                            echo(htmlentities($row['division']));
                            echo " </td><td>";
                            echo (htmlentities($row['district']));
                            echo " </td><td>";
                            echo (htmlentities($row['thana']));
                            echo " </td><td>";
                            echo (htmlentities($row['householding']));;
                            echo " </td><td>";
                            echo (htmlentities($row['contact_no']));
                            echo " </td><td>";
                        }
                        ?>
                    </table>
            </div>
            <hr>
            <div class="table reliefNeeded" style="overflow-x:auto;">
                <div class="tableName">
                    <p class="labelAffected">Table:Distribution</p>
                    <form method="post" class="search">
                        <input type="search" placeholder="type here">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>

                        <th scope="col">Division</th>
                        <th scope="col">District</th>
                        <th scope="col">Thana</th>
                        <th scope="col">Name</th>
                        <th scope="col">householding</th>
                        <th scope="col">Contact_no </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($rows2 as $row)
                    {
                        echo "<tr><td>";
                        echo(htmlentities($row['division']));
                        echo " </td><td>";
                        echo (htmlentities($row['district']));
                        echo " </td><td>";
                        echo (htmlentities($row['thana']));
                        echo " </td><td>";
                        echo (htmlentities($row['name']));
                        echo " </td><td>";
                        echo (htmlentities($row['householding']));;
                        echo " </td><td>";
                        echo (htmlentities($row['contact_no']));
            
                        echo "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="table reliefCategory" style="overflow-x:auto;">
                <div class="tableName">
                    <p class="labelAffected">Table: Category</p>
                    <form method="post" class="search">
                        <input type="search" placeholder="type here">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($rows3 as $row)
                    {
                        echo "<tr><td>";
                        echo(htmlentities($row['id']));
                        echo " </td><td>";
                        echo (htmlentities($row['catname']));
                        echo " </td><td>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

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
                <div class="sidebar--link active_menu_link ">
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
            <div class="sidebar--link">
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
<script src="js/reliefMainPagechart.js"></script>

</body>
</html>

