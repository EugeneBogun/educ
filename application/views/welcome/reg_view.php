  <div class="welcome">
	<a href="reg">Зарегистрируемся</a>, <a href="login">войдем</a> или уже почитаем <a href="about">информацию о проекте</a>?
  </div>
  <div class="title">
 	<h1>Регистрация</h1>
  <!-- end .title --></div>
    <p> Учишь - значит порядок.</p>
    
		<form action="" method="POST" id="reg-form">
           <table>
           
                <tr id="login">
                  <th>E-Mail:</th>
                  <td><input type="text" name="mail" class="text" value="<?echo $login?>" /></td>
                </tr>
                 <td/>
				 <td>
                    E-Mail и пароль используются при входе на сайт.
                    <br/>
					<?echo form_error('mail');?>
				 </td>
                    <tr>
                   	 <td/>
                     <td><br/></td>
                    </tr>
                                  
                <tr id="passw">
                  	<th>Пароль:</th>
				    <td>
                    	<input type="text" name="passw" class="text" value="" />
                    </td>
                </tr>
                  <td/>
				  <td>
                  	Введите пароль и запомните его.
					<br/>
					<?echo form_error('passw');?>
                  </td>
                  
                    <tr>
                   	 <td/>
                     <td><br/></td>
                    </tr>
                      
                  <tr id="key" >
                    <th>Ключ:</td>
					<td><input type="text" name="key" class="text" value="<?echo $key?>" /></td>
                  </tr>
                  <td/>
				  <td>
                  	Ключ вы получаете лично в руки от администрации. Он использется 1 раз.
					<br/>
					<?echo form_error('key');?>
                  </td>
                  <tr>
              	  <td/>
				  <td>
                  	<input type="submit" class="submit" value="Создать аккаунт" />
                  </td>
                  </tr>
              </table>
			  
	
					
		</form>