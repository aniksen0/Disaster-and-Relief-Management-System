<?php
require "connection.php";
session_start();
if (!isset($_SESSION['role'])&&!isset($_SESSION['name']))
{
    header("Location: Login_v1/login.php");
    return;
}

if (isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['mobile'])&&isset($_POST['address'])&&isset($_POST['ec'])&&isset($_POST['email'])&&isset($_POST['role'])&&isset($_POST['date']))
{
    if (is_numeric($_POST['mobile'])&&is_numeric($_POST['ec'])&&is_numeric($_POST['role']))
    {
        $salt = 'XyZzy12*_';
        $pw = hash('md5', $salt . $_POST['password']);
        $sql="Insert INTO employee(id,name,mobile,address,emergency_contact_no,email,role,imgdata,doj) VALUES (:id,:name,:mobile,:address,:emergency_contact_no,:email,:role,:imgdata,:doj)";
        $data=$conn->prepare($sql);
        $data->execute(array(
           ':id'=>htmlentities($_POST['id']),
            ':name'=>htmlentities($_POST['name']),
            ':mobile'=>htmlentities($_POST['mobile']),
            ':address'=>htmlentities($_POST['address']),
            ':emergency_contact_no'=>htmlentities($_POST['ec']),
            ':email'=>htmlentities($_POST['email']),
            ':role'=>htmlentities($_POST['role']),
            'imgdata'=>"contentIMG",
            'doj'=>htmlentities($_POST['date'])
        ));


        $sql2="INSERT INTO login VALUES (:id,:pass)";
        $data2=$conn->prepare($sql2);
        $data2->execute(array(
            ':id'=>htmlentities($_POST['id']),
            ':pass'=>htmlentities($pw)
        ));
        $_SESSION['success']="Inserted";
        header("Location:registration.php");
        return;
    }
    else
    {
        $_SESSION["error"]="There is a problem with data. Please add appropriate data";
        header("Location:registration.php");
        return;
    }
}
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
    <link href="css/mainStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
</head>

<body style="background-color:darkslateblue">
<div class="navbarmain">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin.php">MAIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Authorization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">System Check</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="registration.php">Add employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Developer</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">

    <main>
        <div class="main--container container-fluid">
            <!-- MAIN TITLE STARTS HERE -->

            <div class="main--title">

                <div class="main--greeting">
                    <h1 style="color: white">Hello <?php echo $_SESSION['name']?></h1>
                    <p>ADD Employee</p>
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
                                <input class="input form-control" type="text" size="20" maxlength="10" placeholder="Enter USER ID" name="id" id="id" required>
                        </div>

                        <div class="col-sm-4">
                            <label for="name" ><b>Name:</b></label>
                            <input class="input form-control" type="text" size="25" placeholder="Enter Name" name="name" id="name" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="email" ><b>Email:</b></label>
                            <input class="input form-control" type="text" size="25" placeholder="Enter Email" name="email" id="email" required>
                        </div>
                    </div>


                        <div class="col-sm-12">
                            <hr>
                            <label for="file">Employee Image</label>
                            <input type="file" id="file" name="file1" value="">
                            <p style="color: indianred;">File size should be less than 1MB</p>
                            <hr>
                        </div>
                    <div class="form-row">

                        <div class="col-sm-4">
                            <label for="psw"><b>Password:</b></label>
                            <input class="input form-control" type="password" size="25" placeholder="Enter one time Password" name="password" id="psw" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="mobile" ><b>Mobile:</b></label>
                            <input class="input form-control" type="text" size="25" placeholder="EG:017********" name="mobile" id="mobile" required>

                        </div>
                        <div class="col-sm-4">
                            <label for="address" ><b>address:</b></label>
                            <input class="input form-control" type="text" size="25" placeholder="Current Address" name="address" id="address" required>

                        </div>
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
                        <input class="input form-control" type="text" placeholder="Contact no" name="ec" id="ec" required>
                        <br>
                        <hr>
                    </div>
                        <p>Please provide all the information and follow <a href="#">Rules and Regulationsy</a>.</p>
                        <button type="submit" class=" btnreg btn btn-success">Register</button>
                <hr>
                </form>
            </div>


    </main>


<footer id="footer">
    <p>&copyright All rights reserved</p>
</footer>

    <script src="css/font/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="boot/js/bootstrap.min.js"></script>
</body>
</html>
