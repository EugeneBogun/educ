<link href="/css/message.css" rel="stylesheet" type="text/css" />
<div id="message">		
	<div id="message_top">	<!--BLOCK под Бар закрашенный-->
	Получатель: <a href="id<?echo $to?>"> <? echo $FIO ?></a>
	</div>
	
	<form action="send/<?=$to;?>" method="GET">

		<textarea type="text" id="message_text" name="text" cols="58" rows="11"></textarea>
	
		<input id="message_button" type="submit" class="button" value="Отправить">
	</form>
	
	
</div>	
</div>	
				
				
				
				
				
		
<!--/*Kami-sama*/-->