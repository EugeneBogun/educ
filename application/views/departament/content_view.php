<div id="background_global" >
<div id="left_bar">
      	<div id="avatar">
			<img src="img/avatar/departament.png" />
            <!--������ �.�. |  �������-->
		</div>
     </div>
	 <div id="content">
        <div class="table_constistof">
        <div class="title_constistof">������:</div>
		<table class="consistof">
		<?foreach ($groups as $group)
		{
		echo '<tr><td><a href="group'.$group['id'].'">'.$group['name'].'</a></td></tr>';
		}
		?>
		</table>
        </div>
		<div class="table_constistof">
        <div class="title_constistof">�������� ��������:</div>
		<table class="consistof">
		<?foreach ($subdepartaments as $subdepartament)
		{
		echo '<tr><td><a href="subdepartament'.$subdepartament['id'].'">'.$subdepartament['fullname'].'</a></td></tr>';
		}
		?>
		</table>
        </div>
		
		
		</div>
</div>

