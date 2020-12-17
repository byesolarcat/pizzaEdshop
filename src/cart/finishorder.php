<?php
    require dirname(__DIR__).'\db.php';
    if (isset($_SESSION['cart']))
    {
        $userid = $_COOKIE['userid'];
        $checkoutprice = $_SESSION['order']['price'];
        mysqli_query($link, "INSERT INTO orders(userid, price) VALUES ('$userid', '$checkoutprice')");
        $order = mysqli_query($link,
        "SELECT MAX(orderid) as 'orderid'
            FROM orders
            WHERE userid = $userid
        LIMIT 1");
        $orderid = mysqli_fetch_assoc($order)['orderid'];
        foreach($_SESSION['cart'] as $cartitem)
	    {
            $itemid = current(array_keys($_SESSION['cart']));
            $volume = $cartitem['volume'];
            mysqli_query($link, "INSERT INTO orderscontent(orderid, itemid, volume) VALUES ($orderid, $itemid, $volume)");
        }
        unset($_SESSION['cart']);
        echo '<script> alert("Ваш заказ '.$orderid.' принят!");
        window.location.href = "/index.php"</script>;';
    }
    else
    {
        echo '<script>window.location.href = "/index.php"</script>;';
    }
?>
