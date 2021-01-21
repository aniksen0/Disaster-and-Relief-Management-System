<?php
/**
 * Created by PhpStorm.
 * User: chapal
 * Date: 1/11/2021
 * Time: 4:10 AM
 */
session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Denied</title>
        <title>Login V1</title>
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
<div class=" main justify-content-center align-items-center text-center">
    <div>
         <H2> Access Denied</H2>
    </div>
    <div class="bg-danger">
        <h3> You are not supposed to be here. ID has been flagged as yellow. Please don't try this again.</h3>
    </div>
    <div class="img-fluid">
        <img class="img-fluid img-thumbnail" src="img/ting.jpg" alt="restriction">
    </div>
    <div>
        <h4> follow this link <a href="index.php">Click</a> </h4>
    </div>
</div>


<script src="css/font/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="boot/js/bootstrap.min.js"></script>
</body>
</html>