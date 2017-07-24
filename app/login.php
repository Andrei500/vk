<?php
	// данные полученные с формы
	$name = $_POST["name"];
	$password = $_POST["password"];
	
	/* подключение к серверу */
	$mysqli = new mysqli("localhost","root","","vk");
	$mysqli-> query("SET NAMES 'utf8'");

	// поиск id по соотвецтвиям
	// для входа первый id должен соотвецтвовать второму id
	$users = $mysqli-> query("SELECT `id` FROM `users` WHERE `name` = '$name' ");		// поиск id этого имени
	$id = $users->fetch_assoc();
	$id1 = $id['id'];				// первый ийди
	$users = $mysqli-> query("SELECT `id` FROM `users` WHERE `password`='$password' "); // поиск id этого пароля
	$id = $users->fetch_assoc();
	$id2 = $id['id'];				// второй ийди
	
	// обработчики ошибок
	$err1 = $id1 != $id2;		/* проверка на несоотвецтвие id */
	$err2 = !$id1 || !$id2;		/* проверка пустых значений */
	
	if($err1 || $err2)
		header("Location: index.php");
	else{
		SetCookie("userid", $id['id']);		// создает куки отображающие id активного пользователя
		header("Location: user.php");		// перенаправит на стр user
	}
	
	$mysqli -> close();
?>