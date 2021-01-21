<?php
session_start();

require "connection.php";

// p' OR '1' = '1

if ( isset($_POST['id']) && isset($_POST['pass'])  ) {

    $salt = 'XyZzy12*_';
    $pw = hash('md5', $salt . $_POST['pass']);
    $check = 'ba71f8e7f3b18d6bcd642a90e641b85a';
    echo("<p>Handling POST data...</p>\n");
    $sql = "SELECT login.id,login.pass,employee.name,employee.imgdata,employee.role
                from login join employee
                WHERE login.id= :id and login.id=employee.id and login.pass=:pw;";

    echo "<p>$sql</p>\n";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':id' => $_POST['id'],
        ':pw'=>$pw

    ));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $_SESSION['role']=$row['role'];
    $_SESSION['img']=$row['imgdata'];
    $_SESSION['name']=$row['name'];
    $_SESSION['id']=$row['id'];
    if ($count!=1)
    {
        echo "wrong pass";
    }
    else if ($count==1)
    {
        if ($row['pass']==$check)
        {
            header("Location:passreset.php");
            return;
        }
    }



    
    if (($row['pass']!=$check)&&($count==1))
    {
        if ($_SESSION['role']==4)
        {
            header("Location:adminmanagement/dashboard.php");
            return;
        }
        if ($_SESSION['role']<=3)
        {
            header("Location:reliefMainPage.php");
            return;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="Login_v1/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
    <link rel="stylesheet" type="text/css" href="Login_v1/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="Login_v1/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Support Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid ID is required">
                    <input class="input100" type="text" name="id" placeholder="ID">
                    <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-badge"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							Problem? Contact your administrator.
						</span>

                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">


                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    &copy; Copyright Ministry of Disaster Management and Relief
</footer


    <!--===============================================================================================-->
<script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
<script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="Login_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="Login_v1/js/main.js"></script>

</body>
</html>