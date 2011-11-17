<link href="/css/message.css" rel="stylesheet" type="text/css" />
<div id="message">
		<div id="answer_message">	
			<div id="answer_bar">
			</div>
			<div id="answer">
					<div id="message_top">От Кого: <a href="id<?echo $to?>"> <? echo $FIO ?></a></div>
					<div id="incoming_message">
					<?echo $text?>
					</div>
					<form action="/send/<?=$to;?>" method="GET">
					<textarea type="text" id="message_text" name="text" cols="58" rows="11"></textarea>
					<input id="message_button" type="submit" class="button" value="Отправить">
			</form>
			
			</div>
		<div>	
</div>	
				
				
				
				
				
		
<!--/*Kami-sama*/-->