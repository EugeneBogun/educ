$(document).ready(function(){
//��������� ������ ��������
	$('#buffer_text').text('');
	selected1=0;
	selected2=0;
	selected3=0;
	selected4=0;

	$.ajax({
		url:	 'ajaxuniverlist',
		type:	 'POST', //���-������ �������
		processData: false,
		success: function(data){
			$('#vuz_list_invite').html(data);
			}
		});
//������� ��������� ��������	
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
		$('#category').html('����� ���������:<br/><select size="1" id="switch_category"><option value="0">��������</option><option value="U">�����������</option><option value="D">���������</option><option value="S">��</option><option value="G">�����</option></select>');
		$('#rol').html('������� ����:<br/><select size="1" id="invites_rols_list"></select>');
		$('#select_category').html('');
		$('#validation').html('');
		});
//������� ��������� ���������	
	$('#category').change(function(){
		$('#validation').html('');
		if($('#switch_category').val()!="0")
			{
			selected2=1;
			if($('#switch_category').val()!="U")
				{
				category = $("#switch_category option:selected").text();
				$('#select_category').html('������� '+category+':<br/><select size="7" id="category_list_invite"></select>');
				$.ajax({
					url:	 'ajaxcategorylist',
					type:	 'POST', //���-������ �������
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
//������� ������ ���������
	$('#select_category').change(function(){
		selected3=1;
		$('#validation').html('');
		});
//������� ��������� ��������	
	$('#vuz_list_invite').change(function(){
		if($('#vuz_list_invite').val()!=0)
			{
			$.ajax({
			url:	 'ajaxroleslist',
			type:	 'POST', //���-������ �������
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
//������� ��������� ��������
	$('#rol').change(function(){
		selected4=1;
		$('#rol_val').html('');
		});	
//������� �� ����������		
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
//�-��� ���������� �������� � ������
	$('#add_data').click(function(){
		if(selected1==1)
			{
			if(selected4==0)
				{
				$('#rol_val').html('�������� ����');
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
							$('#validation').html('�������� '+category);
							}
						}
					}
				else
					{
					$('#validation').html('�������� ���������');
					}
				}
			}
		else
			{
			$('#validation').html("�������� ������");
			}
		});
	});