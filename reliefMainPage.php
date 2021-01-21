<?php
/**
 * Created by PhpStorm.
 * User: Anik
 * Date: 11/27/2020
 * Time: 1:59 PM
 */
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

    <title>Relief Dashboard</title>
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
                    <p>Welcome to your relief dashboard</p>
                </div>
            </div>
                <h3 id="disHeadline"> Current disaster:: <?php echo"None" ?></h3>
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
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Adress</th>
                            <th scope="col">Affected by </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>male</td>
                            <td>@mdo</td>
                            <td>Adress goes here</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>female</td>
                            <td>@fat</td>
                            <td>Adress goes here</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td >Male</td>
                            <td>@twitter</td>
                            <td>Adress goes here</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td >Larry the Bird</td>
                            <td >Male</td>
                            <td>@twitter</td>
                            <td>Adress goes here</td>
                        </tr>
                        </tbody>
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
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Adress</th>
                        <th scope="col">Affected by </th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>male</td>
                        <td>@mdo</td>
                        <td>Adress goes here</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>female</td>
                        <td>@fat</td>
                        <td>Adress goes here</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td >Larry the Bird</td>
                        <td >Male</td>
                        <td>@twitter</td>
                        <td>Adress goes here</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td >Larry the Bird</td>
                        <td >Male</td>
                        <td>@twitter</td>
                        <td>Adress goes here</td>
                    </tr>
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
                        <th scope="col">Product type</th>
                        <th scope="col">Needed</th>
                        <th scope="col">Amount</th>
                        <th scope="col">distributed</th>
                        <th scope="col">Lackings</th>

                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>male</td>
                        <td>@mdo</td>
                        <td>Adress goes here</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>female</td>
                        <td>@fat</td>
                        <td>Adress goes here</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td >Larry the Bird</td>
                        <td >Male</td>
                        <td>@twitter</td>
                        <td>Adress goes here</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td >Larry the Bird</td>
                        <td >Male</td>
                        <td>@twitter</td>
                        <td>Adress goes here</td>
                    </tr>
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
            <div class="sidebar--link active_menu_link">
                <i class="fa fa-home"></i>
                <a href="#">Overview</a>
            </div>
            <h2>View</h2>
            <div class="sidebar--link">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                <a href="Budget.php">Budget</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-building-o"></i>
                <a href="#">Expense</a>
            </div>
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
                <a href="#">Coming soon</a>
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

