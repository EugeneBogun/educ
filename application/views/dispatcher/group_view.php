<link href="css/user_group.css" rel="stylesheet" type="text/css" />
<div id="user-group">
<div id="title_user_group">������ �����</div>
	<div id="group">
        ������:
		<select id="group_list"size="13" name="group" >
            <? foreach ($group_list as $group)
                {
                    echo '<option value="'.$group['id'].'">'.$group['name'].'</option>';
                }
            ?>
		</select>
	</div>
	<div id="users">
    <div id="title_users_list">������ ������:</div>
    <div id="users_list"></div>
    </div>
</div>

<script language="JavaScript">
    
$(document).ready(function(){    
    $('#group_list').click(function(){
		$.ajax({
        	url:	 'ajaxusergroup',
        	type:	 'POST', //���-������ �������
            processData: false,
            data: 'group='+$("#group_list option:selected").val(),
        	success: function(data){
        		  $('#users_list').html(data);
                }
            });
        });
        });
	
</script>