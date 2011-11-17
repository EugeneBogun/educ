<?
 echo '  <div id="subjects">
                <div id ="subjects_title">Расписание занятий:<span style="padding-right:10px;float:right; color:#d2c939;">Числитель</span></div>	
            	<table id="subjects_table">
            	<tr ><td id="day">Понедельник</td><td id="day">Вторник</td><td id="day">Среда</td><td id="day">Четверг</td><td id="day">Пятница</td><td id="day">Суббота</td></tr>';
        for ($i=1;$i<5;$i++)
		{
		  echo '<tr id="row">';
    		  for ($j=1;$j<7;$j++)//дни пары
                { if (isset($timetable[$j][$i])) {echo '<td>'.$timetable[$j][$i]['subject'].'<br/> '.$timetable[$j][$i]['classroom'].'</td>';} else {echo '<td></td>';}}
          echo '</tr>';
            
        }
        echo '</table></div>';