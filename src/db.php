<?php
    if (!isset($_SESSION))
    {
        session_start(); 
    }
    $db_host='localhost';
    $db_user='root';
    $db_pass='root';
    $db_database='pizza_db';
    $link = mysqli_connect($db_host,$db_user,$db_pass);
    mysqli_select_db($link,$db_database) or exit("Ошибка подключения к БД".mysqli_error());
    $db=null;

    $pizzas=mysqli_query($link, "SELECT * FROM goods WHERE category = 1");
    $drinks=mysqli_query($link, "SELECT * FROM goods WHERE category = 2");
    $sales=mysqli_query($link, "SELECT * FROM goods WHERE category = 3");
    
    $maxGoodId = mysqli_fetch_assoc(mysqli_query($link, "SELECT MAX(`id`) as 'max' FROM `goods`"))['max'];
?>
