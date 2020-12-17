<?php require 'src/db.php';
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style1.css">
		<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
		<title>ПиццаЕД | Доставка пиццы</title>
	</head>
	<body>
		<div id = "wrap">
	<?php require 'src/header.php'; ?>
			<div id = "left">Меню
				<ul id="leftbar">
					<li><a href="../Items.php?category=1">Пицца</a></li>
					<li><a href="../Items.php?category=2">Напитки</a></li>
					<li><a href="../Items.php?category=3">Акции</a></li>
					<li><a href="../about/aboutus.php">Контакты</a></li>
					<li><a href="../about/info.php">О нас</a></li>
				</ul>
			</div>
			<div id = "middle">
				<div class="slayder">
						<input type="radio" name="slides" id="slide1" checked>
						<input type="radio" name="slides" id="slide2">
						<input type="radio" name="slides" id="slide3">
						<div class="slides">
						<label for="slide1"></label>
						<label for="slide2"></label>
						<label for="slide3"></label>
					</div>
					<div class="foto">
						<div class="photo">
							<img src="/img/slider/slide1.jpg"/>
							<img src="/img/slider/slide2.jpg"/>
							<img src="/img/slider/slide3.jpg"/>
						</div>
					</div>
				</div>
			</div>
			<?php
				if(!isset($_COOKIE['username']))
				{
					echo '
					<div id = "right">Регистрация/вход
						<ul id="rightbar">
						<li><a href="../Register.php">Регистрация</a></li>
						<li><a href="../Login.php">Вход</a></li>
						<li><a href="../cart.php">Корзина</a></li>
						</ul>
					</div>';
				}
				else
				{
					echo '
					<div id = "right">'.$_COOKIE['username'].', Добро пожаловать!
						<ul id="rightbar">
							<li><a href="../cart.php">Корзина</a></li>
							<li><a href="../src/logout.php">Выход</a></li>
						</ul>
					</div>';
				}
			?>
			<div id = "bottom">
				<div class = "items-display">
					<h3 style="text-align: center;">Пицца</h3>
					<?php
						for($i = 0; $i <= 100; $i++)
						{
							$item = mysqli_fetch_assoc($pizzas);
							if(isset($item))
							{
								echo '
								<a class = "item-font" href="../ItemInf.php?item='.$item['id'].'">
								<div class="card">
									<img src="/img/items/'.$item['ImageSource'].'" alt="'.$item['SmallDescription'].'" style="width:100%">
									<h1>'.$item['Title'].'</h1>
									<p class="price">'.$item['price'].' рублей</p>
									<p>'.$item['SmallDescription'].'</p>
								</div>
								</a>';
								
							}
						}
					?>
				</div>
				<div class = "items-display">
					<h3 style="text-align: center;">Напитки</h3>
					<?php
						for($i = 0; $i <= 100; $i++)
						{
							$item = mysqli_fetch_assoc($drinks);
							if(isset($item))
							{
								echo '
								<a class = "item-font" href="../ItemInf.php?item='.$item['id'].'">
								<div class="card">
									<img src="/img/items/'.$item['ImageSource'].'" alt="'.$item['SmallDescription'].'" style="width:100%">
									<h1>'.$item['Title'].'</h1>
									<p class="price">'.$item['price'].' рублей</p>
									<p>'.$item['SmallDescription'].'</p>
								</div>
								</a>';
							}
						}
					?>
				</div>
				<div class = "items-display">
					<h3 style="text-align: center;">Акции</h3>
					<?php
						for($i = 0; $i <= 100; $i++)
						{
							$item = mysqli_fetch_assoc($sales);
							if(isset($item))
							{
								echo '
								<a class = "item-font" href="../ItemInf.php?item='.$item['id'].'">
								<div class="card">
									<img src="/img/items/'.$item['ImageSource'].'" alt="'.$item['SmallDescription'].'" style="width:100%">
									<h1>'.$item['Title'].'</h1>
									<p>'.$item['SmallDescription'].'</p>
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
		