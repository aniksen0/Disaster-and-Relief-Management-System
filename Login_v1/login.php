<?php
session_start();
require_once "../connection.php";

// p' OR '1' = '1


if ( isset($_POST['id']) && isset($_POST['pass'])  ) {

    $salt='XyZzy12*_';
    $pw= hash('md5',$salt.$_POST['pass']);
    $check='1a52e17fa899cf40fb04cfc42e6352f1';
    echo("<p>Handling POST data...</p>\n");
    $sql = "SELECT name FROM users
        WHERE id = :id AND pass = :pw";

    echo "<p>$sql</p>\n";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_POST['id'],
        ':pw' => $pw
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_POST['id']==null || $_POST['pass']==null)
    {
        $_SESSION['error']="pass and password are required";
    }
    else if($_POST['pass']=null){
        $_SESSION['error']="Incorrect password";

    }
    else if (!preg_match("/@/i", $_POST['id'])) {
        $_SESSION['error']= "id must have an at-sign (@)";

    }
    else
    {
        if ( $row!=true ) {
            echo "<h1>Login incorrect.</h1>\n";
            $_SESSION['error']="Incorrect Password";

            error_log("Login fail ".$_POST['id']." $pw");

            //echo $pw."\n";
            //echo $check;
        }
        else {
            $_SESSION['name'] = $_POST['id'];
            $_SESSION['success']="Log In success";
            header("Location: view.php");
            error_log("Login success ".$_POST['id']);
            return;


        }
    }


}
else
{
    echo"id and password are required";
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Anik Sen
    </title>
</head>
<body>
<p>Please Log In</p>
<?php
if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.($_SESSION['error'])."</p>\n");
    echo $_SESSION["error"];
    unset($_SESSION['error']);


}
else if (isset($_SESSION['success'])){
    echo('<p style="color: green;">'.($_SESSION['success'])."</p>\n");

    unset($_SESSION['success']);
}
?>
<form method="post">
    <p>id:
        <input type="text" name="id"></p>
    <p>Password:
        <input type="password"  name="pass"></p>
    <p><input type="submit" value="Log In"/>
        <a href="<?php echo($_SERVER['PHP_SELF']);?>">Refresh</a></p>
</form>
<p>
    Check out this
    <a href="http://xkcd.com/327/" target="_blank">XKCD comic that is relevant</a>.

</body>
</html>
