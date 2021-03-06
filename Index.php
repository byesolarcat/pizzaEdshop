<?php require 'src/db.php';
session_start();
?>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
	<title> ПиццаЕД | Доставка пиццы</title>
</head>

<body>
	<div id="wrap">
		<?php require 'src/header.php'; ?>
		<div id="left">Меню
			<ul id="leftbar">
				<li><a href="../Items.php?category=1">Пицца</a></li>
				<li><a href="../Items.php?category=2">Напитки</a></li>
				<li><a href="../Items.php?category=3">Акции</a></li>
				<li><a href="../about/aboutus.php">Контакты</a></li>
				<li><a href="../about/info.php">О нас</a></li>
			</ul>
		</div>
		<div id="middle">
			<div class="slider">
				<div class="sld slide1"></div>
				<div class="sld slide2"></div>
				<div class="sld slide3"></div>
			</div>
		</div>
	</div>
	<?php
	if (!isset($_COOKIE['username'])) {
		echo '
					<div id = "right">Регистрация/вход
						<ul id="rightbar">
						<li><a href="../Register.php">Регистрация</a></li>
						<li><a href="../Login.php">Вход</a></li>
						<li><a href="../cart.php">Корзина</a></li>
						</ul>
					</div>';
	} else if ($_COOKIE['isadmin'] == 1) {
		echo '
					<div id = "right">Добро пожаловать,<br>Администратор ' . $_COOKIE['username'] . ' 
						<ul id="rightbar">
							<li><a href="../additem.php">Добавить товар</a></li>
							<li><a href="../cart.php">Корзина</a></li>
							<li><a href="../src/logout.php">Выход</a></li>
						</ul>
					</div>';
	} else {
		echo '
					<div id = "right">Добро пожаловать, <br>' . $_COOKIE['username'] . ', 
						<ul id="rightbar">
							<li><a href="../cart.php">Корзина</a></li>
							<li><a href="../src/logout.php">Выход</a></li>
						</ul>
					</div>';
	}
	?>
	<div id="bottom">
		<div class="items-display">
			<h3>Пицца</h3>
			<?php
			for ($i = 0; $i < mysqli_num_rows($pizzas); $i++) {
				$item = mysqli_fetch_assoc($pizzas);
				if (isset($item)) {
					echo '
								<a class = "item-font" href="../ItemInf.php?item=' . $item['id'] . '">
								<div class="card">
									<img src="/img/items/' . $item['ImageSource'] . '" alt="' . $item['SmallDescription'] . '" style="width:100%">
									<h1>' . $item['Title'] . '</h1>
									<p class="price">' . $item['price'] . ' рублей</p>
									<p>' . $item['SmallDescription'] . '</p>
								</div>
								</a>';
				}
			}
			?>
		</div>
		<div class="items-display">
			<h3>Напитки</h3>
			<?php
			for ($i = 0; $i < mysqli_num_rows($drinks); $i++) {
				$item = mysqli_fetch_assoc($drinks);
				if (isset($item)) {
					echo '
								<a class = "item-font" href="../ItemInf.php?item=' . $item['id'] . '">
								<div class="card">
									<img src="/img/items/' . $item['ImageSource'] . '" alt="' . $item['SmallDescription'] . '" style="width:100%">
									<h1>' . $item['Title'] . '</h1>
									<p class="price">' . $item['price'] . ' рублей</p>
									<p>' . $item['SmallDescription'] . '</p>
								</div>
								</a>';
				}
			}
			?>
		</div>
		<br>
		<div class="items-display">
			<h3>Акции</h3>
			<?php
			for ($i = 0; $i < mysqli_num_rows($sales); $i++) {
				$item = mysqli_fetch_assoc($sales);
				if (isset($item)) {
					echo '
								<a class = "item-font" href="../ItemInf.php?item=' . $item['id'] . '">
								<div class="card">
									<img src="/img/items/' . $item['ImageSource'] . '" alt="' . $item['SmallDescription'] . '" style="width:100%">
									<h1>' . $item['Title'] . '</h1>
									<p>' . $item['SmallDescription'] . '</p>
								</div>
								</a>';
				}
			}
			?>
		</div>
	</div>
	</div>
</body>

</html>