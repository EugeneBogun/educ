
<!--<div id='subjects'>
			<div id ="subjects_title">���������� �������:<span style="padding-right:10px;float:right; color:#d2c939;">���������</span></div>	
			<table id='subjects_table'>
			<tr ><td id="day">�����������</td><td id="day">�������</td><td id="day">�����</td><td id="day">�������</td><td id="day">�������</td><td id="day">�������</td></tr>
			<tr id="row"><td> ���� ����� �. <br />2-303</td><td></td><td> ���� ������ �.<br/>3-110</td><td></td><td></td><td></td></tr>
			<tr id="row"><td>������ ������� �.<br/>2-303</td><td></td><td></td><td></td><td></td><td></td></tr>
			<tr id="row"><td></td><td></td><td></td><td></td><td></td><td></td></tr>
			</table>
		</div>-->
<div id='subjects'>
<div id ="subjects_title">���������� �������:<span style="padding-right:10px;float:right; color:#d2c939;">���������</span></div>	
	<table id='subjects_table'>
	<tr ><td id="day">�����������</td><td id="day">�������</td><td id="day">�����</td><td id="day">�������</td><td id="day">�������</td><td id="day">�������</td></tr>
	<tr >
	<?
		echo '<tr id="row">';
		for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][1]))
			{
			echo '<td>'.$timetable[$i][1][1].' - '.$timetable[$i][1][2].'<br />'.$timetable[$i][1][3].'</td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
			else
			{
			echo '<td></td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
    	}
        echo '</tr><tr id="row">';
        for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][2]))
			{
			echo '<td>'.$timetable[$i][2][1].' - '.$timetable[$i][2][2].'<br />'.$timetable[$i][2][3].'</td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
			else
			{
			echo '<td></td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
    	}
        echo '</tr><tr id="row">';
        for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][3]))
			{
			echo '<td>'.$timetable[$i][3][1].' - '.$timetable[$i][3][2].' <br />'.$timetable[$i][3][3].'</td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
			else
			{
			echo '<td></td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
    	}
        echo '</tr><tr id="row">';
        for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][4]))
			{
			echo '<td>'.$timetable[$i][4][1].' - '.$timetable[$i][4][2].'<br />'.$timetable[$i][4][3].'</td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
			else
			{
			echo '<td></td>'; //��. 1 ���� 1 = ��� 2 = ��� 3 = ���
			}
    	}
		?>
        
		</tr>
	</table>
</div>
