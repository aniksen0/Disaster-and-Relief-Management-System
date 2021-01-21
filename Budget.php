
<?php
/**
// * Created by PhpStorm.
// * User: anik
// * Date: 11/27/2020
// * Time: 1:59 PM
// */
session_start();
require "connection.php";
if (isset($_POST['id']) && isset($_POST['product'])&&isset($_POST['budget'])&&isset($_POST['amount']) )
{
    if (is_numeric($_POST['id'])&&is_numeric($_POST['amount'])&&is_numeric($_POST['budget']))
    {

        $sql= "INSERT INTO budget VALUES(:id, :catname,:budget,:amount, :addid ,:catid )";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array(
            ':id'=>htmlentities($_POST['id']) ,
            ':catname'=>htmlentities($_POST['product']),
            ':budget'=>htmlentities($_POST['budget']),
            ':amount'=>htmlentities($_POST['amount']),
            ':addid'=>2,
            ':catid'=>htmlentities($_POST['catid'])
//       ############# need to work on that addid..........#################
        ));
        header("Location:Budget.php");
        $_SESSION['success']="Successful";
        return;

    }
    else
    {
        $_SESSION['error']="Please insert appropriate data";
        header("Location:Budget.php");
        return;
    }


}
$sql2="SELECT id,catname,budget,amount,addid from budget";
$data = $conn->query($sql2);
$rows = $data->fetchALL(PDO::FETCH_ASSOC);


    $amountCount=0;
    $budgetCount=0;
    $Category=sizeof($rows);

    foreach ($rows as $row)
    {
        $amountCount= $amountCount+$row['amount'];
        $budgetCount=$budgetCount+$row['budget'];

    }
$querycatname="SELECT * FROM categoryname";
$catnamedata=$conn->query($querycatname);
$catnames=$catnamedata->fetchAll(PDO::FETCH_ASSOC);
$options="";
foreach ($catnames as $catname)
{
    $options=$options."<option value=".$catname['id'].">".$catname['catname'].$catname['id']."</option>";
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
            <div class="chart row budgetchart">

                <div class="firstChart  col-sm-4">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="detailsforbudgetnotchart col-sm-8">
                    <div class="  col-sm-4">
                        <h4>Details:: </h4>
                            <p>Total Budget:<?php echo $budgetCount ; ?> </p>
                            <p> total category::<?php echo $Category ; ?></p>
                            <p> total amount::<?php echo $amountCount ; ?></p>
                    </div>


                    <div class=" col-sm-4">
                        <h3></h3>
                            <p>Max Budget::<?php echo $budgetCount ; ?> </p>
                            <p>Category::<?php echo $budgetCount ; ?> </p>
                            <p>Max amount::<?php echo $budgetCount ; ?> </p>
                        <p> Ration day::<?php echo "Calucalation pending."; ?></p>
                        <!--                        calculation kora lagbe ration day er-->
                    </div>
                </div>


            </div>
<!--###########Chart end###################-->
            <hr>
            <p></p>
            <hr>
<!--            ###############Adding budget form####################-->
            <div class="formforbudget">
                <div class="form-head">
                    <?php
                    if (isset($_SESSION['success']))
                    {
                        echo('<p style="color: white;" > SUCESS:::'.htmlentities($_SESSION['success'])."</p>\n");
                        unset($_SESSION['success']);

                    }
                    if (isset($_SESSION['error']))
                    {
                        echo('<p style="color: white;">ERROR::::'.htmlentities($_SESSION['error'])."</p>\n");
                        unset($_SESSION['error']);

                    }
                    ?>

                    <h3> Add Product and Budget</h3>

                </div>
                <div class="form-content form-inline row">
                    <form method="post">
                        <div class="form-group ">
                            <label for="ID"> ID:</label>
                            <input type="text" placeholder="Enter ID" name="id" required>
                        </div>

                        <div class="form-group">
                            <label for="category"> Category type:</label>
                            <select name="catid">
                                <option value="" disabled selected>Select</option>
                                <?php echo $options; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Product Name"> Product Name:</label>
                            <input type="text" placeholder="Add Name" name="product" required>
                        </div>
                        <div class="form-group">
                            <label for="Budget"> Budget:TAKA</label>
                            <input type="text" placeholder="Add budget" name="budget" required>
                        </div>
                        <div class="form-group ">
                            <label for="amount"> Amount:</label>
                            <input type="text" placeholder="Amount-PACKAGE" name="amount" required>
                        </div>

                        <input id="budgetsub" type="submit" class="btn-danger" name="add" value="ADD">
                    </form>
                </div>
            </div>


            <!--            ###############Adding budget form end here####################-->

            <div class="table tablebudget" style="overflow-x:auto;">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Budget</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Entered By</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($rows as $row)
                    {
                        echo "<tr><td>";
                        echo (htmlentities($row['id']) );
                        echo " </td><td>";
                        echo(htmlentities($row['catname']));
                        echo " </td><td>";
                        echo (htmlentities($row['budget']));
                        echo " </td><td>";
                        echo (htmlentities($row['amount']));
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


            <p> IS IT OK </p>






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
                <div class="sidebar--link">
                    <i class="fa fa-home"></i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="Budget.php">
                <div class="sidebar--link active_menu_link">

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
            <div class="sidebar--link">
                <i class="fa fa-wrench"></i>
                <a href="category.php">Category:</a>
            </div>
            <div class="sidebar--link active">
                <i class="fa fa-archive"></i>
                <a href="#">Total Distribution</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-handshake-o"></i>
                <a href="#">Lackings</a>
            </div>
            <h2>Update</h2>
            <div class="sidebar--link">
                <i class="fa fa-question"></i>
                <a href="#">Update Budget & Expense</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-sign-out"></i>
                <a href="#">Update Distribution list</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-calendar-check-o"></i>
                <a href="#">Lackings</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-files-o"></i>
                <a href="#">Ration Calculator</a>
            </div>
            <h2>Disaster View</h2>
            <div class="sidebar--link">
                <i class="fa fa-money"></i>
                <a href="#">Affected area</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-briefcase"></i>
                <a href="#"> Affected Structure</a>
            </div>
            <div class="sidebar--logout">
                <i class="fa fa-power-off"></i>
                <a href="#">Log out</a>
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
<script src="boot/js/bootstrap.min.js"></script>\
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="js/reliefMainPagechart.js"></script>

</body>
</html>

