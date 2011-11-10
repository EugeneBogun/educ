$(document).ready(function(){
//подгрузка списка универов
	$('#buffer_text').text('');
	selected1=0;
	selected2=0;
	selected3=0;
	selected4=0;

	$.ajax({
		url:	 'ajaxuniverlist',
		type:	 'POST', //что-нибудь получим
		processData: false,
		success: function(data){
			$('#vuz_list_invite').html(data);
			}
		});
//функция изменения универов	
	$('#vuz_list_invite').change(function(){
		if($('#vuz_list_invite').val()!="0")
			{
			selected1=1;
			}
			else
			{
			selected1=0;
			}
		selected2=0;
		selected3=0;
		selected4=0;
		$('#category').html('Выбор категории:<br/><select size="1" id="switch_category"><option value="0">Выбирите</option><option value="U">Университет</option><option value="D">Отделение</option><option value="S">ЦК</option><option value="G">Група</option></select>');
		$('#rol').html('Выбрать роль:<br/><select size="1" id="invites_rols_list"></select>');
		$('#select_category').html('');
		$('#validation').html('');
		});
//функция изменения категорий	
	$('#category').change(function(){
		$('#validation').html('');
		if($('#switch_category').val()!="0")
			{
			selected2=1;
			if($('#switch_category').val()!="U")
				{
				category = $("#switch_category option:selected").text();
				$('#select_category').html('Выбрать '+category+':<br/><select size="7" id="category_list_invite"></select>');
				$.ajax({
					url:	 'ajaxcategorylist',
					type:	 'POST', //что-нибудь получим
					processData: false,
					data:'category='+$("#switch_category option:selected").val()+'&id_univer='+$("#vuz_list_invite option:selected").val(),
					success: function(data){
						alert(data);
						$('#category_list_invite').html(data);
						}
					});
				}
			else
				{
				$('#select_category').html('');
				}
			}
		else
			{
			selected2=0;
			$('#select_category').html('');
			}
		selected3=0;
		});
//функция выбора категорий
	$('#select_category').change(function(){
		selected3=1;
		$('#validation').html('');
		});
//функция изменения универов	
	$('#vuz_list_invite').change(function(){
		if($('#vuz_list_invite').val()!=0)
			{
			$.ajax({
			url:	 'ajaxroleslist',
			type:	 'POST', //что-нибудь получим
			processData: false,
			data:'univer_id='+$('#vuz_list_invite').val(),
			success: function(data){
				alert(data);
				$('#invites_rols_list').html(data);}
				});
			}
		else
			{
			$('#rol').html('');
			$('#category').html('');
			}
		});
//функция изменения инвайтов
	$('#rol').change(function(){
		selected4=1;
		$('#rol_val').html('');
		});	
//функция на количество		
	//var num = $('#num').val();
	num = 1;
	$('#inc').click(function(){
		if(num<35)
			{
			num++;
			}
		else
			{
			num=1;
			}
		$('#num').text(num);
		$('#num').val(num);
		});
		
	$('#dec').click(function(){
		if(num>1)
			{
			num--;
			}
		else
			{
			num=35;
			}
		$('#num').text(num);
		$('#num').val(num);
		});	
//ф-ция добавления инвайтов в буффер
	$('#add_data').click(function(){
		if(selected1==1)
			{
			if(selected4==0)
				{
				$('#rol_val').html('Выбирете роль');
				}
			else
				{
				if(selected2==1)
					{
					text = $('#buffer_text').text();
					if(($('#switch_category').val()=="0")||($('#switch_category').val()=="U"))
						{
						category_buffer = "U";
						id_category_buffer = $('#vuz_list_invite').val();
						$('#buffer_text').text(text+category_buffer+":"+id_category_buffer+":"+$('#invites_rols_list').val()+";");
						//$('#vuz_list_invite').change
						$('#vuz_list_invite').trigger('change');
						}
					else
						{
						if(selected3==1)
							{
							category_buffer = $('#switch_category').val();
							id_category_buffer = $('#category_list_invite').val();
							$('#buffer_text').text(text+category_buffer+":"+id_category_buffer+":"+$('#invites_rols_list').val()+";");
							}
						else
							{
							$('#validation').html('Выбирете '+category);
							}
						}
					}
				else
					{
					$('#validation').html('Выбирете категорию');
					}
				}
			}
		else
			{
			$('#validation').html("Выбирете универ");
			}
		});
	});