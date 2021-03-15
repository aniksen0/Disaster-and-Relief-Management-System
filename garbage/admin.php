<?php
/**
 * Created by PhpStorm.
 * User: ANIK
 * Date: 1/8/2021
 * Time: 11:35 PM
 */
session_start();

require "connection.php";

echo $_SESSION['name'];
echo $_SESSION['role'];
$_SESSION['active']="active"
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
    <link href="css/mainStyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<!--    <link rel="stylesheet" href="css/mainStyle.css">-->
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
</head>
<body style="background-color: darkslateblue">
<header class="jumbotron">
    <div class="container">
        <div class="row align-items-center row-header">
            <div class="col-12 col-sm-5">
                <h1>Welcome <p style="color: indianred;"> <?php echo $_SESSION['name'];?></p></h1>
            </div>
            <div class="col-12 col-sm-4">
                <span class="align-items-center">TIME:</span>
                <p id="date" style="font-weight: bolder"></p>
            </div>
            <div class="col-sm-2 justify-content-center" >
                <a href="logout.php">
                    <button type="button" class=" col-12 btn btn-warning" id="registration">Logout</button>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="navbarmain">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MENU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Authorization Check</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log Check</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">System Check</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Add employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Developer</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="yourInfo container" id="yourInfo">
    <div class="row align-items-center">
        <div class="col-12 col-sm-4">
            <h4>Details:</h4>
        </div>
        <div class="col-12 col-sm-4">
            <p>Your ID: <span style="color: indianred;"><?php echo  $_SESSION['id']?> </span> </p>
            <p>Your Name: <span style="color: indianred;"> <?php echo $_SESSION['name']?> </span></p>
            <p>Clearence Level: <span style="color: indianred;"> <?php echo $_SESSION['role']?></span> </p>
            <p>Status:<span style="color: indianred;"> <?php echo $_SESSION['active']?> </span> </p>



        </div>
        <div class="col-sm-2 col2">
            <img src="img/avatar.png" class="img-fluid" alt="img here">
            <p>employee Name:align-items-center</p>
        </div>
    </div>
</div>
</body>
<script src="css/font/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="boot/js/bootstrap.min.js"></script>
<script>
    function my_Clock()
    {
        this.cur_date = new Date();
        this.hours = this.cur_date.getHours();
        this.minutes = this.cur_date.getMinutes();
        this.seconds = this.cur_date.getSeconds();
    }
    my_Clock.prototype.run = function ()
    {
        setInterval(this.update.bind(this), 1000);
    };
    my_Clock.prototype.update = function ()
    {
        this.updateTime(1);

        document.getElementById("date").innerHTML=this.hours+":"+this.minutes+":"+this.seconds;
    };
    my_Clock.prototype.updateTime = function (secs)
    {
        this.seconds+= secs;
        if (this.seconds >= 60)
        {
            this.minutes++;
            this.seconds= 0;
        }
        if (this.minutes >= 60)
        {
            this.hours++;
            this.minutes=0;
        }
        if (this.hours >= 24)
        {
            this.hours = 0;
        }
    };
    var clock = new my_Clock();
    clock.run();
</script>
</html>