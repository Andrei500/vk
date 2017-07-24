<?php
	// условие нажатие кнопки отправить
	if($_POST['submit']){
		
		// данные полученные с формы
		$fileName = $_FILES['ufile']['name'][0];		//имя файла
		$tmpName  = $_FILES['ufile']['tmp_name'][0];	//какаято директория
		$fileSize = $_FILES['ufile']['size'][0];		//число символов
		$fileType = $_FILES['ufile']['type'][0];		//тип файла	
		
		// подключение к серверу
		$mysqli = new mysqli("localhost","root","","vk");
		$mysqli -> query ("SET NAMES 'utf8'");
		
		//определяем следующий id для img
		$max_id = 1;
		$users = $mysqli-> query("SELECT `id` FROM `images`");
		while(($str = $users->fetch_assoc()) != false){
			if($max_id <= $str['id'])
				$max_id = $str['id']+1;
		}

		//вставляем в БД изображений id и автора
		$mysqli -> query ("INSERT INTO `images` (`id`,`autor_id`) VALUES ('$max_id','$_COOKIE[userid]')");
		
		//вставляем в БД id аватара пользователя
		$mysqli -> query ("UPDATE `users` SET `avatar_id` = '$max_id' WHERE `id`= $_COOKIE[userid]");
		
		$mysqli -> close();
		
		// считываем содержимое файла 
		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));		// вставляем содержимое в переменную
		fclose($fp);
		
		//вставляем в базу(папку) изображений
		file_put_contents("base/".$max_id.".jpg",$content);
		
		header("Location: user.php");
	}
?>