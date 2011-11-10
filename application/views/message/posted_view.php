<div class="table_message">
<input type="hidden" id="tab" value="posted"/>

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
						echo '<tr><td id="to">'.$message['Users_id_to'].'</td><td id="text">'.$message['text'].'</td><td  id="datetime">'.$message['datetime'].'</font></td></tr>';
						}		
				?>
		
		
		</table>
</div>

				
				
				
		
<!--/*Kami-sama*/-->