<link href="css/add_timetable.css" rel="stylesheet" type="text/css" />
<div id="timetable_module">
<div id="timetable_module_title">���������� ����������� �������� ������, ���������, ������� ���� � ����� ����� ajax ���������� ���� �� ������� � ���������</div>
<!--�����?-->
<div id="when">

	<div id="weeks">
        ��� ������:
		<select size="1" name="group" >
			<option value="1">���������</option>
			<option value="2">�����������</option>
        </select>
	</div>
	<div id="days">
        ����:
		<select size="1" name="group" >
			<option value="1">�����������</option>
			<option value="2">�������</option>
			<option value="3">�����</option>
			<option value="4">�������</option>
			<option value="5">�������</option>
			<option value="6">�������</option>
        </select>
	</div>
	<div id="subject_num">
        ����:
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
<!--���?-->
<div id="where">
	���������:
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

<!--���?-->
<div id="who">
	<div id="groups">
			������:
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
			�������:
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
  <input type="button" class="button" value="��������" /></div>
  <div id="add_timetable_status"></div>-->