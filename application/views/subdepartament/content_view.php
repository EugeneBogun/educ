<div id="background_global" >
<div id="left_bar">
      	<div id="avatar">
			<img src="img/avatar/departament.png" />
            <!--������ �.�. |  �������-->
		</div>
     </div>
	 <div id="content">
        <div class="table_constistof">
        <div class="title_constistof">�������������:</div>
		<table class="consistof">
		<?
		
		foreach ($users as $user)
		{

		echo '<tr><td><a href="/id'.$user['id'].'">'.$user['fio'].'</a></td></tr>';
		}
		?>
		</table>
        </div>
		
		
		</div>
</div>

