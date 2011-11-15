<div id="background_global" >
<div id="left_bar">
      	<div id="avatar">
			<img src="img/avatar/univer.png" />
            <!--Иванов И.И. |  Курсант-->
		</div>
     </div>
	 <div id="content">
        <div class="table_constistof">
        <div class="title_constistof">Отделения</div>
		<table class="consistof">
		<?foreach ($departaments as $dep)
		{
		echo '<tr><td><a href="departament'.$dep['id'].'">'.$dep['name'].'</a></td></tr>';
		}
		?>
		</table>
        </div>
        <!--
        <div class="table_constistof">
        <div class="title_constistof">Руководство</div>
		<table class="consistof">
		<?foreach ($departaments as $dep)
		{
		echo '<tr><td><a href="departament'.$dep['id'].'">'.$dep['name'].'</a></td></tr>';
		}
		?>
		</table>
        </div>
        -->
</div>

