<div id="user-group">
<div id="title_user_group">Состав групп</div>
	<div id="group">
        Группы:
		<select id="group_list"size="13" name="group" >
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
    $('#group_list').click(function(){
		$.ajax({
        	url:	 'ajaxusergroup',
        	type:	 'POST', //что-нибудь получим
            processData: false,
            data: 'group='+$("#group_list option:selected").val(),
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
		<select size="13" name="group" >
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
        <div id="title_group_list" class="listbox">Группы:</div>
		<select size="13" name="group" >
            <? foreach ($group_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>
  <div id="roles">
        <div id="title_roles_list" class="listbox">Роли:</div>
		<select  size="13" name="group" >
            <? foreach ($roles_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
  </div>

</div>
