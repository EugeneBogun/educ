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
                  <th>E-Mail:</th>
                  <td><input type="text" name="mail" class="text" value="<?echo $login?>" /></td>
                </tr>
                 <td/>
				 <td>
                    E-Mail � ������ ������������ ��� ����� �� ����.
                    <br/>
					<?echo form_error('mail');?>
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
					<br/>
					<?echo form_error('passw');?>
                  </td>
                  
                    <tr>
                   	 <td/>
                     <td><br/></td>
                    </tr>
                      
                  <tr id="key" >
                    <th>����:</td>
					<td><input type="text" name="key" class="text" value="<?echo $key?>" /></td>
                  </tr>
                  <td/>
				  <td>
                  	���� �� ��������� ����� � ���� �� �������������. �� ����������� 1 ���.
					<br/>
					<?echo form_error('key');?>
                  </td>
                  <tr>
              	  <td/>
				  <td>
                  	<input type="submit" class="submit" value="������� �������" />
                  </td>
                  </tr>
              </table>
			  
	
					
		</form>