<?
 echo '  <div id="subjects">
                <div id ="subjects_title">���������� �������:<span style="padding-right:10px;float:right; color:#d2c939;">���������</span></div>	
            	<table id="subjects_table">
            	<tr ><td id="day">�����������</td><td id="day">�������</td><td id="day">�����</td><td id="day">�������</td><td id="day">�������</td><td id="day">�������</td></tr>';
        for ($i=1;$i<5;$i++)
		{
		  echo '<tr id="row">';
    		  for ($j=1;$j<7;$j++)//��� ����
                { if (isset($timetable[$j][$i])) {echo '<td>'.$timetable[$j][$i]['subject'].'<br/> '.$timetable[$j][$i]['classroom'].'</td>';} else {echo '<td></td>';}}
          echo '</tr>';
            
        }
        echo '</table></div>';