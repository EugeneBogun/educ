<link href="css/add_user_group.css" rel="stylesheet" type="text/css" />
<div id="add_user_group">
<div id="title_add_user_group">���������� ��������</div>
	<div id="users">
        ������������:
		<select size="13" name="group" id="add_users_list" >
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
  <div id="add_user_group_status"></div>
</div>
<script language="Javascript">
$(document).ready(function(){    
    $('#add_user_group_button').click(function(){
		$.ajax({
        	url:	 'ajaxinsertusergroupresult',
        	type:	 'POST', //���-������ �������
            processData: false,
            data: 'group='+$("#add_groups_list option:selected").val()+
			'&user='+$("#add_users_list option:selected").val()+
			'&role='+$("#add_roles_list option:selected").val(),
        	success: function(data){
        		  $('#add_user_group_status').html(data);
                  $.ajax({
                    	url:	 'ajaxusernogroup',
                    	type:	 'POST', //���-������ �������
                        processData: false,
                    	success: function(data){
                    		  $('#add_users_list').html(data);
                            }
                        });
                }
            });
        });
        });
</script>
