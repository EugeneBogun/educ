<link href="css/add_timetable.css" rel="stylesheet" type="text/css" />
<div id="timetable_module">
<div id="timetable_module_title">���������� �����������</div>
<!--���?-->
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
	<div id="classrooms">
	</div>
</div>
<div id="who">
<div id="groups">
        <div id="title_group_list">������:</div>
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
        <div id="title_group_list">������:</div>
		<select size="13" name="group" id="add_groups_list">
            <? foreach ($group_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>
  <div id="roles">
        <div id="title_roles_list" >����:</div>
		<select  size="13" name="group" id="add_roles_list">
            <? foreach ($roles_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>
  <div  id="add_user_group_button">
  <input type="button" class="button" value="��������" /></div>
  <div id="add_user_group_status"></div>-->
</div>
