<?php
	require 'src/db.php';
    if(isset($_POST['email']) && isset($_POST['psw']))
    {
        $email = trim($_POST['email']);
        $pass = md5(trim($_POST['psw']));
        $query = mysqli_query($link,"SELECT * FROM `users` WHERE `email`='$email' AND `pass`='$pass'");
        $user = mysqli_fetch_assoc($query);
        if(count($user) == 0)
        {
            echo '<script> alert("Пользователь не найден.");
			reload();</script>';
        }
        setcookie('userid',$user['id'],time()+3600,"/");
        setcookie('useremail',$user['email'],time()+3600,"/");
        setcookie('username',$user['name'],time()+3600,"/");
        setcookie('usersurname',$user['surname'],time()+3600,"/");
        header('Location: /');
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
			<form action="login.php" method="Post">
					<div>
						<hr>
						<label for="email"><b>Email</b></label>
						<input type="text" placeholder="Введите почту" name="email" required>
						<label for="psw"><b>Пароль</b></label>
						<input type="password" placeholder="Введите пароль" name="psw" required>
						</hr>
						<button type="submit" class="registerbtn">Войти</button>
					  </div>
					  <p>Ещё нет аккаунта?<a href="../register.php"><br>
						Зарегистрироваться</a></p>
			</form>
		</div>
	</body>
</html>