<?php
/**
 * Created by PhpStorm.
 * User: chapal
 * Date: 1/19/2021
 * Time: 2:24 PM
 */if(extension_loaded('apc') && ini_get('apc.enabled'))
{
    echo "APC enabled!";
}
else
{
    echo "no";
}