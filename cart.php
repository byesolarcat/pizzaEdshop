<?php
	require 'src/db.php';
	?>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style1.css">
		<title>ПиццаЕД | Корзина</title>
	</head>
	<body>
		<div id = "wrap">
	<?php require 'src/header.php'; ?>
				<?php
				if (isset($_SESSION['cart']))
				{
					echo '<h3>Корзина:</h3>';
					$checkoutprice = 0;
					foreach($_SESSION['cart'] as $cartitem)
					{
						$itemid = key($_SESSION['cart']);
						$fullprice = $cartitem['price'] * $cartitem['volume'];
						$checkoutprice += $fullprice;
						echo '<div class = "basket_item">
							<p align="center">'.$cartitem['title'].'<br>
							Количество - '.$cartitem['volume'].' шт. <br>
							Цена - '.$fullprice.' рублей
							</p><br>
							<a href="../src/cart/removefromcart.php?item='.$itemid.'">
								Удалить из корзины
							</a>
						</div>
						';
						next($_SESSION['cart']);
					}
					$_SESSION['order'] = array('price' => $checkoutprice);
					echo '<p align="center">Итого:'.$checkoutprice.' рублей</p>';
					if (isset($_COOKIE['userid']))
					{
						echo '<a href="../src/cart/finishorder.php">
							Завершить заказ
							</a>';
					}
					else
					{
						echo '<h4> Для завершения заказа необходимо зайти в аккаунт</h4>';
						echo '<p><a href="../login.php"><br>
							Войти в аккаунт</a></p>';
						echo '<p>Ещё нет аккаунта?<a href="../register.php"><br>
							Зарегистрироваться</a></p>';
						
					}
				}
				else
				{
					echo '<h3>Корзина пустая</h3>';
					echo '<a href="../"> Вернуться к покупкам</a>';
				}
				?>
		</div>
	</body>
</html>