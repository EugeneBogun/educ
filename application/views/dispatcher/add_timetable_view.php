<link href="css/add_timetable.css" rel="stylesheet" type="text/css" />
<div id="timetable_module">
<div id="timetable_module_title">Управление расписанием</div>
<!--Кто?-->
<div id="when">

	<div id="weeks">
        Тип недели:
		<select size="1" name="group" >
			<option value="1">Числитель</option>
			<option value="2">Знаменатель</option>
        </select>
	</div>
	<div id="days">
        День:
		<select size="1" name="group" >
			<option value="1">Понедельник</option>
			<option value="2">Вторник</option>
			<option value="3">Среда</option>
			<option value="4">Четверг</option>
			<option value="5">Пятница</option>
			<option value="6">Суббота</option>
        </select>
	</div>
	<div id="subject_num">
        Пара:
		<select size="1" name="group" >
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
        </select>
	</div>
</div>
<!--Где?-->
<div id="where">
	<div id="classrooms">
	</div>
</div>
<div id="who">
<div id="groups">
        <div id="title_group_list">Группы:</div>
		<select size="13" name="group" id="add_groups_list">
            <? foreach ($group_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
</div> 
 <!--
    <div id="groups">
        <div id="title_group_list">Группы:</div>
		<select size="13" name="group" id="add_groups_list">
            <? foreach ($group_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>
  <div id="roles">
        <div id="title_roles_list" >Роли:</div>
		<select  size="13" name="group" id="add_roles_list">
            <? foreach ($roles_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>
  <div  id="add_user_group_button">
  <input type="button" class="button" value="Добавить" /></div>
  <div id="add_user_group_status"></div>-->
</div>
