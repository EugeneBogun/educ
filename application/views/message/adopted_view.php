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
						echo '<tr><td align="center"><a href="/id'.$message['Users_id_to'].'">'.$message['fio'].'</td><td align="center"><a href="answer/?to='.$message['Users_id_from'].'&text='.$message['text'].'">'.$message['text'].'</a></td><td><font size="1">'.$message['datetime'].'</font></td></tr>';
						}		
				?>
		
		
		</table 
	</div>
</div>

				
				
				
		
<!--/*Kami-sama*/-->