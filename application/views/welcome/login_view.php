  <div class="welcome">
	<a href="reg">����������������</a>, <a href="login">������</a> ��� ��� �������� <a href="about">���������� � �������</a>?
  </div>
  <div class="title">
 	<h1>����</h1>
  <!-- end .title --></div>
		<form action="" method="POST" id="login-form">
           <table>
           			
                <tr>
                 <td/>
                 <td><br/></td>
                </tr>
                    
                <tr>
                  <th>E-Mail:</th>
                  <td><input type="text" name="mail" class="text" value="<?echo $login?>" /></td>
                </tr> 
				<td/>
				 <td>
					<?echo form_error('mail');?>
				 </td>
                <tr >
                  <th>������:</th>
				  <td><input type="text" name="passw" class="text" value="" /></td>
                </tr>
				<td/>
				 <td>
					<?echo form_error('passw');?>
				 </td>
				<tr>
                   	 <td/>
                     <td></td>
                </tr>
              	  <td/>
				  <td>
                  	<input type="submit" class="submit" value="�����" />
                  </td>
                  </tr>
              </table>			
		</form>