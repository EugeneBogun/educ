<link href="css/add_timetable.css" rel="stylesheet" type="text/css" />
<div id="timetable_module">
<div id="timetable_module_title">Управление расписанием добавить универ, отделение, учебный план а потом через ajax подгружать инфу по группам и предметам</div>
<!--Когда?-->
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
	Аудитория:
	<div id="classrooms">
		<select size="12" name="group" id="add_groups_list">
		<? foreach ($classrooms_list as $classroom)
                {
                    echo '
					<option value="'.$classroom['id'].'">'.$classroom['name'].'</option>';
                }
            ?>
		</select>
	</div>
</div>

<!--Кто?-->
<div id="who">
	<div id="groups">
			Группы:
			<select size="12" name="group" id="add_groups_list">
				<? foreach ($group_list as $group)
					{
						echo '
						<option value="'.$group['id'].'">'.$group['name'].'</option>';
					}
				?>
			</select>
	</div> 
    	<div id="subject">
			Предмет:
			<select size="12" name="subject" id="add_subject_list">
				<? foreach ($subjects_list as $subject)
					{
						echo '
						<option value="'.$subject['id'].'">'.$subject['name'].'</option>';
					}
				?>
			</select>
	</div> 
</div>

  <!--<div  id="add_timetable_button">
  <input type="button" class="button" value="Добавить" /></div>
  <div id="add_timetable_status"></div>-->