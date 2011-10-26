<div class="table_message">

		<table>
			<tr align="center">
				<td id="to">
				Кому:
				</td>
				<td id="text">
				Текст:
				</td>
				<td id="datetime">
				Время:
				</td>
			</tr>
			
				<?php  	
				 foreach($messages as $message)
						{
						echo '<tr><td>'.$message['Users_id_to'].'</td><td align="center">'.$message['text'].'</td><td><font size="1">'.$message['datetime'].'</font></td></tr>';
						}		
				?>
		
		
		</table>
</div>

				
				
				
		
<!--/*Kami-sama*/-->