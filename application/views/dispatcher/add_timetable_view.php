<link href="css/add_timetable.css" rel="stylesheet" type="text/css" />
<div id="timetable_module">
<div id="timetable_module_title">���������� ����������� </div>
<!--�����?-->
<div id="when">
    <div id="vuz_timetable">
        ���:
		<select size="1" name="vuz" id="vuz_timetable">
        <option value="0">��������</option>';
        <? foreach ($univer_list as $univer)
                {
                    echo '
					<option value="'.$univer['id'].'">'.$univer['name'].'</option>';
                }
            ?>
        </select>
	</div>
    <div id="teach_plan">
    ��. ����<br/><select size="1" name="teach_plan" ><option value="0">�������� ���</option></select></div>
    </div>
        <script>
        
         $('#vuz_timetable').change( function() {
             $('#teach_plan').html('��. ����<br/><select size="1" name="teach_plan" ><option value="0">��������</option></select>');
             $('#groups').html('������:<br/><select size="1" name="group" id="groups_list"><option value="0">�������� ��. ����</option></select>');
             $('#subject').html('�������:<br /><select size="1" name="subject" id="subject_list"><option value="0">�������� ������</option></select>');
             $('#classrooms_timetable').html('���������:<select size="1" name="auditor" id="add_auditor_list"><option value="0">�������� �����</option></select>');
            
            var teach_plan_start = '��. ����<br/><select size="1" name="teach_plan" ><option value="0">��������</option>';
            var teach_plan_end = '</select>';
            $.ajax({
                        	url:	 'ajaxuniverteachplan',
                        	type:	 'POST', //���-������ �������
                            processData: false,
                            data: 'univer='+$("#vuz_timetable option:selected").val(),
                        	success: function(data){
                        		  $('#teach_plan').html(teach_plan_start+data+teach_plan_end);
                                }
                            });           
            });
        
        
       
        </script>
        
    	<div id="groups">
			������:
			<select size="1" name="group" id="groups_list">
                <option value="0">�������� ��. ����</option>
			</select>
	    </div>  
        <script>
            //����� �������� ����� = ��������� �����
        $('#teach_plan').change( function() {
        var start = '������:<br/><select size="1" name="group" id="groups_list"><option value="0">��������</option>';
        var end = '</select>';
        $.ajax({
                    	url:	 'ajaxcurriculagrouplist',
                    	type:	 'POST', //���-������ �������
                        processData: false,
                        data: 'curricula='+$("#teach_plan option:selected").val(),
                    	success: function(data){
                    		  $('#groups').html(start+data+end);
                            }
                        });
         });   
         </script>
         
         <div id="subject">
			�������:<br />
			<select size="1" name="subject" id="subject_list">
            	<option value="0">�������� ������</option>
			</select>
	     </div>
        <script>  
       //����� ������ = ��������� ��������� 
       $('#groups').change( function() {
                    
        var start = '�������:<br /><select size="1" name="subject" id="subject_list"><option value="0">��������</option>';
        var end = '</select>';
        $.ajax({
                    	url:	 'ajaxsubjectlist',
                    	type:	 'POST', //���-������ �������
                        processData: false,
                        data:'group='+$("#groups option:selected").val()+ 
                        '&curricula='+$("#teach_plan option:selected").val(), 
                    	success: function(data){
                    		  $('#subject').html(start+data+end);
                            }
                        });     
        });
        </script> 
        <!--���?-->
<div id="who">
    <div id="when_time">
        <div id="weeks_timetable">
            ��� ������:
    		<select size="1" name="week" >
                <option value="0">��������</option>
    			<option value="1">���������</option>
    			<option value="2">�����������</option>
            </select>
    	</div>
     <div id="days_timetable">
            ����:
    		<select size="1" name="day" >
                <option value="0">��������</option>
    			<option value="1">�����������</option>
    			<option value="2">�������</option>
    			<option value="3">�����</option>
    			<option value="4">�������</option>
    			<option value="5">�������</option>
    			<option value="6">�������</option>
            </select>
    	</div>
        <div id="subject_num_timetable">
            ����:<br />
    		<select size="1" name="num" >
                <option value="0">��������</option>
    			<option value="1">1</option>
    			<option value="2">2</option>
    			<option value="3">3</option>
    			<option value="4">4</option>
    			<option value="5">5</option>
    			<option value="6">6</option>
            </select>
    	</div>
    </div>
    
    	<div id="classrooms_timetable">
    ���������:
		<select size="1" name="classroom" id="add_auditor_list">
        <option value="0">�������� �����</option>
		</select>
	</div>
</div>
<!--���?-->
<script>
 $('#when_time').change( function() {
        if ($("#weeks_timetable option:selected").val() == 0) return;
        if ($("#days_timetable option:selected").val() == 0) return;
        if ($("#subject_num_timetable option:selected").val() == 0) return;
        if ($("#vuz_timetable option:selected").val() == 0) return;
                
        var start = '���������:<select size="1" name="auditor" id="add_auditor_list"><option value="0">��������</option>';
        var end = '</select>';
        
        $.ajax({
                    	url:	 'ajaxfreeclassroomslist',
                    	type:	 'POST', //���-������ �������
                        processData: false,
                        data:
                            'week='+$("#weeks_timetable option:selected").val()+ 
                            '&day='+$("#days_timetable option:selected").val()+
                            '&num='+$("#subject_num_timetable option:selected").val()+
                            '&univer='+$("#vuz_timetable option:selected").val(), 
                    	success: function(data){
                    		  $('#classrooms_timetable').html(start+data+end);
                            }
                        });     
        });
</script>

  <div  id="add_timetable_button">
  <input type="button" class="button" value="��������" /></div>
  <div id="add_timetable_status"></div>
  <script></script>
</div>

