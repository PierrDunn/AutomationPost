<div class="modal fade" id="Login" tabindex="-1" role="dialog" style="margin-top: 10em">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Вход</h4>
			</div>
			<div class="modal-body">

				<form method="post" action="#">
					<div id="bad_username"></div>
					<div class="field">
						<label for="message">Email</label>
						<input type="text" name="identity" id="identity" value="" placeholder="" />
					</div>
					<div class="field">
						<label for="message">Пароль</label>
						<input type="password" name="password" id="password" value="" placeholder="" />
					</div>
				</form>
					
			</div>
			<div class="modal-footer">
				<ul class="actions">
					<li><input id="sumbit" type="submit" onclick="login()" value="Вход" class="special" ></li>
					<li><input type="reset" value="Отмена" data-dismiss="modal"></li>
				</ul>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="Registration" tabindex="-1" role="dialog" style="margin-top: 10em">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Регистарция</h4>
			</div>
			<div class="modal-body">


					<div id="bad"></div>
					<div class="field">
						<label for="message">Введите имя</label>
						<input type="text" name="first_name" id="first_name" value="" placeholder="" /><br>
					</div>
					<div class="field">
						<label for="message">Введите Email</label>
						<input type="text" name="email" id="email" value="" placeholder="" /><br>
					</div>
					<div class="field">
						<label for="message">Введите пароль (минимум 8 символов)</label>
						<input type="password" name="pass" id="pass" value="" placeholder="" /><br>
					</div>
					<div class="field">
						<label for="message">Введите пароль еще раз</label>
						<input type="password" name="password_confirm" id="password_confirm" value="" placeholder="" /><br>
					</div>
					<div id="modal-body"></div>		
			</div>
			<div class="modal-footer">
				<ul class="actions">
					<li><input type="submit" onclick="reg()" value="Зарегистрироваться" class="special"></li>
					<li><input type="reset" value="Отмена" data-dismiss="modal"></li>
				</ul>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">


	
$(document).keypress(function(e) {
    if(e.which == 13) {
    	login();
    	reg();
    }
});		

function login(){
    var identity = $('#identity').val();
	var password = $('#password').val();
    var html = $.ajax({
			type: "POST",
			// Тут в качестве параметра url мы указываем на
			// controller который будет обрабатывать наши данные
			url: "http://automationpost.ru/startpage/login",
            data: ({
				// Перечесляем передаваемые переменные
				// Сначала идёт название которое получит controller
				// через метод post, следом наша переменная с данными
				'identity' : identity,
				'password' : password,
			}),
           // dataType: "html",
            async: false
        }).responseText;  

		if(html){
			$('#bad_username').replaceWith('');
			location.reload()
		}
		else{
			$('#bad_username').replaceWith('<div id="bad_username" style="color:red;">' + '<p>(Неправильно введены логин или пароль)</p></div>');
		}
    }

	function reg(){	
	var pass = $('#pass').val();
	var password_confirm = $('#password_confirm').val();
	var email = $('#email').val();
	var first_name = $('#first_name').val();
	
   	var html = $.ajax({

			type: "POST",
			// Тут в качестве параметра url мы указываем на
			// controller который будет обрабатывать наши данные
			url: "http://automationpost.ru/startpage/create_user",
            data: ({
				// Перечесляем передаваемые переменные
				// Сначала идёт название которое получит controller
				// через метод post, следом наша переменная с данными
				'password' : pass,
				'password_confirm' : password_confirm,
				'email' : email,
				'first_name' : first_name
			}),
            async: false
        }).responseText;
		if(html){
			$('#modal-body').replaceWith('<div id="modal-body" >' + '<p>На ' + email + ' отправлено письмо со ссылкой для подтверждения почтового адреса</p></div>');
			$('#bad').replaceWith('<div id="bad" style="color:red;">' + '<p></p></div>');
		}
		else{
			$('#bad').replaceWith('<div id="bad" style="color:red;">' + '<p>Проверьте правильность введенных данных</p></div>');
		} 
}
</script>

<!-- Отправка сообщений на почту -->
<div class="modal fade" id="Send_msg" tabindex="-1" role="dialog" style="margin-top: 10em">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Отправить сообщения</h4>
			</div>
			<div class="modal-body">

				<form class="send_msg" method="post" action="#">
						<div class="field half first">
							<label for="name">Ваше имя</label>
							<input type="text" name="name" id="namemsg">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="emailmsg">
						</div>
						<div class="field">
							<label for="message">Ваше сообщение</label>
							<textarea name="message" id="textmsg" rows="6"></textarea>
						</div>
				</form>
					
			</div>
			<div class="modal-footer">
				<ul class="actions">
					<li><input id="sumbit" type="submit"  value="Отправить" class="special sendmsg" ></li>
					<li><input type="reset" value="Отмена" data-dismiss="modal"></li>
				</ul>
			</div>
			
		</div>
	</div>
</div>
<script>
$('.sendmsg').on('click', function(){
	var m = $('#emailmsg').val();
	var n = $('#namemsg').val();
	var t = $('#textmsg').val();
	var msgs = $.ajax({
		type: "POST",
		url: "http://automationpost.ru/startpage/send_msg",
		data: ({
		email : m,
		name: n,
		text: t
		}),
		success:(function(data){
			$('#send_msg_info').remove()
			$('.send_msg').before('<p id="send_msg_info"style="color: red">('+data+')</p>'); 
		})
	});
});
</script>
<!-- /Отправка сообщений на почту/ -->