  <div class="welcome">
	<a href="reg">����������������</a>, <a href="login">������</a> ��� ��� �������� <a href="about">���������� � �������</a>?
  </div>
  <div class="title">
 	<h1>�����������</h1>
  <!-- end .title --></div>
    <p> ����� - ������ �������.</p>
    
		<form action="" method="POST" id="reg-form">
           <table>
           
                <tr id="login">
                  <th>�����:</th>
                  <td><input type="text" name="login" class="text" value="" /></td>
                </tr>
            
                 <td/>
				 <td>
                    ����� � ������ ������������ ��� ����� �� ����.
                    <br/>
 					����� ����� �������� �� ���� ����������� ��������, ���� 0-9 ��� ������ �-�.
				 </td>
                 
                    <tr>
                   	 <td/>
                     <td><br/></td>
                    </tr>
                                  
                  <tr id="passw">
                  	<th>������:</th>
				    <td>
                    	<input type="text" name="passw" class="text" value="" />
                    </td>
                  </tr>
                         
                  <td/>
				  <td>
                  	������� ������ � ��������� ���.
                  </td>
                  
                    <tr>
                   	 <td/>
                     <td><br/></td>
                    </tr>
                      
                  <tr id="key" >
                    <th>����:</td>
					<td><input type="text" name="key" class="text" value="" /></td>
                  </tr>
                  
                  <td/>
				  <td>
                  	���� �� ��������� ����� � ���� �� �������������. �� ����������� 1 ���.
                  </td>
                  <tr>
              	  <td/>
				  <td>
                  	<input type="submit" class="submit" value="������� �������" />
                  </td>
                  </tr>
              </table>
			  
	
					
		</form>
		<?
			echo form_error('login');
            echo form_error('passw');
            echo form_error('key');
        ?>