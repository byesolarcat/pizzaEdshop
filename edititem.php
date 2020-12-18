<?php
	require 'src/db.php';
	if($_COOKIE['isadmin'] == 0)
        header("Location: /");
	$itemid=$_GET['item'];
  	$item = mysqli_query($link,"SELECT * FROM `goods` WHERE `id`='$itemid'");
	$item = mysqli_fetch_assoc($item);
	$categories = mysqli_query($link,"SELECT * FROM `categories`");
	if(isset($_POST['title']))
	{
		$title = trim($_POST['title']);
		$description = trim($_POST['description']);
		$smalldescription = trim($_POST['smalldescription']);
		$structure = trim($_POST['structure']);
		$category = intval($_POST['category']);
		$price = floatval($_POST['price']);
		
		if ($_FILES['image']['error'] == 0)
		{
			print_r($_FILES);
			$image  = $_FILES['image']['tmp_name'];
			if(isset($image))
			{
				if (!move_uploaded_file($image, __DIR__ . '/img/items/' .$_FILES['image']['name']))
				{
					die('При записи изображения на диск произошла ошибка.');
        		}
			}
			$image = $_FILES['image']['name'];
			mysqli_query($link, "UPDATE `goods`
				SET Title = '$title', Description = '$description', SmallDescription = '$smalldescription',
				Structure = '$structure' ,Category = $category , ImageSource = '$image', price = $price
				WHERE id = $itemid");
		} 
		else
		{
			mysqli_query($link, "UPDATE `goods`
				SET Title = '$title', Description = '$description', SmallDescription = '$smalldescription',
				Structure = '$structure' ,Category = $category, price = $price
				WHERE id = $itemid");
		}
		echo '<script>window.location.href = "/itemInf.php?item='.$itemid.'";</script>';
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
		<?php require 'src/header.php';
			echo '<form enctype="multipart/form-data" action="edititem.php?item='.$itemid.'" method="POST">';
			?>
			<?php
				echo'
				<label for="title"><b>Название товара*:</b></label>
				<input name="title" type = "text" placeholder="Введите название товара" value = "'.$item['Title'].'" required><span></span></p>
				<label for="category"><b>Категория*:</b></label>
				<select name="category">';
					for($i = 0; $i <= 6; $i++)
					{
						$category = mysqli_fetch_assoc($categories);
						if(isset($category))
						{
							echo '<option value='.$category['Id'].'>'.$category['Title'].' ';
						}
					}
				echo' </select>
				<label for="description"><b>Описание (характеристики товара и пр.)*:</b></label>
				<input name="description"  type="text" placeholder="Введите описание товара" value = "'.$item['Description'].'" required><span></span></p>
				<label for="smalldescription"><b>Краткое описание товара: </b></label>
				<input name="smalldescription" type="text" placeholder="Введите краткое описание товара (необязательно)" value = "'.$item['SmallDescription'].'"><span></span></p>
				<label for="structure"><b>Состав: </b></label>
				<input name="structure" type="text" placeholder="Введите состав товара (необязательно)" value = "'.$item['Structure'].'"><span></span></p>
				<label for="price"><b>Цена*: </b></label>
				<input name="price" type="number" placeholder="Введите цену товара" value = "'.$item['price'].'" required><span></span></p>
				<label for="image"><b>Изменить изображение: </b></label>
				<input type="file" name="image">
				<button type="submit" class="registerbtn">Добавить</button>';
			?>
		</form>
	</body>
</html>