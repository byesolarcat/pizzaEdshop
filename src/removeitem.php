<?php
    require 'db.php';
    if($_COOKIE['isadmin'] == 0)
        header("Location: /");
    $itemid=$_GET['item'];
    mysqli_query($link,"DELETE FROM `goods` WHERE `id`='$itemid'");
    header('Location: /');
    ?>