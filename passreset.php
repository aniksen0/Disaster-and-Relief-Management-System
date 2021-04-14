<?php
/**
 * Created by PhpStorm.
 * User: chapal
 * Date: 1/11/2021
 * Time: 2:21 AM
 */
session_start();
require_once "connection.php";
    if (!isset($_SESSION['id']))
    {
        header("Location: AcessDenied.php");
        return;

    }
    else
    {
        if (isset($_POST['first'])&&isset($_POST['second']))
    {
        if ($_POST['first']==$_POST['second'])
        {
            $salt = 'XyZzy12*_';
            $pw = hash('md5', $salt . $_POST['first']);
            $sql="UPDATE login set pass=:pass WHERE id=:id";
            $data=$conn->prepare($sql);
            $data->execute(array(
                ':id'=>$_SESSION['id'],
                ':pass'=> $pw

            ));
            date_default_timezone_set("Asia/Dhaka");
            $sql1= "INSERT INTO syslog (Action,time,id) VALUES(:action, :time,:id)";
            $stmt1= $conn->prepare($sql1);
            $stmt1->execute(array(
                ':id'=>htmlentities($_SESSION['id']) ,
                ':action'=>"Reseted password",
                ':time'=>date("Y-m-d h:i:s"),
//       ############# need to work on that addid..........#################
            ));
            $_SESSION['success']="Record Updated";


            if ($_SESSION['role']== 4)
            {
                header("Location: admin.php");

                return;

            }
            else if ($_SESSION['role']<=3)
            {
                header("Location: reliefMainPage.php");
                return;
            }
            else
            {
                echo "there is problem";
            }


        }



        else
        {
            $_SESSION["error"]="problem";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/font/css/all.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="css/mainStyle.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!--    <link rel="stylesheet" href="css/mainStyle.css">-->
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
</head>
<body class="bg-light">
<header class="jumbotron">
    <div class="container">
        <div class="row align-items-center row-header">
            <div class="col-12 col-sm-5">
                <h1>Welcome <p style="color: indianred;"> <?php echo $_SESSION['name'];?></p></h1>
            </div>
            <div class="col-sm-2 justify-content-center" >
                <a href="logout.php">
                    <button type="button" class=" col-12 btn btn-warning" id="registration">Logout</button>
                </a>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class=" text-center ">
        <p class="">Please change your <strong style="color:indianred"> one time password </strong> before Login.</p>
        <p class="blinking" style="background-color: indianred; font-weight: bold;font-size: larger">Parameter:Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</p>
    </div>
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
    <div class="form col-12 col-sm-4 justify-content-center">
      <form class="col-auto" method="post">
          <div class="form-group row ">
              <label for="first" class="col-md-4 col-form-label">Password</label>
              <div class="col-md-8">
                  <input  type="password" class="form-control" id="first" name="first" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                         title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
              </div>

          </div>
          <div class="form-group row">
              <label for="second" class="col-md-4 col-form-label">Enter again</label>
              <div class="col-md-8">
                  <input type="password" class="form-control" id="second" name="second" placeholder="Enter again" >
              </div>
          </div>
          <input type="checkbox" id="same" name="same" onchange= "check()"/>
          <label for = "same">Is the everything ok?</label>
          <p id="msg" style="color: red;"></p>
          <br>
          <button type="submit" class="btn btn-success" name="add">Update</button>

      </form>
    </div>

</div>
<footer class="footer d-flex align-items-center justify-content-center">
    &copy;2021 Copyright Ministry of Disaster Management and Relief
</footer
<script src="css/font/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="boot/js/bootstrap.min.js"></script>
<script>
    function check() {
        var a=document.getElementById("first").value;
        var b=document.getElementById("second").value;
        var result = a.localeCompare(b)
        var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
        if (document.getElementById("same").checked===true)
        {
            if(a.match(paswd)) {
                if (a === b) {
                    document.getElementById("msg").innerHTML = "Password matched";
                }
                else {
                    document.getElementById("msg").innerHTML = "Password didn't matched ";
                    document.getElementById("same").checked = false;
                    console.log(a, b);
                }
            }
            else
                {
                    document.getElementById("msg").innerHTML="Must required parameter";
                    document.getElementById("same").checked = false;
                }
        }



    }
</script>
</body>
</html>
