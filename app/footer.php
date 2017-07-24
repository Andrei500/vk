<script src="js/libs.js"></script>

<script>
	// закрытие формы загрузки фото
	$('#close-alert-new-ava').bind("click",function(){		//кнопка закрыть форму
		$("#form-phot")[0].reset();							//очистить форму (если она заполнена)
		$(".phpto-subm").css('display','none');				//скрыть кнопку отправки
		$('.alert-newava').css('display','none');			//спрятать окно формы
	});
	
	// открытие формы загрузки фото
	$('#new-ava').bind("click",function(){					//кнопка 'обновить фото'
		$('.alert-newava').css('display','block');			//открытие окна загрузки фото
	});
	
	// функционал формы загрузки фото
    $("input[type=file]").change(function(){				//скрипт выбора загрузки фото
        var filename = $(this).val().replace(/.*\\/, "");	//берем val скрытого input
        $("#filename").val(filename);						//отображение названия выбр фото(val скрытого input)
		$(".phpto-subm").css('display','block');			//появление кнопки загрузить
    });
	
	// открытие окна галереи
	$('.open-galer').bind("click",function(){					//кнопка 'обновить фото'
		$('.alert-galer').css('display','block');			//открытие окна загрузки фото
	});
	
	// закрытие окна галереи
	$('.close-galer').bind("click",function(){					//кнопка 'обновить фото'
		$('.alert-galer').css('display','none');			//открытие окна загрузки фото
	});
</script>
</body>
</html>