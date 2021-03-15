
<?php
/**
// * Created by PhpStorm.
// * User: anik
// * Date: 11/27/2020
// * Time: 1:59 PM
// */
session_start();
require "connection.php";

if (!isset($_SESSION['role'])&&!isset($_SESSION['name']))
{
    header("Location:AcessDenied.php");
    return;
}
else
{
    $sql2="SELECT * from disaster";
    $data = $conn->query($sql2);
    $rows = $data->fetchALL(PDO::FETCH_ASSOC);
    if (isset($_POST["name"]) && isset($_POST['division']))
    {
        $sql= "INSERT INTO disaster (disastertype,division,district,jilla,thana,disasterName,occuringlat,occuringlan) VALUES(:disastertype,:division,:district,:upazilla,:thana,:name,:latitude,:longitude)";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array(

            ':division'=>htmlentities($_POST['division']),
            ':disastertype'=>htmlentities($_POST['disastertype']),
            ':district'=>htmlentities($_POST['district']),
            ':upazilla'=>htmlentities($_POST['upazilla']),
            ':thana'=>htmlentities($_POST['thana']),
            ':name'=>htmlentities($_POST['name']),
            ':latitude'=>($_POST['latitude']),
            ':longitude'=>($_POST['longitude']),


        ));
        header("Location:currentdisastersituation.php");
        $_SESSION['success']="Successful";
        return;

    }
}
$data=["10","20","30"];
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
            <div class="row">
                <div class="col col-sm-6">
                    <a href="mapdata.php" style="text-decoration:none"><button class="btn btn-info"> Map data </button></a>
                </div>
                <div class="col col-sm-6">
                    <a href="windy.php" style="text-decoration:none"><button class="btn btn-info"> Weather Map data </button></a>
                </div>
            </div>
            <hr>

            <!--            ############Beginn Chart Budget############-->

            <!--###########Chart end###################-->
            <hr>
            <p></p>
            <hr>
            <!--            ###############Adding people form####################-->
            <div class="formforbudget container justify-content-center align-content-center">
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

                    <h3> Upcoming Disaster</h3>
                </div>
                <div class="form-content form-inline row">
                    <form method="post">

                        <div class="form-group">
                            <label for="dis"> Disaster Type::</label>
                            <select name="disastertype" id="dis"">
                                <option selected> --Disaster Type--</option>
                                <option value="Flood">Flood</option>
                                <option value="Tsunami">Tsunami</option>
                                <option value="Cyclone">Cyclone</option>
                                <option value="EarthQuake">EarthQuake</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="new"> Division::</label>
                            <select name="division" id="new" ">
                                <option selected> --Division--</option>
                                <option value="Barishal">Barisal</option>
                                <option value="Chattogram">Chattogram</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Sylhet">Sylhet</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="districtsele"> District::</label>
                            <input name="district" id="districtsele" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="upa"> Jilla::</label>
                            <input type="text" id="upa" required placeholder="Upazilla" name="upazilla">
                        </div>
                        <div class="form-group">
                            <label for="category1">Thana:</label>
                            <input type="text" id="category1" required placeholder="Thana" name="thana">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" required placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Latitude:</label>
                            <input type="text" id="name" required placeholder="Latitude" name="latitude">
                        </div>
                        <div class="form-group">
                            <label for="longitude">longitude:</label>
                            <input type="text" id="longitude" required placeholder="Longitude" name="longitude">
                        </div>

                        <!--                            <div class="form-group">-->
                        <!--                                <label for="Population">Number</label>-->
                        <!--                                <input type="text" required placeholder="Number" name="population">-->
                        <!--                            </div>-->

                        <input id="" type="submit" style="color: #000;" class=" justify-content-center align-items-center btn btn-danger" name="add" value="ADD">
                    </form>
                </div>


            </div>


            <!--            ###############Adding people form end here####################-->

            <div class="table tablebudget" style="overflow-x:auto;">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Disaster Type</th>
                        <th scope="col">Division</th>
                        <th scope="col">District</th>
                        <th scope="col">Upazilla</th>
                        <th scope="col">Thana</th>
                        <th scope="col">Name</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Occuring_from</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($rows as $row)
                    {
                        echo "<tr><td>";
                        echo(htmlentities($row['disastertype']));
                        echo " </td><td>";
                        echo(htmlentities($row['division']));
                        echo " </td><td>";
                        echo (htmlentities($row['district']));
                        echo " </td><td>";
                        echo (htmlentities($row['jilla']));
                        echo " </td><td>";
                        echo (htmlentities($row['thana']));
                        echo " </td><td>";
                        echo (htmlentities($row['disasterName']));
                        echo " </td><td>";
                        echo (htmlentities($row['started_at']));
                        echo " </td><td>";
                        echo (htmlentities($row['occuringlat']));
                        echo " </td><td>";
                        echo (htmlentities($row['occuringlan']));
                        echo "</td></tr>";
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
                <div class="sidebar--link ">
                    <i class="fa fa-home"></i>
                    Overview
                </div>
            </a>

            <h2>View</h2>
            <a href="currentdisastersituation.php">
                <div class="sidebar--link active_menu_link ">

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
    
</script>

</body>
</html>

