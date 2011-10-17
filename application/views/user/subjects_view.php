
<!--<div id='subjects'>
			<div id ="subjects_title">Расписание занятий:<span style="padding-right:10px;float:right; color:#d2c939;">Числитель</span></div>	
			<table id='subjects_table'>
			<tr ><td id="day">Понедельник</td><td id="day">Вторник</td><td id="day">Среда</td><td id="day">Четверг</td><td id="day">Пятница</td><td id="day">Суббота</td></tr>
			<tr id="row"><td> ОБДЗ Бурак В. <br />2-303</td><td></td><td> ИЗВП Попика А.<br/>3-110</td><td></td><td></td><td></td></tr>
			<tr id="row"><td>РЗИКСА Севенко Р.<br/>2-303</td><td></td><td></td><td></td><td></td><td></td></tr>
			<tr id="row"><td></td><td></td><td></td><td></td><td></td><td></td></tr>
			</table>
		</div>-->
<div id='subjects'>
<div id ="subjects_title">Расписание занятий:<span style="padding-right:10px;float:right; color:#d2c939;">Числитель</span></div>	
	<table id='subjects_table'>
	<tr ><td id="day">Понедельник</td><td id="day">Вторник</td><td id="day">Среда</td><td id="day">Четверг</td><td id="day">Пятница</td><td id="day">Суббота</td></tr>
	<tr >
	<?
		echo '<tr id="row">';
		for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][1]))
			{
			echo '<td>'.$timetable[$i][1][1].' - '.$timetable[$i][1][2].'<br />'.$timetable[$i][1][3].'</td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
			else
			{
			echo '<td></td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
    	}
        echo '</tr><tr id="row">';
        for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][2]))
			{
			echo '<td>'.$timetable[$i][2][1].' - '.$timetable[$i][2][2].'<br />'.$timetable[$i][2][3].'</td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
			else
			{
			echo '<td></td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
    	}
        echo '</tr><tr id="row">';
        for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][3]))
			{
			echo '<td>'.$timetable[$i][3][1].' - '.$timetable[$i][3][2].' <br />'.$timetable[$i][3][3].'</td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
			else
			{
			echo '<td></td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
    	}
        echo '</tr><tr id="row">';
        for ($i=1;$i<7;$i++)
		{
			if (isset($timetable[$i][4]))
			{
			echo '<td>'.$timetable[$i][4][1].' - '.$timetable[$i][4][2].'<br />'.$timetable[$i][4][3].'</td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
			else
			{
			echo '<td></td>'; //пн. 1 пара 1 = где 2 = что 3 = кто
			}
    	}
		?>
        
		</tr>
	</table>
</div>
