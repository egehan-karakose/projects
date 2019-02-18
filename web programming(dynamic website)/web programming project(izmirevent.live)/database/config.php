<?php 
    session_start();
    ob_start();

    $server = "localhost";
    $username = "root";
    $password = "root";
    $database = "IzmirEvent";

    $link = mysqli_connect($server,$username,$password);
    $db = mysqli_select_db($link,$database);

    mysqli_query($link,"set names utf8");
    
?>