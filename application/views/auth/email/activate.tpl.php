<html>
<body>
	<h1><?php echo sprintf(lang('email_activate_heading'), $identity);?></h1>
	<p><?php echo "Пожалуйста, нажмите ", anchor('auth/activate/'. $id .'/'. $activation, "сюда,"), " чтобы активировать свой аккаунт";?></p>
</body>
</html>