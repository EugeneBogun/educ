  <div class="welcome">
	<a href="reg">Зарегистрируемся</a>, <a href="login">войдем</a> или уже почитаем <a href="about">информацию о проекте</a>?
  </div>
  <div class="title">
 	<h1>Вход</h1>
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
                  <th>Пароль:</th>
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
                  	<input type="submit" class="submit" value="Войти" />
                  </td>
                  </tr>
              </table>			
		</form>