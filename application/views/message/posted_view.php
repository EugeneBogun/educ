<div class="table_message">
<input type="hidden" id="tab" value="posted"/>

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
				//var_dump($messages);
				 foreach($messages as $message)
						{
						echo '<tr><td id="to">'.$message['fio'].'</td><td id="text">'.$message['text'].'</td><td  id="datetime">'.$message['datetime'].'</font></td></tr>';
						}		
				?>
		
		
		</table>
</div>

				
				
				
		
<!--/*Kami-sama*/-->