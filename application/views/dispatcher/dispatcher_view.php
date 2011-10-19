<div id="user-group">
<div id="title_user_group">Состав групп</div>
	<div id="group">
        Группы:
		<select id="group_list_view"size="13" name="group" >
            <? foreach ($group_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
	</div>
	<div id="users">
    <div id="title_users_list">Состав группы:</div>
    <div id="users_list"></div>
    </div>
</div>

<script language="JavaScript">
    
$(document).ready(function(){    
    $('#group_list_view').click(function(){
		$.ajax({
        	url:	 'ajaxusergroup',
        	type:	 'POST', //что-нибудь получим
            processData: false,
            data: 'group='+$("#group_list_view option:selected").val(),
        	success: function(data){
        		  $('#users_list').html(data);
                }
            });
        });
        });
	
</script>

<div id="add_user_group">
<div id="title_add_user_group">Управление группами</div>
	<div id="users">
        Пользователи:
		<select size="13" name="users" id="users_list_insert">
            <? 
            foreach ($users_list as $user)
                {
                    echo '
                    <option value="'.$user['id'].'">'.$user['fio'].'</option>
                    ';
                }
            ?>
        </select>
	</div>
    
    <div id="groups">
        <div id="title_group_list">Группы:</div>
		<select size="13" name="groups" id="groups_list_insert" >
            <? foreach ($group_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>
  <div id="roles">
        <div id="title_roles_list">Роли:</div>
		<select  size="13" name="roles" id="roles_list_insert">
            <? foreach ($roles_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>
  <div id="user_group_insert">
  <input type="button" value="Добавить"/></div>
  <div id="status_user_group">
  Отчет</div>
  <script language="JavaScript">
  $(document).ready(function(){    
    $('#user_group_insert input').click(function(){
		$.ajax({
        	url:	 'ajaxinsertusergroup',
        	type:	 'POST', //что-нибудь получим
            processData: false,
            data: 'user='+$("#users_list_insert option:selected").val()
            +'&group='+$("#groups_list_insert option:selected").val()
            +'&role='+$("#roles_list_insert option:selected").val(),
        	success: function(data){
        	 //  alert(data);
        	   $('#status_user_group').html(data);
                }
            });
        });
        });
        </script>

</div>
