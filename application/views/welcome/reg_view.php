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
                  <th>Логин:</th>
                  <td><input type="text" name="login" class="text" value="" /></td>
                </tr>
            
                 <td/>
				 <td>
                    Логин и пароль используются при входе на сайт.
                    <br/>
 					Логин может состоять из букв английского алфавита, цифр 0-9 или дефиса «-».
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
                  </td>
                  
                    <tr>
                   	 <td/>
                     <td><br/></td>
                    </tr>
                      
                  <tr id="key" >
                    <th>Ключ:</td>
					<td><input type="text" name="key" class="text" value="" /></td>
                  </tr>
                  
                  <td/>
				  <td>
                  	Ключ вы получаете лично в руки от администрации. Он использется 1 раз.
                  </td>
                  <tr>
              	  <td/>
				  <td>
                  	<input type="submit" class="submit" value="Создать аккаунт" />
                  </td>
                  </tr>
              </table>
			  
	
					
		</form>
		<?
			echo form_error('login');
            echo form_error('passw');
            echo form_error('key');
        ?>