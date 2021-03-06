<?php
require 'src/db.php';
if ($_COOKIE['isadmin'] == 0)
	header("Location: /");
$categories = mysqli_query($link, "SELECT * FROM `categories`");
if (isset($_POST['title'])) {
	$title = trim($_POST['title']);
	$description = trim($_POST['description']);
	$smalldescription = trim($_POST['smalldescription']);
	$structure = trim($_POST['structure']);
	$category = intval($_POST['category']);
	$price = floatval($_POST['price']);
	$image  = $_FILES['image']['tmp_name'];
	if (isset($image)) {
		if (!move_uploaded_file($image, __DIR__ . '/img/items/' . $_FILES['image']['name'])) {
			die('При записи изображения на диск произошла ошибка.');
		}
	}
	$image = $_FILES['image']['name'];
	mysqli_query($link, "INSERT INTO `goods`(Title, Description, SmallDescription, Structure, Category, ImageSource, price)
								VALUES ('$title', '$description', '$smalldescription', '$structure' ,$category ,'$image', $price)");
	$item = mysqli_query($link, "SELECT Id FROM `goods` WHERE `Title`='$title' AND `Description` = '$description'");
	$itemid = mysqli_fetch_assoc($item)['Id'];
	echo '<script>window.location.href = "/itemInf.php?item=' . $itemid . '";</script>';
}
?>

<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@500&display=swap" rel="stylesheet"> 
	<title>ПиццаЕД | Добавление товара</title>
</head>

<body>
	<div id="wrap">
		<?php require 'src/header.php'; ?>
		<form enctype="multipart/form-data" action="additem.php" method="POST">
			<label for="title"><b>Название товара*:</b></label>
			<input name="title" type="text" placeholder="Введите название товара" required><span></span></p>
			<label for="category"><b>Категория*:</b></label>
			<select name="category">
				<?php
				for ($i = 0; $i <= 6; $i++) {
					$category = mysqli_fetch_assoc($categories);
					if (isset($category)) {
						echo '<option value=' . $category['Id'] . '>' . $category['Title'] . ' ';
					}
				}
				?>
			</select>
			<label for="description"><b>Описание (характеристики товара и пр.)*:</b></label>
			<input name="description" type="text" placeholder="Введите описание товара" required><span></span></p>
			<label for="smalldescription"><b>Краткое описание товара: </b></label>
			<input name="smalldescription" type="text" placeholder="Введите краткое описание товара (необязательно)"><span></span></p>
			<label for="structure"><b>Состав: </b></label>
			<input name="structure" type="text" placeholder="Введите состав товара (необязательно)"><span></span></p>
			<label for="price"><b>Цена*: </b></label>
			<input name="price" type="number" placeholder="Введите цену товара" required><span></span></p>
			<label for="image"><b>Добавить изображение: </b></label>
			<input type="file" name="image">
			<button type="submit" class="registerbtn">Добавить</button>
		</form>
</body>

</html>