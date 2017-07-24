<div class=" str-anket over">
	<div><?php if($str['day']||$str['month']||$str['year']) echo "День рождения:";?></div>
	<div><a href="#"><?php if($str['day']) echo $str['day']." ".$month[$str['month']-1]; else echo $month2[$str['month']-1];?></a> <a href="#"><?php if($str['year']) echo $str['year'].' г.';?></a></div>
</div>
<div class=" str-anket over">
	<div><?php if($str['city']) echo "Город:";?></div>
	<div><a href="#"><?php echo $str['city'];?></a></div>
</div>
<div class=" str-anket over">
	<div><?php if($str['marital_status']) echo "Семейное положение:";?></div>
	<div><a href="#"><?php echo $str['marital_status'];?></a></div>
</div>
<div class=" str-anket over">
	<div><?php if($str['job']) echo "Место работы:";?></div>
	<div><a href="#"><?php echo $str['job'];?></a></div>
</div>