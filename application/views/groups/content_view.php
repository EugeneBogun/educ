<div id="background_global" >
	<div id="left_bar">
			<div id="avatar">
				<img src="img/avatar/group.png" />
			</div>
	</div>
	<div id="content">
	Состав:
		<table>
		<?foreach ($users as $user)
		{
		echo '<tr><td>'.$user['role'].' '.$user['surname'].'</td></tr>';
		}
		?>
		</table>
	</div>
</div>

