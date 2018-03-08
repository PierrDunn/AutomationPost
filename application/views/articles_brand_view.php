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
		
		
		
		
		<!-- Modal Windows -->

			<?php include ("include/modal.php"); ?>
		
		
		<!-- One -->
			<section id="one"   style="min-height:56.4em">
			<div class="container">
				
				<div style="text-align: center; color:#e5474b">
					<h2 id="category-name"></h2>
					<hr style="border-bottom-color: #e5474b; border: 0; border-bottom: solid 1px;">
				</div>
			
				<div id="freewall" class="free-wall">
	
					<div class="brick size31 add-more" data-position="2-0">
						<div class='cover'>
							<h2>+Еще</h2>
							<p>Добавить еще новость</p>
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
									+'<div class="brick {size} cell" style="background-image: url(/{picture})">'
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
						var inc = 3; //инкриментируется по созданию каждой статьи
						//переменная выборки просмотра статей (по-умолчанию последние)
						
						
							function watching_function(){
								$.ajax({
									type: 'POST',
									url: (function(){ a = window.location.href.split('/'); return 'http://automationpost.ru/brand_view/'+a[4]+'/'+a[5];})(),
									data: {flag: 1},
									success:function watching_add(data){
										$('#category-name').append('Статьи из категории');
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
										for(var i=0; i<3; i++){
											id[i] = dt[i].id;
											title[i] = dt[i].title;
											description[i] = dt[i].description;
											views[i] = dt[i].views;
											likes[i] = dt[i].likes;
											comments[i] = dt[i].comments;
											picture[i] = dt[i].logo;
											picwidth[i] = dt[i].width + " ";
											picheight[i] = dt[i].height + " ";
											var	html = temp.replace('{size}', (function(width, height){var size = 'size'; if(width<=666){size += 1} else if(width>666 && width<=1332){size += 2} else if(width>1332 && width<=2000){size += 3}; if(height<=666){size += 1} else if(height>666 && height<=1332){size += 2} else if(height>1332 && height<=2000){size += 3}; return size;})(picwidth[inc], picheight[inc]))
													.replace('{id}', id[i])
													.replace('{title}', title[i])
													.replace('{description}', description[i])
													.replace('{views}', views[i])
													.replace('{likes}', likes[i])
													.replace('{comments}', comments[i])
													.replace('{picture}', picture[i]);
											wall.prepend(html);
										}
									}
								});
							};
							watching_function(); //выполнение при загрузке страницы
						
						
						$(".add-more").click(function() {
							$.ajax({
									type: 'POST',
									url: (function(){ a = window.location.href.split('/'); return 'http://automationpost.ru/brand_view/'+a[4]+'/'+a[5];})(),
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
										}
									}

							});
						});
					});
										
				</script>
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

	</body>
</html>