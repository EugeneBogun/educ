<div class="table_message">
<input type="hidden" id="tab" value="adopted"/>
		<table>
			<tr align="center">
				<td id="to" >
				���:
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
						echo '<tr><td align="center">'.$message['fio'].'</td><td align="center">'.$message['text'].'</td><td><font size="1">'.$message['datetime'].'</font></td></tr>';
						}		
				?>
		
		
		</table>
	</div>
</div>

				
				
				
		
<!--/*Kami-sama*/-->