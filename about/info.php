<?php require dirname(__DIR__).'\src\db.php';
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="..\style1.css">
	</head>
	<body>
	    <div id = "wrap">
	        <?php require dirname(__DIR__).'\src\header.php'; ?>
            <div class = "card" style= "margin: 10% 45%; width: 150%">
	        	<p>Это магазин пицц!!!<br>
	        	Здесь мы продаём пиццы!!!<br>
                И напитки!!!!
                <br>
                Ладно, на самом деле это не магазин пицц<br>
                это сайт имитирующий интернет-магазин пицц<br><br>
                Cайт написан <a href="aboutus.php">студентами группы 846</a><br>

	        	</p><br>
            </div>
    </body>
<html