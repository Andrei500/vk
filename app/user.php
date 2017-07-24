<?php
	require "header.php";
	// $_COOKIE["userid"] это id активного пользователя
	
	
	// подключение к серверу
	$mysqli = new mysqli("localhost","root","","vk");
	$mysqli -> query ("SET NAMES 'utf8'");
	
	
	// определяем данные пользователя из таблицы users
	$users = $mysqli-> query("SELECT 
	`avatar_id`,`name`,`surname`,`day`,`month`,`year`,`city`,`job`,`status`,
	`marital_status`
	FROM `users` WHERE `id`= '$_COOKIE[userid]'");
	$str = $users->fetch_assoc();
	
	
	// определяем фотографии пользователя из images
	$myimages = $mysqli-> query("SELECT `id` FROM `images` WHERE `autor_id`='$_COOKIE[userid]'");
	// записываем блоки фотографий в массив
	$col_img=0;
	while(($photo = $myimages->fetch_assoc()) != false){
		$pht[$col_img]=$photo['id'];	// массив для вывода в галерею
		$col_img++;		//считаем кол-во фото
		$block_photo[$col_img] = "<div style='background-image: url(base/".
		$photo['id'].".jpg);' class='galeri_photo'></div>";
	}
	$mysqli -> close();
	
	
	// пребобазуем числовые месяцы в именные для $month[$str['month']-1]
	$month = array('января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря');
	$month2= array('январь','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь');
	
	
	// скрипт галереи
	$col_tb = 3;	// кол-во фото в ряде
	if($pht) $pht = array_reverse($pht); // реверсировать вывод(сначала новые)
	require "galeri_skript.php";
?>
<main>
	<div class="container">
		<!--вставка меню-->
		<?php require "menu.php"; ?>
		
		<!--левая паленель-->
		<div class="left-panel">
			<div class=" vk-1 avatar-wrap">
				<div class="avatar" style="background-image: url(base/<?php echo $str['avatar_id']; ?>.jpg);">
					<div class="red-panel">
						<div id="new-ava"><i class="fa fa-arrow-up" aria-hidden="true"></i>Обновить фотографию</div>
					</div>
				</div>
				<a href="">Редактировать</a>
			</div>
		</div>
		
		<!--правая паленель-->
		<div class=" right-panel">
		
			<!-- верхняя панель -->
			<div class=" vk-1 tp">
				<!--имя фамилия статус онлайн-->
				<div class=" over">
					<span class="left top-name"><?php echo $str['name']." ".$str['surname'];?></span>
					<span class="right top-onli">Online</span>
				</div>
				<div id="status"><?php if($str['status']){echo $str['status'];}else echo 'изменить статус';?></div>
				
				<!--разделитель-->
				<div class="br"></div>
				
				<!--анкета-->
				<?php require "ancet.php";?>
			</div>
			
			<!-- цифро блок -->
			<div class=" vk-1 bt num-panel">
				<a href="#" class="tb">
					<div>187</div>
					<div>друга</div>
				</a>
				<a href="#" class="tb">
					<div>544</div>
					<div>подписчиков</div>
				</a>
				<a href="#" class="tb open-galer">
					<div><?php echo $col_img;?></div>
					<div>фотографий</div>
				</a>
				<a href="#" class="tb">
					<div>239</div>
					<div>видиозаписей</div>
				</a>
				<a href="#" class="tb">
					<div>133</div>
					<div>аудиозаписей</div>
				</a>
			</div>
			
			<!-- блок фотогалереи -->
			<div class=" vk-1 set-photo">
				<div class=" open-photos open-galer">Мои фотографии <span><?php echo $col_img;?></span></div>
				<div class="over flex">
					<?php
						// цикл вывода блоков изображений пользователя
						if($block_photo) $block_photo = array_reverse($block_photo); // инвертировать (сначало вывод новых)
						for($i=0; $i<=$col_img&&$i<=3; $i++) echo $block_photo[$i];
					?>
				</div>
			</div>
		</div>
	</div>
	
	<!--алерт новая ава-->
	<div class="alert-newava">
		<div class="panel-newava">
			<div class=" vk-alert-top">
				Загрузка новой фотографии
				<i id="close-alert-new-ava" class="fa fa-times" aria-hidden="true"></i>
			</div>
			<div class="center">
				Друзьям будет проще узнать Вас, если Вы загрузите свою настоящую фотографию.
				Вы можете загрузить изображение в формате JPG, GIF или PNG.
			</div>
			<form id="form-phot" enctype="multipart/form-data" action="photo_submit.php" method="post">
				<input id="lab" type="file" name="ufile[]">
				<label for="lab">Выберите файл</label>
				<input name="submit" type="submit" class="phpto-subm" value="Загрузить">
				<input type="text" id="filename" class="filename" disabled>
			</form>
			<div class=" vk-alert-bott">Если у Вас возникают проблемы с загрузкой, попробуйте выбрать фотографию меньшего размера.</div>
		</div>
	</div>
	
	<!-- окно галереи -->
	<div class=" alert-galer">
		<div class="galereya">
			<div class=" vk-alert-top tp">Мои альбомы<i class="fa fa-times close-galer" aria-hidden="true"></i></div>
			<div class=" vk-1 bt over gg">
				<?php
					// вывод фото в галерею
					for($c=0;$c<$col_row;$c++){
						for($a=$o[$c]; $a<$o[$c]+$ryad[$c]; $a++)
						if($wid_end[$c][$a]>3) echo "<div class='re' style='float:left; height:".$height_bg_end[$c] ."px; width:".$wid_end[$c][$a] ."%; background-image: url(base/".$pht[$a].".jpg);'></div>";
					}
				?>
			</div>
		</div>
	</div>
</main>
<?php
	require "footer.php";
?>














