<?php
session_start();
require_once "../connection.php";

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
    var_dump($row);
    if ($count!=1)
    {
        echo"wrong pass";
    }
    else if ($count==1)
    {
        echo"ok enter";
        $_SESSION['name']=$row['name'];
        $name=$row['name'];
        $_SESSION['role']=$row['role'];
        $_SESSION['id']=$row['id'];
//        echo $_SESSION['name'];
//        echo $_SESSION['role'];
//        echo is_bool($_SESSION['role']==4);
        if ($row['pass']==$check)
        {
            header("Location:../passreset.php");
            return;
        }
        else
        {
            if ($_SESSION['role']== 4)
            {
                header("Location: ../admin.php");
                echo "how are you";
                return;

            }
            if ($_SESSION['role']<3)
            {
                header("Location: ../reliefMainPage.php");
                return;
            }
        }

    }
    else
    {
        echo "something wrong contact administrator";
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
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
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
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>