<!DOCTYPE HTML>
<html>
	<head>
		<title>Automation Post</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" href="/assets/img/favicon.png" type="image/png"/>
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css" />
		
		<!-- Free-wall scripts -->
		<link rel="stylesheet" href="/assets/css/style.css" />
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/freewall.js"></script>
		
	</head>
	<body>
		
		<!-- Header -->
		
			<?php include ("include/nav.php"); ?>	
		
    	<!-- Modal Windows -->

		<?php include ("include/modal.php"); ?>
		
		
	<!-- One -->
		<section id="one">
			<div class="container">
				<div style="text-align: center; color:#e5474b">
					<h3>Редактирование</h3>
					<hr style="border-bottom-color: #e5474b; border: 0; border-bottom: solid 1px;">
				</div>
				<form action="http://automationpost.ru/startpage/edit_users_reciever" method="post" enctype="multipart/form-data">
					<div class="form-group" >
						<label>Изменить имя</label>
						<input type="hidden" class="form-control" name="id" value="<?php echo trim($profile->id); ?>">
						<input type="text" name="first_name" value="<?php echo trim($profile->first_name); ?>">
					</div><br>
					<div class="form-group">
						<label>Изменить фотографию профиля</label>
						<input type="file" name="avatar">
					</div><br>
					<div class="form-group">
						<a class="button" href="http://automationpost.ru/auth/change_password">Изменить пароль</a>
					</div><br>
					<button type="submit" name="download" class="button">Сохранить изменения</button>
				</form>
				
			</div>
		</section>
		
		<!-- Two -->
		<section id="two">
				<div class="inner">
					<article>
						<div class="content">
							<header>
								<h3>Связаться<br>с нами</h3>
							</header>
							<p>Вы можете нам написать, чтобы предложить свой материал для размещения на этом сайте.</p>
							<ul class="icons" style="text-align: left">
								<li><a href="#" class="icon fa-envelope" data-toggle="modal" data-target="#Send_msg" style="color: #e5474b; text-decoration: none"><span style="font-size: 1.2em"> automationpost76@gmail.com</span></a></li>
							</ul>
						</div>
					</article>
					<article class="alt">
						<div class="content">
							<header>
								<h3>Расскажите о нас своим друзьям</h3>
							</header>
							<p>Поделитесь о нас ссылкой в соцальных сетях. Тем самым вы внесёте неоценнимый вклад в развитие нашего портала.</p>
							<ul class="icons">
								<div class="share42init"></div>
								<script type="text/javascript" src="/assets/share42/share42.js"></script>
							</ul>
						</div>
					</article>
				</div>
			</section>
			
		<!-- Footer -->
			<section id="footer">
				<div class="inner">
					<p>© Automation Post. Copyright 2016. Все права защищены.</p>
				</div>
			</section>

		<!-- Scripts -->

			<script src="/assets/js/skel.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>
			<script src="/assets/js/bootstrap.min.js"></script>

	</body>
</html>
<script type="text/javascript">


</script>
