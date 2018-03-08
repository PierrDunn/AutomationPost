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
					<h2 id="category-name"><?php echo $subcategory[0]['name_ru']?></h2>
					<hr style="border-bottom-color: #e5474b; border: 0; border-bottom: solid 1px;">
				</div>
			
				<div id="freewall" class="free-wall">
	
				<?php foreach($articles as $val){ ?>
					<div class="brick size22 cell" style="background-image: url(<?php echo $val['logo']?>)">
						<div style="background-color:rgba(28, 28, 28, 0.6); width: 100%; height: 100%; margin-top: 0px;">
							<div class="cover" style="margin: 0px; padding: 20px">
								<h2><?php echo $val['title']?></h2>
								<p><?php echo $val['description']?></p>
							</div>
										
							<div class="read-more">
								<a style="text-decoration: none" href="http://automationpost.ru/startpage/articles/<?php echo $val['id']?>">
									<h5 style="color: white">Читать далее...</h5>
									<div class="icons">
										<i class="fa fa-chevron-up" aria-hidden="true"></i> <?php echo $val['likes']?> <i class="fa fa-chevron-down" aria-hidden="true"></i>&emsp;
										<i class="fa fa-eye" aria-hidden="true"></i> <?php echo $val['views']?>&emsp;
										<i class="fa fa-comments" aria-hidden="true"></i> <?php echo $val['comments']?>
									</div>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
					
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