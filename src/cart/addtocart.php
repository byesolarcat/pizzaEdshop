<?php
    require dirname(__DIR__).'\db.php';
    $id=$_GET['item'];
    if(isset($_SESSION['cart'][$id]))
    { 
        $_SESSION['cart'][$id]['volume']++; 
    }
    else
    {
        $query=mysqli_query($link, "SELECT * FROM goods
        WHERE id=$id");
        $item = mysqli_fetch_assoc($query);
        if(isset($item))
        { 
            $_SESSION['cart'][$item['id']] =
            array("volume" => 1,
            "title" => $item['Title'],
            "price" => $item['price']);
        }
    }
    header("Location: /cart.php");
?>