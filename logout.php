<?php
    session_start();
    //銷毀函數
    session_destroy();
    header("Location: index.php");

    exit();

?>