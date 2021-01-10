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
</head>
<body>
<H2> Access Denied</H2>
<p> You are supposed to be not here. ID has been flagged as yellow. Please don't try this again.</p>
<p> follow this link <a href="Login_v1/login.php">Click</a> </p>

</body>
</html>