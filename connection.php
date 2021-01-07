<?php
/**
 * Created by PhpStorm.
 * User: chapal
 * Date: 11/23/2020
 * Time: 5:00 PM
 */
$conn= new PDO('mysql:host=localhost;port=3306;dbname=project','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>