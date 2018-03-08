<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Automation Post</title>
	
	<!--PRELOAD LINKS-->
	<link href="/assets/css/introLoader.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="/assets/js/helpers/jquery.easing.1.3.js"></script>
    <script src="/assets/js/helpers/spin.min.js"></script>
    <script src="/assets/js/jquery.introLoader.min.js"></script>
	<!--/PRELOAD LINKS-->

	<link href="/assets/fonts/firasans/firasans.css" rel= "stylesheet" type= "text/css">
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
	<link href="/assets/css/page_hover.css" rel="stylesheet">
	<!--/Здесь подключаю стили-->

  </head>

  <body>
  
  <div id="element" class="introLoading"></div>
	<script>
		$("#element").introLoader({

			animation: {
				name: 'simpleLoader',
				options: {
					exitFx:'fadeOut',
					ease: "linear",
					style: 'white',
					delayBefore: 500, 
					exitTime: 300
				}
			},    

			spinJs: {}
			
		});
	</script>

	<!--Подключение навбара с разделами-->
    <?php include('include/navbar.php') ?>

	<!-- Модальные окна -->
	<div class="modal fade" tabindex="-1" role="form" aria-labelledby="myModalLabel" id="account">
		<?php include('include/userLogin.php') ?>
	</div>

	<div class="modal fade" id="Регистрация" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <?php include('include/register.php') ?>
	</div>

	<!-- /Модальные окна -->

    
        <div class="col-xs-8 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
		  <h3>Панелька</h3>
            <a href="#"><h4>Оборудование <span class="badge">+10</span></h4></a></br>
            <a href="#"><h4>Гаджеты <span class="badge">+3</span></h4></a></br>
            <a href="#"><h4>Аксессуары <span class="badge">+5</span></h4></a></br>
            <a href="#"><h4>Еще <span class="badge">+15</span></h4></a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

    </div><!--/.container-->


	<div class="container">
	<h3>Лучшее</h3>
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <div class="row">

          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

      </div><!--/row-->

    </div><!--/.container-->


	<div class="container">
	<h3>Популярные</h3>
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <div class="row">

          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->


      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; 2016 Automation Post.</p>
		<p><a href="#"><i class="fa fa-vk fa-2x" aria-hidden="true"></i></a></p>
		<p><a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a></p>
		<p><a href="https://twitter.com/__Limosha__"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></p>
      </footer>

    </div><!--/.container-->

	<!--Здесь подключаю скрипты-->
	
    <script src="/assets/js/bootstrap.min.js"></script>
    <!--<script src="/assets/js/script.js"></script>-->
    <script src="/assets/js/offcanvas.js"></script>
  	<script src="/assets/js/godown.js"></script>
	<script src="/assets/js/likes.js"></script>
  	<script src="/assets/js/page_hover.js"></script>
    <!--<script src="/assets/js/ajax.js"></script>-->
  </body>
</html>
