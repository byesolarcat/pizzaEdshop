<?php require dirname(__DIR__).'\src\db.php';
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="..\style1.css">
	</head>
	<body>
	    <div id = "wrap">
            <?php require dirname(__DIR__).'\src\header.php'; ?>
            <h2>Разработчики:</h2>
            <a class = "item-font" href="https://github.com/byesolarcat">
                <div class = "card">
                    <img src="sashap.png" alt="Сашок" style="width:100%">
                    <br>
                    <h1>Пузиков Александр</h1><br>
                </div>
            </a>
            <a class = "item-font" href="https://vk.com/i370630636306362">
                <div class = "card">
                    <img src="dimae.png" alt="Сашок" style="width:100%">
                    <br>
                    <h1>Ефимов Дмитрий</h1><br>
                </div>
            </a>
    </body>
<html>