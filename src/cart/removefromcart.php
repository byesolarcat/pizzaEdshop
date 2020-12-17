<?php
    require dirname(__DIR__).'\db.php';
    $id = $_GET['item'];
    if($_SESSION['cart'][$id]['volume'] == 1)
    { 
        unset($_SESSION['cart'][$id]);
    }
    else
    {
        $_SESSION['cart'][$id]['volume']--;
    }
    header("Location: /cart.php");
?>