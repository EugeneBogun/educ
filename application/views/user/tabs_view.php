<?if (isset($group['id']))
{
echo '<div id="menu_tab" >
			<a href="/univer'.$univer['id'].'"><div id="menu_tab_vuz">'.$univer['name'].'</div></a>
			<a href="/departament'.$departament['id'].'"><div id="menu_tab_dep">'.$departament['name'].'</div></a>
			<a href="/group'.$group['id'].'"><div id="menu_tab_group">'.$group['name'].'</div></a>
			<a ><div id="id'.$user['id'].'" class="menu_tab_select" >'.$user['name'].'</div></a>
		</div>';
}?>
<?if (isset($subdepartament['id']))
{
echo '<div id="menu_tab" >
			<a href="/univer'.$univer['id'].'"><div id="menu_tab_vuz">'.$univer['name'].'</div></a>
			<a href="/departament'.$departament['id'].'"><div id="menu_tab_dep">'.$departament['name'].'</div></a>
			<a href="/subdepartament'.$subdepartament['id'].'"><div id="menu_tab_group">'.$subdepartament['name'].'</div></a>
			<a ><div id="id'.$user['id'].'" class="menu_tab_select" >'.$user['name'].'</div></a>
		</div>';
}?>