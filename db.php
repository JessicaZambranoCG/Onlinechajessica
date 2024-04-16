<?php
$server = "localhost";
$user = "root";
$password = "";
$base_datos = "onlinechatjessica";


$conection = new mySqli($server, $user, $password, $base_datos);

function formatDate($date){
    return date('g: i a', strtotime($date));
}
?>