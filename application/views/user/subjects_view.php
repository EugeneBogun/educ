<div id="subjects_ajax"></div>
<script language="JavaScript">
$(document).ready(function(){    
		$.ajax({
        	url:	 'ajaxtimetable',
        	type:	 'POST', //���-������ �������
            processData: false,
            data: 'group='+$("#title_bar_group").val(),
        	success: function(data){
        		  $('#subjects_ajax').html(data);
                }
            });
        });
</script>