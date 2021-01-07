<?php
require "connection.php";
session_start();

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
                    <p>Welcome to your admin Registration dashboard</p>
                </div>
            </div>




            <hr>
            <div class="adminRegister col-sm-12">
                <form  class="" method="post">
                    <h1>Register</h1>
                    <p>GROUP POLICY AND ROLE.</p>
                    <hr>
                    <div class="form-row">
                        
                        <div class="col-sm-4">
                                <label for="id"><b>ID:</b></label>
                                <input class="input form-control" type="text" size="20" maxlength="10" placeholder="Enter USER ID" name="id" id="role" required>
                        </div>

                        <div class="col-sm-8">
                            <label for="email" ><b>Email:</b></label>
                            <input class="input form-control" type="text" size="25" placeholder="Enter Email" name="email" id="email" required>
                        </div>
                    </div>


                        <div class="col-sm-12">
                            <hr>
                            <label for="file">Employee Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            <span style="color: indianred;">File size should be less than 1MB</span>
                            <hr>
                        </div>
                        <div class="col-sm-12">
                            <label for="psw"><b>Password:</b></label>
                             <input class="input form-control" type="password" size="25" placeholder="Enter one time Password" name="psw" id="psw" required>
                            <hr>
                        </div>
                            <br>
                            <div class="col-sm-6 form-content">

                                <label for="role">Place a job role:</label>
                                <select class="input form-control"  id="role" size="1"  name="role">
                                    <option value="4" disabled>System Administrator</option>
                                    <option value="3" >Data Validator</option>
                                    <option value="2" >IT administrator</option>
                                    <option selected value="1" >Data Entry</option>
                                </select>
                                <hr>
                            </div>

                                <br>
                                <div class="col-sm-6">
                                    <label for="date"><b>Joining Date:</b></label>
                                    <input class="input form-control" type="date" size="25" placeholder="Enter date" name="date" id="role" required>
                                    <hr>
                                </div>
                    <div class="col-sm-12">
                        <label for="ec"><b>Emergency Contact No:</b></label>
                        <input class="input form-control" type="text" placeholder="Contact no" name="ec" id="email" required>
                        <br>
                        <hr>
                    </div>
                        <p>Please provide all the information and follow <a href="#">Rules and Regulationsy</a>.</p>
                        <button type="submit" class=" btnreg btn btn-success">Register</button>
                <hr>
                </form>
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
                <a href="#">Dashboard</a>
            </div>
            <h2>MNG</h2>
            <div class="sidebar--link">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
                <a href="#">Admin Management</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-building-o"></i>
                <a href="#">Company Management</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-wrench"></i>
                <a href="#">Employee Management</a>
            </div>
            <div class="sidebar--link active">
                <i class="fa fa-archive"></i>
                <a href="#">Warehouse</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-handshake-o"></i>
                <a href="#">Contracts</a>
            </div>
            <h2>LEAVE</h2>
            <div class="sidebar--link">
                <i class="fa fa-question"></i>
                <a href="#">Requests</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-sign-out"></i>
                <a href="#">Leave Policy</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-calendar-check-o"></i>
                <a href="#">Special Days</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-files-o"></i>
                <a href="#">Apply for leave</a>
            </div>
            <h2>PAYROLL</h2>
            <div class="sidebar--link">
                <i class="fa fa-money"></i>
                <a href="#">Payroll</a>
            </div>
            <div class="sidebar--link">
                <i class="fa fa-briefcase"></i>
                <a href="#">Paygrade</a>
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
<script src="boot/js/bootstrap.min.js"></script>
</body>
</html>
