<link href="css/add_timetable.css" rel="stylesheet" type="text/css" />
<div id="timetable_module">
<div id="timetable_module_title">Управление расписанием </div>
<!--Когда?-->
<div id="when">
    <div id="vuz_timetable">
        ВУЗ:
		<select size="1" name="vuz" id="vuz_timetable">
        <option value="0">Выберите</option>';
        <? foreach ($univer_list as $univer)
                {
                    echo '
					<option value="'.$univer['id'].'">'.$univer['name'].'</option>';
                }
            ?>
        </select>
	</div>
    <div id="teach_plan">
    Уч. План<br/><select size="1" name="teach_plan" ><option value="0">Выберите ВУЗ</option></select></div>
    </div>
        <script>
        
         $('#vuz_timetable').change( function() {
             $('#teach_plan').html('Уч. План<br/><select size="1" name="teach_plan" ><option value="0">Выберите</option></select>');
             $('#groups').html('Группы:<br/><select size="1" name="group" id="groups_list"><option value="0">Выберите Уч. план</option></select>');
             $('#subject').html('Предмет:<br /><select size="1" name="subject" id="subject_list"><option value="0">Выберите группу</option></select>');
             $('#classrooms_timetable').html('Аудитория:<select size="1" name="auditor" id="add_auditor_list"><option value="0">Выберите когда</option></select>');
             $('#weeks_timetable').html('День:<select size="1" name="day" ><option value="0">Выберите</option><option value="1">Понедельник</option><option value="2">Вторник</option><option value="3">Среда</option><option value="4">Четверг</option><option value="5">Пятница</option><option value="6">Суббота</option></select>');
             $('#subject_num_timetable').html('Пара:<br /><select size="1" name="num" ><option value="0">Выберите</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></div>');
             $('#days_timetable').html('День:<select size="1" name="day" ><option value="0">Выберите</option><option value="1">Понедельник</option><option value="2">Вторник</option><option value="3">Среда</option><option value="4">Четверг</option><option value="5">Пятница</option><option value="6">Суббота</option></select></div>');	
    			
            var teach_plan_start = 'Уч. План<br/><select size="1" name="teach_plan" ><option value="0">Выберите</option>';
            var teach_plan_end = '</select>';
            $.ajax({
                        	url:	 'ajaxuniverteachplan',
                        	type:	 'POST', //что-нибудь получим
                            processData: false,
                            data: 'univer='+$("#vuz_timetable option:selected").val(),
                        	success: function(data){
                        		  $('#teach_plan').html(teach_plan_start+data+teach_plan_end);
                                }
                            });           
            });
        
        
       
        </script>
        
    	<div id="groups">
			Группы:
			<select size="1" name="group" id="groups_list">
                <option value="0">Выберите Уч. план</option>
			</select>
	    </div>  
        <script>
            //выбор учебного плана = подгрузка групп
        $('#teach_plan').change( function() {
             $('#subject').html('Предмет:<br /><select size="1" name="subject" id="subject_list"><option value="0">Выберите группу</option></select>');
             $('#classrooms_timetable').html('Аудитория:<select size="1" name="auditor" id="add_auditor_list"><option value="0">Выберите когда</option></select>');
             $('#weeks_timetable').html('День:<select size="1" name="day" ><option value="0">Выберите</option><option value="1">Понедельник</option><option value="2">Вторник</option><option value="3">Среда</option><option value="4">Четверг</option><option value="5">Пятница</option><option value="6">Суббота</option></select>');
             $('#subject_num_timetable').html('Пара:<br /><select size="1" name="num" ><option value="0">Выберите</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></div>');
             $('#days_timetable').html('День:<select size="1" name="day" ><option value="0">Выберите</option><option value="1">Понедельник</option><option value="2">Вторник</option><option value="3">Среда</option><option value="4">Четверг</option><option value="5">Пятница</option><option value="6">Суббота</option></select></div>');	
    		
        var start = 'Группы:<br/><select size="1" name="group" id="groups_list"><option value="0">Выберите</option>';
        var end = '</select>';
        $.ajax({
                    	url:	 'ajaxcurriculagrouplist',
                    	type:	 'POST', //что-нибудь получим
                        processData: false,
                        data: 'curricula='+$("#teach_plan option:selected").val(),
                    	success: function(data){
                    		  $('#groups').html(start+data+end);
                            }
                        });
         });   
         </script>
         
         <div id="subject">
			Предмет:<br />
			<select size="1" name="subject" id="subject_list">
            	<option value="0">Выберите группу</option>
			</select>
	     </div>
        <script>  
       //выбор группы = подгрузка предметов 
       $('#groups').change( function() {
             $('#classrooms_timetable').html('Аудитория:<select size="1" name="auditor" id="add_auditor_list"><option value="0">Выберите когда</option></select>');
             $('#weeks_timetable').html('День:<select size="1" name="day" ><option value="0">Выберите</option><option value="1">Понедельник</option><option value="2">Вторник</option><option value="3">Среда</option><option value="4">Четверг</option><option value="5">Пятница</option><option value="6">Суббота</option></select>');
             $('#subject_num_timetable').html('Пара:<br /><select size="1" name="num" ><option value="0">Выберите</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></div>');
             $('#days_timetable').html('День:<select size="1" name="day" ><option value="0">Выберите</option><option value="1">Понедельник</option><option value="2">Вторник</option><option value="3">Среда</option><option value="4">Четверг</option><option value="5">Пятница</option><option value="6">Суббота</option></select></div>');	
    		            
        var start = 'Предмет:<br /><select size="1" name="subject" id="subject_list"><option value="0">Выберите</option>';
        var end = '</select>';
        $.ajax({
                    	url:	 'ajaxsubjectlist',
                    	type:	 'POST', //что-нибудь получим
                        processData: false,
                        data:'group='+$("#groups option:selected").val()+ 
                        '&curricula='+$("#teach_plan option:selected").val(), 
                    	success: function(data){
                    		  $('#subject').html(start+data+end);
                            }
                        });     
        });
        </script>
         
        <!--Кто?-->
