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
		
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?142"></script>
		<script type="text/javascript">
			VK.init({apiId: 5922287});
		</script>
	</head>
	<body>

		<!-- Header -->
		
			<?php include ("include/nav.php"); ?>	
		
		<!-- Modal Windows -->

			<?php include ("include/modal.php"); ?>

		<!-- Main -->
			<section id="main" style="min-height:56.4em">
				<div class="inner">
					<header class="major special" style="margin-bottom: 2em">
						<h1 style="color: #e5474b">Вк-оповещалка</h1>
						<h5 style="color: #e5474b">Оповещает о новостях, чтобы скучно не было.</h5>
					</header>
					Привет, я те писать в вк буду!
					<div id="vk_auth"></div>
					<script type="text/javascript">
					VK.Widgets.Auth("vk_auth", {onAuth:function(data){ console.log(data); }});
					</script>
				</div>
			</section>
			
		<!-- Footer -->
	
			<section id="footer">
				<div class="inner">
				
					<br><p>© Automation Post. Copyright 2016. Все права защищены.</p>
					
				</div>
			</section>

		<!-- Scripts -->
			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/skel.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>
			<script src="/assets/js/bootstrap.min.js"></script>

	</body>
</html>