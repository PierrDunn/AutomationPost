<!DOCTYPE HTML>
<html>
	<head>
		<title>Automation Post</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="yandex-verification" content="82fd1562172f19e4" />
		<link rel="shortcut icon" href="/assets/img/favicon.png" type="image/png"/>
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css" />
		
		<!-- Free-wall scripts -->
		<link rel="stylesheet" href="/assets/css/style.css" />
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/freewall.js"></script>
		
		<!-- Для слайдера -->
		<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
		<link rel="stylesheet" href="/assets/css/modernslider.css">
		
	</head>
	<body>
		<style>
			@keyframes start {
				from {
					transform: scale(0);
				}
				to {
					transform: scale(1);
				}
			}


			@-webkit-keyframes start {
				from {
					-webkit-transform: scale(0);
				}
				to {
					-webkit-transform: scale(1);
				}
			}

			.free-wall .cell[data-state="init"] {
				display: none;
			}

			.free-wall .cell[data-state="start"]  {
				display: block;
				animation: start 0.5s;
				-webkit-animation: start 0.5s;
			}

			.free-wall .cell[data-state="move"]  {
				transition: top 0.5s, left 0.5s, width 0.5s, height 0.5s;
				-webkit-transition: top 0.5s, left 0.5s, width 0.5s, height 0.5s;
			}
		</style>
		
		<!-- Header -->
		
			<?php include ("include/nav.php"); ?>	
		
		
		<!-- Banner -->
			<!-- Carousel -->
			  <div class="Modern-Slider">
			  <!-- Item -->
			  <?php for($i=0; $i<3; $i++){?>
			  <div class="item">
				<div class="img-fill">
				  <img src="<?php echo $articles[$i]['logo'];?>" alt="">
				  <div class="info">
					<div>
					  <a style="text-decoration: none" href="http://automationpost.ru/startpage/articles/<?php echo $articles[$i]['id'];?>">
					  <h2 style="color: white"><?php echo $articles[$i]['title'];?></h2>
					  <h5><?php echo $articles[$i]['description'];?></h5>
					  </a>
					</div>
				  </div>
				</div>
			  </div>
			  <?php };?>
			  <!-- // Item -->
			</div>
			<!-- /Carousel -->
		<!-- /Banner -->
		
		
		<!-- Modal Windows -->

			<?php include ("include/modal.php"); ?>
		
		
		<!-- One -->
			<section id="one">
			<div class="container">
				<div id="freewall" class="free-wall">
	
					<div class="brick size21 add-more" data-position="2-0">
						<div class='cover'>
							<h2>+Еще</h2>
							<p>Добавить еще новость</p>
						</div>
					</div>
				
					<div class="brick size22" data-position="0-0" style="color: #e5474b">
						<div class='cover'>
							<h3>Смотреть</h3></br>
							<ul class="alt">
								<li id="last" style="cursor: pointer; 	padding-top: 7px"><h5>Из последнего</h5></li>
								<li id="popular" style="cursor: pointer"><h5>Популярные</h5></li>
								<li id="discussing" style="cursor: pointer"><h5>Обсуждаемые</h5></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
				<script type="text/javascript">


					$(".brick").each(function() {
						this.style.backgroundColor =  '#f3f3f3';
					});

					$(function() {
						var wall = new Freewall("#freewall");
						wall.reset({
							selector: '.brick',
							animate: true,
							cellW: 160,
							cellH: 160,
							delay: 50,
							onResize: function() {
								wall.fitWidth();
							}
						});
						wall.fitWidth();
						
						var temp = '<span id="timmerbrick">'
									+'<div class="brick {size} cell" style="background-image: url({picture})">'
										+'<div style="background-color:rgba(28, 28, 28, 0.6); width: 100%; height: 100%; margin-top: 0px;">'
										+'<div class="cover" style="margin: 0px; padding: 20px">'
											+'<h2>{title}</h2>'
											+'<p>{description}</p>'
										+'</div>'
										
										+'<div class="read-more">'
											+'<a style="text-decoration: none" href="http://automationpost.ru/startpage/articles/{id}">'
												+'<h5 style="color: white">Читать далее...</h5>'
												+'<div class="icons">'
													+'<i class="fa fa-chevron-up" aria-hidden="true"></i> {likes} <i class="fa fa-chevron-down" aria-hidden="true"></i>&emsp;'
													+'<i class="fa fa-eye" aria-hidden="true"></i> {views}&emsp;'
													+'<i class="fa fa-comments" aria-hidden="true"></i> {comments}'
												+'</div>'
											+'</a>'
										+'</div>'
									+'</div>'
									+'</div>'
									+'</span>';
						
						var all_art; //число статей которые можно вывести на главную страницу
						var inc = 7; //инкриментируется по созданию каждой статьи
						//переменная выборки просмотра статей (по-умолчанию последние)
						var watching = 'http://automationpost.ru/startpage/some_articles/last_articles';
							
							function watching_function(){
								$.ajax({
									type: 'POST',
									url: watching,
									data: {flag: 1},
									success:function watching_add(data){
										$("*#timmerbrick").remove();
										var id = [];
										var title = [];
										var description = [];
										var views = [];
										var likes = [];
										var comments = [];
										var picture = [];
										var size = ['size23', 'size32', 'size21'];
										var dt = JSON.parse(data);
										for(var i=0; i<7; i++){
											id[i] = dt[i].id;
											title[i] = dt[i].title;
											description[i] = dt[i].description;
											views[i] = dt[i].views;
											likes[i] = dt[i].likes;
											comments[i] = dt[i].comments;
											picture[i] = dt[i].logo;
											var	html = temp.replace('{size}', size[i])
													.replace('{id}', id[i])
													.replace('{title}', title[i])
													.replace('{description}', description[i])
													.replace('{views}', views[i])
													.replace('{likes}', likes[i])
													.replace('{comments}', comments[i])
													.replace('{picture}', picture[i]);
											wall.prepend(html);
											setTimeout(resizable, 300)
										}
									}
								});
							};
							watching_function(); //выполнение при загрузке страницы

						$("#last").click(function(){
							watching = 'http://automationpost.ru/startpage/some_articles/last_articles';
							inc = 4;
							watching_function();
						});
						$("#popular").click(function(){
							watching = 'http://automationpost.ru/startpage/some_articles/popular_articles';
							inc = 4;
							watching_function();
						});
						$("#discussing").click(function(){
							watching = 'http://automationpost.ru/startpage/some_articles/discussing_articles';
							inc = 4;
							watching_function();
						});
						
						$(".add-more").click(function() {
							$.ajax({
									type: 'POST',
									url: watching,
									data: {flag: 1},
									success:function add (data){
										
										var id = [];
										var title = [];
										var description = [];
										var views = [];
										var likes = [];
										var comments = [];
										var picture = [];
										var picwidth = [];
										var picheight = [];
										var dt = JSON.parse(data);
										for(var i=0; i<dt.length; i++){
											all_art = i;
											id[i] = dt[i].id;
											title[i] = dt[i].title;
											description[i] = dt[i].description;
											views[i] = dt[i].views;
											likes[i] = dt[i].likes;
											comments[i] = dt[i].comments;
											picture[i] = dt[i].logo;
											picwidth[i] = dt[i].width + " ";
											picheight[i] = dt[i].height + " ";
											
										}
										
										if(inc<=all_art){
											//выражение с самовыполняющейся анонимной функцией для расчёта размера
											var	html = temp.replace('{size}', (function(width, height){var size = 'size'; if(width<=666){size += 1} else if(width>666 && width<=1332){size += 2} else if(width>1332 && width<=2000){size += 3}; if(height<=666){size += 1} else if(height>666 && height<=1332){size += 2} else if(height>1332 && height<=2000){size += 3}; return size;})(picwidth[inc], picheight[inc]))
													.replace('{id}', id[inc])
													.replace('{title}', title[inc])
													.replace('{description}', description[inc])
													.replace('{views}', views[inc])
													.replace('{likes}', likes[inc])
													.replace('{comments}', comments[inc])
													.replace('{picture}', picture[inc]);
											
											inc += 1;
											wall.prepend(html);
											setTimeout(resizable, 500)
										}
									}

							});
						});
						
						//функция для преобразования заголовка и описания в зависимости от размера блока
						function resizable(){
							
							
							var arr = $('span#timmerbrick>div.brick').toArray();
							$(arr).each(function(){
								//console.info('h2: ' + $(this).find('h2').text());
								//console.info('p: ' + $(this).find('p').text());
								
								if(parseFloat($(this).width()) < 300){
									
									if($(this).find('h2').text().length > 20){
										$(this).find('h2').css({'font-size': '15px'});
									}else{
										$(this).find('h2').css({'font-size': '30px'});
									};
									
									$(this).find('h2').css({'font-size': '16px'});
								} 
								else{
									$(this).find('h2').css({'font-size': '30px'});
								};
								
								if(parseFloat(this.style.height) < 200){
									
									if($(this).find('h2').text().length > 20){
										$(this).find('h2').css({'font-size': '20px'});
									}else{
										$(this).find('h2').css({'font-size': '30px'});
									};
									
									$(this).find('p').css({'display': 'none'})
								} 
								else{
									$(this).find('p').css({'display': 'block'})
								};
								
								/*
								if(parseFloat(this.style.height) < 200 && parseFloat($(this).width()) < 300 && $(this).find('h2').text().length > 25){
									$(this).find('h2').css({'font-size': '16px'});
									$(this).find('p').css({'display': 'none'})
								}else{
									$(this).find('h2').css({'font-size': '30px'});
									$(this).find('p').css({'display': 'block'})
								};
								*/
							});
	
						};
						$(window).on('add watching_add', function(){
							console.info('its running!');
						});
						$(window).resize(function(){
							setTimeout(resizable, 500)
						});
						
					});
										
				</script>
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
			<script src="/assets/js/main.js"></script>
			<script src="/assets/js/bootstrap.min.js"></script>
		
		<!-- Для слайдера -->
			<script src='http://kenwheeler.github.io/slick/slick/slick.js'></script>
			<script src="/assets/js/modernslider.js"></script>
		
		<!-- Для подписки -->
			<!-- <script src="/assets/js/bottom_message.js"></script> -->

	</body>
</html>