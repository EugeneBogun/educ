<div id="background_global" >
<div id="left_bar">
      	<div id="avatar">
			<img src="img/avatar/departament.png" />
            <!--������ �.�. |  �������-->
		</div>
     </div>
	 <div id="content">
		������:
		<table>
		<?foreach ($groups as $group)
		{
		echo '<tr><td><a href="group'.$group['id'].'">'.$group['name'].'</a></td></tr>';
		}
		?>
		</table>
		</div>
</div>

