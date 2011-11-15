<link href="/css/add_invites.css" rel="stylesheet" type="text/css" />
<script src="/js/invite.js"></script>

<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>


<div id="main">
	<div id="title">Создание инвайтов</div>
	<div id="data_invites">
		<div id="select_data">
			<div id="vuz_category">
				<div id="select_vuz">
					Выбрыть универ:<br/>
					<Select size="1" id="vuz_list_invite" name="vuz_list_invite">
					</select>
				</div>
				<div id="category">
				</div>
			</div>
			<div id="select_category">
			</div>
			<div id="rol_col">
				<div id="rol">
				</div>
				<div id="col">
					Выбрать количество:
					<div id="count">
						<div id="dec"></div>
						<div id="num" value="1">1</div>
						<div id="inc"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="buffer">
			<textarea rows="3" cols="50" id="buffer_text" disabled>
			</textarea>
		</div>
		<div id="proces_data">
			<div id="add_data">Добавить</div>
			<div id="save_data">Создать</div>
			<div id="invites_list_open">Инвайты</div>
		</div>
		<div id="validation">
		</div>
		<div id="rol_val">
		</div>
	</div>
</div>
<div id="dialog" title="Диалоговое окно">
</div>
