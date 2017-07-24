<?php
	$row=0;
	$col_row=$col_img/$col_tb;
	while($row<$col_row){
		$o[$row]=0;
		$ryad[$row] = $col_tb; // приближенное кол-во фото в ряде
		if($row>0) {$o[$row]=$row*$ryad[$row];}
		$co=$o[$row]+$ryad[$row];
		$i=$o[$row];
		$sum_height=0;
		$swdth=0;
		$swdth2=0;
		$wrap = 800;
		$margin = 0.3;
		while($i<$co){
			if($pht[$i]) $size[$i] = getimagesize ("base/".$pht[$i] .".jpg");
			else $size[$i]=$size[$i-1];
			$sum_height+=$size[$i][1];	// получаем общую высоту
			$swdth+=$size[$i][0];	//общая ширина
			$height_bg = $sum_height/$ryad[$row];		//получаем среднюю высоту
			$pr_width[$i] = $size[$i][0]/$size[$i][1];	// пропорции ширины	
			if($i==$co-1){ 
				$prop = $swdth/$wrap;	//во сколько раз уменьшить пропорции чтобы вместить
				$height_end_bg = $height_bg/$prop;	//уменьшаем высоту
				for($g=$o[$row];$g<$co;$g++)
					$wid[$g] = $height_end_bg * $pr_width[$g];	// делаем ширину по пропорциям
				for($r=$o[$row];$r<$co;$r++)
					$swdth2+=$wid[$r];			// общая ширина после вмещения
				// коректирующий цикл
				$height_bg_end[$row] = $height_end_bg * ($wrap / $swdth2);//увеличить пропрорции высоты
				for($w=$o[$row];$w<$co;$w++){
					$wid[$w]=$wid[$w]*($wrap / $swdth2);			//увеличить пропрорции ширины
					$wid[$w]=(100/$wrap)*$wid[$w];					// переводим в проценты
					$wid_end[$row][$w]=$wid[$w]-$margin*2;					// добавляем отступы
				}
			}$i++;						// считаем кол-во вмещ изображений		
		}$row++;
	}
?>