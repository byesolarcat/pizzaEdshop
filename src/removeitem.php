<?php
    require 'db.php';
    $itemid=$_GET['item'];
    mysqli_query($link,"DELETE FROM `goods` WHERE `id`='$itemid'");
    header('Location: /');
    ?>