<div id="who">
    <div id="when_time">
        <div id="weeks_timetable">
            Тип недели:
    		<select size="1" name="week" >
                <option value="0">Выберите</option>
    			<option value="1">Числитель</option>
    			<option value="2">Знаменатель</option>
            </select>
    	</div>
     <div id="days_timetable">
            День:
    		<select size="1" name="day" >
                <option value="0">Выберите</option>
    			<option value="1">Понедельник</option>
    			<option value="2">Вторник</option>
    			<option value="3">Среда</option>
    			<option value="4">Четверг</option>
    			<option value="5">Пятница</option>
    			<option value="6">Суббота</option>
            </select>
    	</div>
        <div id="subject_num_timetable">
            Пара:<br />
    		<select size="1" name="num" >
                <option value="0">Выберите</option>
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
    Аудитория:
		<select size="1" name="classroom" id="add_auditor_list">
        <option value="0">Выберите когда</option>
		</select>
	</div>
    <script>
 $('#when_time').change( function() {
        if ($("#weeks_timetable option:selected").val() == 0) return;
        if ($("#days_timetable option:selected").val() == 0) return;
        if ($("#subject_num_timetable option:selected").val() == 0) return;
        if ($("#vuz_timetable option:selected").val() == 0) return;
                
        var start = 'Аудитория:<select size="1" name="auditor" id="add_auditor_list"><option value="0">Выберите</option>';
        var end = '</select>';
        
        $.ajax({
                    	url:	 'ajaxfreeclassroomslist',
                    	type:	 'POST', //что-нибудь получим
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
     <div id="teacher_timetable">
    Преподаватель:
		<select size="1" name="teacher" id="add_teacher_list">
        <option value="0">Выберите предмет</option>
		</select>
	</div>
    <script>
 $('#subject').change( function() {
        if ($("#vuz_timetable option:selected").val() == 0) return;
                
        var start = 'Преподаватель:<select size="1" name="teacher" id="add_teacher_list"><option value="0">Выберите</option>';
        var end = '</select>';
        
        $.ajax({
                    	url:	 'ajaxteacherlist',
                    	type:	 'POST', //что-нибудь получим
                        processData: false,
                        data:   'subject='+$("#subject option:selected").val()+
                            '&curricula='+$("#teach_plan option:selected").val(), 
                    	success: function(data){
                    		  $('#teacher_timetable').html(start+data+end);
                            }
                        });     
        });
</script>
    
   
</div>
<!--Где?-->


  <div  id="add_timetable_button">
  <input type="button" class="button" value="Добавить" /></div>
  <div id="add_timetable_status"></div>
  <script>
   $('#add_timetable_button').click( function() {
        $.ajax({
                    	url:	 'ajaxaddtimetable',
                    	type:	 'POST', //что-нибудь получим
                        processData: false,
                        data:
                            'week='+$("#weeks_timetable option:selected").val()+ 
                            '&day='+$("#days_timetable option:selected").val()+
                            '&num='+$("#subject_num_timetable option:selected").val()+
                            '&univer='+$("#vuz_timetable option:selected").val()+ 
                            '&subject='+$('#subject option:selected').val()+
                            '&classroom='+$('#classrooms_timetable option:selected').val()+
                            '&group='+$("#groups option:selected").val()+ 
                            '&curricula='+$("#teach_plan option:selected").val()+
                            '&teacher='+$("#teacher_timetable option:selected").val(), 
                    	success: function(data){
                    	    alert(data);
                            if (data == '-1'){$('#add_timetable_status').html('Ошибка');}
                            else
                            {$('#add_timetable_status').html('Добавлено');}
                    		  
                            }
                        });   
    
   });</script>
</div>

