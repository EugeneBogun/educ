 <div id="background_global">
 <div id="left_bar">
      	<div id="avatar">
			<img src="img/avatar/user.png" />
            <!--Иванов И.И. |  Курсант-->
		</div>
		<div id="message_button" style="width:auto; height:auto; margin-left:13px; margin-top:10px;">
			<a href="message?to=<?=$info['id'];?>"><button class="button" style="width:150px; margin-left:-6px; margin-top:5px;">Отправить сообщение</button></a>
		</div>	
     </div>
<div id="content">
		<!--<h3>Богун Е.А. - Курсант</h3>-->
		<div id='news'>
			<div id ="news_title">Новости:</div>	
			<table id='news_table'>
				<tr id="row"><td id="title"> Уборка аудитории</td><td id="text"> В среду уборка. Быть всем!</td><td id="date">15.09.2011</td><td id="autor">Бурак В.</td></tr>
				<tr id="row"><td> Классный час</td><td>Все кого не было на классном часе - пишите...</td><td> 15.09.2011</td><td>Бурак В.</td></tr>
				<tr id="row"><td></td><td></td><td></td><td></td></tr>
			</table>
		</div>
<div id='file'>
			<div id ="file_title">Файлы</div>	
			<table id='file_table'>
				<tr id="row"><td id="title">Лабы 1 семестр</td><td id="subject">СПЗ</td><td id="date">21.10.2011</td><td id="autor">Лисенко Т.М.</td></tr>
				<tr id="row"><td></td><td></td><td></td><td></td></tr>
				<tr id="row"><td></td><td></td><td></td><td></td></tr>
			</table>
		</div>
<div id="subjects_ajax"></div>
<script language="JavaScript"> 
<?if (isset($info_group)){echo
"$.ajax({
        	url:	 'ajaxtimetable',
        	type:	 'POST', //что-нибудь получим
            processData: false,
            data: 'id = ".$info['id']."',
        	success: function(data){
        		  $('#subjects_ajax').html(data);
                }
            });";
			}
if (isset($info_subjects)){echo
"$.ajax({
        	url:	 'ajaxtimetable_subject_curricula',
        	type:	 'POST', //что-нибудь получим
            processData: false,
            data: 'Subjects_Curricula_id = ".$info_subjects['id']."',
        	success: function(data){
        		  $('#subjects_ajax').html(data);
                }
            });";
			}?>
		
</script>