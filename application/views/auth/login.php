<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вход в админ панель</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="/assets/img/favicon.png" type="image/x-icon" />
	<link rel="shortcut icon" href="/_old_files/assets/favicon.ico" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
	
	<!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

</head>
<body>
<style>
	body {
	  font-family: 'Fira Sans', sans-serif;
	  padding-top: 150px;
	  background-attachment: fixed;
	  background-repeat: no-repeat;
	  background-size: cover;
	}

	.form-signin {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	  background-color: rgba(8, 8, 8, 0.8);
	}
	h2{
      text-transform: none;
      font-weight: normal;
	  color: #e5474b;	
	}
	.btn{
	  background-color: #e5474b;
	  border: none;
	}
	.btn-success:hover{
	  background-color: #97181c !important;
	  border: none;
	}
	.form-signin .form-signin-heading,
	.form-signin .checkbox {
	  margin-bottom: 10px;
	}
	.form-signin .checkbox {
	  font-weight: normal;
	}
	.form-signin .form-control {
	  position: relative;
	  height: auto;
	  -webkit-box-sizing: border-box;
		 -moz-box-sizing: border-box;
			  box-sizing: border-box;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="email"] {
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	input{
		margin-bottom: 5px !important;
	}
</style>
<script>
function r(n,m){
				return Math.floor(Math.random() * (n - m + 1)) + m; 
			};
			switch(r(1, 7)){
				case 1:
					document.body.style.backgroundImage = "url('/assets/img/an1.gif')";
					break;
				case 2:
					document.body.style.backgroundImage = "url('/assets/img/an2.gif')";
					break;
				case 3:
					document.body.style.backgroundImage = "url('/assets/img/an3.gif')";
					break;
				case 4:
					document.body.style.backgroundImage = "url('/assets/img/an1.gif')";
					break;
				case 5:
					document.body.style.backgroundImage = "url('/assets/img/an2.gif')";
					break;
				case 6:
					document.body.style.backgroundImage = "url('/assets/img/an3.gif')";
					break;
				case 7:
					document.body.style.backgroundImage = "url('/assets/img/an1.gif')";
					break;
				default:
					document.body.style.backgroundImage = "url('/assets/img/an2.gif')";
			};
</script>

<div class="container">
      <?php echo form_open("auth/login", array('class'=>'form-signin'));?>
	    <h2 class="form-signin-heading">Войти</h2>
	    <div id="infoMessage"><?php echo $message;?></div>
		<fieldset>
			<label for="inputEmail" class="sr-only">Email или Имя профиля</label>
			<input type="text" name="identity" value="" id="identity" class="form-control" placeholder="Email или Имя профиля" required autofocus>
			<label for="inputPassword" class="sr-only">Пароль</label>
			<input type="password" name="password" id="password" class="form-control" value="" placeholder="Пароль" required>
			<div class="checkbox">
			  <label style="color: #e5474b">
				<input type="checkbox" name="remember" value="1" id="remember"> Запомнить меня
			  </label>
			</div>
			<button class="btn btn-lg btn-primary btn-block btn-success" type="submit">Войти</button>
		</fieldset>
      <?php echo form_close();?>

</div>

</body>

</html>