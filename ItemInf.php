<?php
require 'src/db.php';
$itemid = $_GET['item'];
$item = mysqli_query($link, "SELECT * FROM `goods` WHERE `id`='$itemid'");
$item = mysqli_fetch_assoc($item);
?>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@500&display=swap" rel="stylesheet">
	<?php echo '<title>ПиццаЕД | ' . $item['Title'] . '</title>'; ?>
</head>

<body>
	<div id="wrap">
		<?php require 'src/header.php'; ?>
		<?php
		echo '
		<div class="selling-item">
			<div class="message-preview-1">
				<img class="message-img-1" src="/img/items/' . $item['ImageSource'] . '">
			</div>
			<div class="message-info-1">
				<h2 class="message-name-1"><a class="topic" href="#">' . $item['Title'] . '</a></h2>
				<div class="message-description-1">
					<p class = "info">' . $item['Description'] . '<br><br>';
		if (mb_strlen($item['Structure']) > 0) {
			if ($item['Category'] == 1 || $item['Category'] == 2) {
				echo 'Состав:<br><br>';
			} else {
				echo 'Описание акции:<br><br>';
			}
			echo '' . $item['Structure'] . '</p>';
		}
		if ($item['Category'] != 3) {
			echo '
				</div>
					<a href="../src/cart/addtocart.php?item=' . $_GET['item'] . '">
					Добавить в корзину
					</a>';
			if ($_COOKIE['isadmin'] == 1) {
				echo '
					<a href="../src/removeitem.php?item=' . $_GET['item'] . '">
						<br><br>Удалить товар с сайта
					</a>
					<a href="../edititem.php?item=' . $_GET['item'] . '">
						<br><br>Изменить товар
					</a>
					';
			}
			echo '</div>
				</div>
				</div>';
		}
		?>
	</div>
</body>

</html>