<?php
	require "header.php";
?>
<!--основа-->
<main>
	<div class="container">
		<!--левый блок-->
		<div class="left-main">
			<h2>ВКонтакте для мобильных устройств</h2>
			<div class="center">Установите официальное мобильное приложение ВКонтакте и оставайтесь в курсе новостей Ваших друзей, где бы Вы ни находились.</div>
			
			<!--изображения смартфонов-->
			<div class="img-hell">
				<div class="img-s1"></div>
				<div class="img-s2"></div>
				<div class="img-s3"></div>
			</div>
		</div>
		
		<!--правый блок-->
		<div class="right-main">
			<!--форма входа-->
			<form class="white-form activ vk-1" action="login.php" method="post">
				<input name="name" type="text" placeholder="Логин">
				<input name="password" type="text" placeholder="Пароль">
				<input class="button" type="submit" value="Войти">
			</form>
			
			<!--форма регистрации-->
			<form class="white-form reg vk-1" action="registration.php" method="post">
				<h2>Впервые ВКонтакте?</h2>
				<div class="center">Моментальная регистрация</div>
				<input name="name" type="text" placeholder="Ваше имя">
				<input name="surname" type="text" placeholder="Ваша фамилия">
				<div>Дата рождения</div>
				
				<!--выбор датты-->
				<div>
					<select name="day">
						<option>День</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<select name="month">
						<option>Месяц</option>
						<option value="1">Январь</option>
						<option value="2">Февраль</option>
						<option value="3">Март</option>
						<option value="4">Апрель</option>
					</select>
					<select name="year">
						<option>Год</option>
						<option value="1995">1995</option>
						<option value="1996">1996</option>
						<option value="1997">1997</option>
						<option value="1998">1998</option>
					</select>
				</div>
				
				<input name="password" type="text" placeholder="Придумайте пароль">
				
				<!--выбор пола-->
				<div class="pol-radio">
					<input name="pol" type="radio" value="man">
					<span>Мужчина</span>
				</div>
				<div class="pol-radio">
					<input name="pol" type="radio" value="woman">
					<span>Женщина</span>
				</div>
				
				<input class="button " type="submit" value="Зарегестрироваться">
			</form>
		</div>
	</div>
</main>
<?php
	require "footer.php";
?>










