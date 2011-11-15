<div id="background_global" >
	<div id="left_bar">
			<div id="avatar">
				<img src="img/avatar/group.png" />
			</div>
	</div>
	<div id="content">
        <div class="table_constistof">
        <div class="title_constistof">Состав группы:</div>
		<table class="consistof">
		<?foreach ($users as $user)
		{
		echo '<tr><td><a href="id'.$user['id'].'">'.$user['role'].' '.$user['surname'].'</a></td></tr>';
		}
		?>
		</table>
        </div>
        
	</div>
</div>

