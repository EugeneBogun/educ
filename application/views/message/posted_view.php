<div class="table_message">

		<table>
			<tr align="center">
				<td id="to">
				����:
				</td>
				<td id="text">
				�����:
				</td>
				<td id="datetime">
				�����:
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