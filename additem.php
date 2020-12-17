<?php
	require 'src/db.php';
	$categories = mysqli_query($link,"SELECT * FROM `categories`");
	if(isset($_POST['title']))
	{
		print_r($_POST);
		$title = trim($_POST['title']);
		$description = trim($_POST['description']);
		$smalldescription = trim($_POST['smalldescription']);
		$structure = trim($_POST['structure']);
		$category = intval($_POST['category']);
		$image = trim($_POST['image']);
		$price = floatval($_POST['price']);
		mysqli_query($link, "INSERT INTO `goods`(Title, Description, SmallDescription, Structure, Category, ImageSource, price)
								VALUES ('$title', '$description', '$smalldescription', '$structure' ,$category ,'$image', $price)");
	}
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
		<form action="additem.php" method="post">
			<label for="title"><b>Название товара*:</b></label>
			<input name="title" type = "text" placeholder="Введите название товара"required><span></span></p>
			<label for="category"><b>Категория*:</b></label>
			<select name="category">
				<?php
					for($i = 0; $i <= 6; $i++)
					{
						$category = mysqli_fetch_assoc($categories);
						if(isset($category))
						{
							echo '<option value='.$category['Id'].'>'.$category['Title'].' ';
						}
					}
				?>
			</select>
			<label for="description"><b>Описание (характеристики товара и пр.)*:</b></label>
			<input name="description"  type="text" placeholder="Введите описание товара" required><span></span></p>
			<label for="smalldescription"><b>Краткое описание товара: </b></label>
			<input name="smalldescription" type="text" placeholder="Введите краткое описание товара (необязательно)"><span></span></p>
			<label for="structure"><b>Состав: </b></label>
			<input name="structure" type="text" placeholder="Введите состав товара (необязательно)"><span></span></p>
			<label for="price"><b>Цена*: </b></label>
			<input name="price" type="number" placeholder="Введите цену товара" required><span></span></p>
			<label for="image"><b>Введите ссылку на изображение: </b></label>
			<input name="image" type="text" placeholder="Введите ссылку" required><span></span></p>
			<button type="submit" class="registerbtn">Добавить</button>
		</form>
	</body>
</html>