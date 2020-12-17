<?php require 'src/db.php';
	$category = $_GET['category'];
	$items = mysqli_query($link,"SELECT * FROM `Goods` WHERE `Category`=$category");
	$categoryName = mysqli_fetch_assoc(mysqli_query($link,"SELECT Title FROM `categories` WHERE `id`=$category"))['Title'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style1.css">
		<?php echo '<title>ПиццаЕД | '.$categoryName.'</title>';?>
	</head>
	<body>
		<div id = "wrap">
	<?php require 'src/header.php'; ?>
	<?php
		
		for($i = 0; $i <= 100; $i++)
		{
			$item = mysqli_fetch_assoc($items);
			if(isset($item))
			{
				echo '
				<a class = "item-font" href="../ItemInf.php?item='.$item['id'].'">
					<div class="card">
						<img src="'.$item['ImageSource'].'" alt="'.$item['SmallDescription'].'" style="width:100%">
					<h1>'.$item['Title'].'</h1>';
				if($category != 3)
				{
					echo '<p class="price">'.$item['price'].' рублей</p>';
				}
				echo '<p>'.$item['SmallDescription'].'</p>
				</div>
				</a>';
			}
		}
	?>
		</div>
	</body>
</html>
		