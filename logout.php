<?php
/**
 * Created by PhpStorm.
 * User: ANIK
 * Date: 12/9/2020
 * Time: 10:43 AM
 */
session_start();
session_destroy();
header("Location:index.php");