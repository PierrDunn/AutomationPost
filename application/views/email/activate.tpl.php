<html>
<body>
	<h1><?php echo sprintf(lang('email_activate_heading'));?></h1>
	<p><?php echo 'Пожалуйста, нажмите '.anchor('auth/activate/'. $id .'/'. $activation, 'сюда').', что бы активировать аккаунт.' ?></p>
</body>
</html>