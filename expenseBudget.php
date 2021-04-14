<?php
require_once "connection.php";
session_start();

//&& isset($_POST['sellerid'])
//&&is_numeric($_POST['sellerid'])
if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['cost'])&& isset($_POST['expdetails']))
{
    if (is_numeric($_POST['id'])&&is_numeric($_POST['cost'])) {
        $sql1 = "INSERT INTO expense VALUES (:id,:catid,:name,:remarks,:addid,:cost,:sellerid)";

        $data = $conn->prepare($sql1);

        $data->execute(array(
        ':id' => $_POST['id'],
        ':catid' => $_POST['catid'],
        ':name' => $_POST['name'],
        ':remarks' => $_POST['expdetails'],
        ':addid' => 2,
        ':cost' => $_POST['cost'],
        ':sellerid' => 300
    ));
        date_default_timezone_set("Asia/Dhaka");
        $sql1= "INSERT INTO syslog (Action,time,id) VALUES(:action, :time,:id)";
        $stmt1= $conn->prepare($sql1);
        $stmt1->execute(array(
            ':id'=>htmlentities($_SESSION['id']) ,
            ':action'=>"Added expense Data",
            ':time'=>date("Y-m-d h:i:s"),
//       ############# need to work on that addid..........#################
        ));


        $_SESSION['success'] = "Inserted";
        header("Location:expenseBudget.php");
        return;
}
else
    {
        $_SESSION['error']="Please insert appropriate data";
        header("Location:expenseBudget.php");
        return;

    }

}

//
//
//

//if (isset($_POST['id'])&&isset($_post['catid'])&&isset($_post['name'])&&isset($_post['cost'])&&isset($_post['expdetails'])) {
//
//
//    $query = "INSERT INTO expense VALUES (:id,:catid,:name,:remarks,:addid,:cost,:sellerid)";
//    $data = $conn->prepare($query);
//    $data->execute(array(
//        ':id' => $_POST['id'],
//        ':catid' => $_POST['catid'],
//        ':name' => $_POST['name'],
//        ':remarks' => $_POST['expdetails'],
//        ':addid' => 2,
//        ':cost' => $_POST['cost'],
//        ':sellerid' => 300
//    ));
//}
//    else
//    {
//        $_SESSION['error']="same problem";
//    }

$sql2="Select * from expense";
$data2=$conn->query($sql2);
$rows = $data2->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/font/css/all.min.css"crossorigin="anonymous">

    <link rel="stylesheeet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainSidebar.css" >
    <link rel="stylesheet" href="css/mainStyle.css" >

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Dashboard</title>
</head>
<body id="body">
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
                    <p>Welcome to your admin dashboard</p>
                </div>
            </div>

            <!--            CHART DIV HERE-->
            <div class="row chartrow">
                <div class=" firstchart col-sm-4">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="secondchart col-sm-4">
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="thirdchart col-sm-4">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>


            <hr>
            <p></p>
            <hr>
            <!--            Form for expense start-->
            <div class="formforbudget formexpense">
                <div class="form-head">
                    <?php
                    if (isset($_SESSION['success']))
                    {
                        echo('<p style="color: white;" > SUCESS:::'.htmlentities($_SESSION['success'])."</p>\n");


                    }
                    if (isset($_SESSION['error']))
                    {
                        echo('<p style="color: white;">ERROR::::'.htmlentities($_SESSION['error'])."</p>\n");


                    }
                    ?>

                    <h3> Add category and Expense</h3>

                </div>
                <div class="form-content  row">
                    <form method="post">
                        <div class="form-group col-sm-4 ">
                            <label for="ID"> ID:</label>
                            <div class="input1">
                                <input id="newinput" type="number" size="20px" placeholder="Enter ID" name="id" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="category"> Category id:</label>
                            <div class="input2">
                                <input type="number" size="20px" placeholder="Add Category id" name="catid" required>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="Budget"> Name</label>
                            <div class="input3">
                                <input type="text" size="20px" placeholder="Add Name" name="name" required>
                            </div>

                        </div>
<!--                        <div class="form-group col-sm-4">-->
<!--                            <label for="amount"> SellerID</label>-->
<!--                            <div class="input4">-->
<!--                                <input type="number" size="20px" placeholder="Seller-ID" name="sellerid" required>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group col-sm-4">
                            <label for="amount">Expense</label>
                            <div class="input5">
                                <input id="amount" type="number" size="20px" placeholder="Add Cost" name="cost" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="amount"> Expense Details</label>
                            <div class="input1">
                                <textarea type="text" size="20px" placeholder="Expense Details" name="expdetails" required> </textarea>
                            </div>
                        </div>

                        <div class="form btn-group col-sm-4 btnexpense">
                            <input class="btn btn-info text-dark" type="submit" id="expenseSub"  name="add" value="ADD">
                        </div>
                        <div class="col-sm-4">


                        </div>

                    </form>
                </div>
            </div>

            <!--            Form for expense end-->

            <!--            Start form table-->
            <div class="table tablebudget" style="overflow-x:auto;">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>

                        <th scope="col">Name</th>
                        <th scope="col">SellerID</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Expense Details</th>
                        <th scope="col"> Added By</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($rows as $row)
                    {
                        echo "<tr><td>";
                        echo (htmlentities($row['id']) );
                        echo " </td><td>";
                        echo(htmlentities($row['catid']));
                        echo " </td><td>";
                        echo (htmlentities($row['name']));
                        echo " </td><td>";
                        echo (htmlentities($row['sellerid']));
                        echo " </td><td>";
                        echo (htmlentities($row['cost']));
                        echo " </td><td>";
                        echo (htmlentities($row['remarks']));
                        echo " </td><td>";
                        echo (htmlentities($row['addid']));

                        echo " </td><td>";

                        echo'<a href="edit.php?user_id='.$row['id'].'">Edit</a>';
                        echo"/";
                        echo'<a href="delete.php?user_id='.$row['id'].'">Delete</a>';
                        echo "</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!--            End form table-->
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
                <div class="sidebar--link active_menu_link">
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
    <p>&copyright All rights reserved</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/script.js"></script>
<script defer src="css/font/js/all.js"></script>
<script src="boot/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="js/reliefMainPagechart.js"></script>
</body>
</html>
