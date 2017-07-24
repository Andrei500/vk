<?php
	// полученные с формы данные
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$password = $_POST['password'];
	$gender = $_POST['pol'];

	// обработчики ошибок
	$err1 = !$name && !$surname;			/* введите имя или фамилию */
	$err2 = strlen($password)<5;			/* слишком короткий пароль */
	$err3 = !$gender;						/* выберите пол */
	
	if($err1 || $err2 || $err3)				/* если возникли ошибки */
		header("Location: index.php");
	else{
		/* подключение к серверу */
		$mysqli = new mysqli("localhost","root","","vk");
		$mysqli-> query("SET NAMES 'utf8'");
		
		/* регистрация, отправка данных на сервер */
		$mysqli -> query ("INSERT INTO `users` (`name`,`surname`,`gender`,`day`,`month`,`year`,`password`) 
		VALUES ('$name','$surname','$gender','$day','$month','$year','$password')");
		
		/* создание кукки для акаунта пользователя */
		$users = $mysqli-> query("SELECT `id` FROM `users` WHERE `name`='$name' AND `password`='$password'");
		$id = $users->fetch_assoc();
		SetCookie("userid", $id['id']);
		
		$mysqli -> close();
		
		/* перенаправление на стр акаунта */
		header("Location: user.php");
	}

?>