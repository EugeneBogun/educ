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
				 foreach($messages as $message)
						{
						echo '<tr><td id="to"><a href="/id'.$message['Users_id_to'].'">'.$message['fio'].'</a></td><td id="text" align="center"><a href="message?to='.$message['Users_id_to'].'">'.$message['text'].'</a></td><td  id="datetime">'.$message['datetime'].'</font></td></tr>';
						}		
				?>
		
		
		</table>
</div>

				
				
				
		
<!--/*Kami-sama*/-->