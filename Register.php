<?php
	require 'src/db.php';
	if(isset($_POST['email']))
  	{
		if($_POST['psw'] != $_POST['psw-repeat'])
		{
			echo '<script> alert("Пароли не совпадают.");
			reload();</script>';
		}
		else if(mb_strlen($_POST['psw']) < 5)
		{
			echo '<script> alert("Пароль слишком короткий.");
			reload();</script>';
		}
		else if(mb_strlen($_POST['email']) < 8)
		{
			echo '<script> alert("E-Mail слишком короткий.");
			reload();</script>';
		}
		$email = $_POST['email'];
		$query = mysqli_query($link,"SELECT `email` AS `email` FROM `users` WHERE `email`='$email'");
    	$email = mysqli_fetch_assoc($query)['email'];
		if(mb_strlen($email)>0)
		{
			echo '<script> alert("Пользователь с такой почтой уже зарегистрирован.");
			reload();</script>';
		}
		else
		{
			$pass = trim($_POST['psw']);
    		$name = trim($_POST['name']);
			$surname = trim($_POST['surname']);
			$email = trim($_POST['email']);
			$pass = md5($pass);
			mysqli_query($link, "INSERT INTO `users`(`email`, `name`, `surname`, `pass`)
			VALUES ('$email', '$name', '$surname', '$pass')");
    		header("Location: /login.php");
		}
  }
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style1.css">
	</head>
	<body>
		<div id = "wrap">
	<?php require 'src/header.php'; ?>
			<form action="Register.php" method="Post">
					<div>
						<hr>
						<label for="name"><b>Имя</b></label>
						<input type="text" placeholder="Введите Имя" name="name" required>
						<label for="name"><b>Фамилия</b></label>
						<input type="text" placeholder="Введите Фамилию" name="surname" required>
						<label for="email"><b>Email</b></label>
						<input type="text" placeholder="Введите почту" name="email" required>
						<label for="psw"><b>Пароль</b></label>
						<input type="password" placeholder="Введите пароль" name="psw" required>
						<label for="psw-repeat"><b>Повторите пароль</b></label>
						<input type="password" placeholder="Повторите пароль" name="psw-repeat" required>
						</hr>
						<button type="submit" class="registerbtn">Регистрация</button>
				  	</div>
						<p>Уже есть аккаунт?<a href="../login.php"><br>
						Вход</a></p>
			</form>
		</div>
	</body>
</html>