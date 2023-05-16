<?php
    //資料庫連線
    $host = "localhost";
    $dbname = "login_db";
    $username = "root";
    $password = "80322329";

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_errno){
     die("Connction error: " . $mysqli->connect_error);
    }
    
    return $mysqli;

?>