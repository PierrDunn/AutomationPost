<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Добавить статью</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/application/views/adm/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/application/views/adm/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="/application/views/adm/assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/application/views/adm/assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="/application/views/adm/assets/css/themify-icons.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<!--Download font for article-->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	
	<!-- Preload -->
	<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #fff url(/application/views/adm/assets/img/animal.gif)center center no-repeat;background-size:194px;}</style>
	<div id="hellopreloader"><div id="hellopreloader_preload"></div></div>
	<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1000);};</script>
	<!-- /Preload -->
	
</head>
<body>

<div class="wrapper">
	
	<div class="wrapper">
    <?php include('adm_includes/sidebar.php');?>

    <div class="main-panel">
        
		<?php include('adm_includes/navbar.php');?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
						
						<div class="card card-plain">
								<div class="header">
									<h4 class="title">Основные настройки</h4>
									<p class="category">Здесь производится редактирование самой статьи</p>
								</div>
						</div>	
						
                        <div class="card">
                        		
                            <div class="content">
								
								<!-- Общие стили для статьи-->
								<style>
									/*Image style*/
									.image.fit{
										width: 100%;
										vertical-align: middle;
										border-radius: 0;
										display: block;
										margin: 0;
										padding: 0;
										border: 0;
										font-size: 100%;
										font: inherit;
										vertical-align: baseline;
									}
									
									/*Dropzone*/
									.dropzone {
										background: #bcbcbb;
										height: 200px;
										margin: 0 10px;
										position: relative;
										width: auto;
									}
									div#dropzone{
										height: 25em;
										width: 100%;
										border-radius: 0;
										display: block;
										vertical-align: middle;
										margin: 0;
										padding: 0;
										font-size: 100%;
										font: inherit;
										vertical-align: baseline;
										text-align: center;
										background: url(http://guander.ru/imag/4/kot_korobka_risunok_minimalizm_2560x1600.jpg);
										background-size: cover;
										background-repeat: no-repeat;
										background-position: center;
									}
									
									
									/*Section style(body of article)*/
									.inner {
										max-width: 65em;
										width: calc(100% - 6em);
										margin: 0 auto;
									}
									.inner{
										font-family: "Lato", sans-serif !important;
										font-size: 15pt;
										font-weight: 300;
										line-height: 2;
										
										padding: 0;
										border: 0;
										font-size: 100%;
										font: inherit;
										vertical-align: baseline;
									}
									
									/*P and UL Style*/
									.ar-text > p, .ar-list>p, .ar-list>ul, .image.fit, #dropzone, .simple>div{
										background: rgba(203, 197, 197, 0.24);
									}
									
									/*Margins for elements*/
									.ar{
										margin-top: 1em !important;	
										margin-bottom: 1em !important;	
									}
								</style>
								
								
								<div class="inner">
								
									<!-- Метсо редактируемой статьи-->
									<header class="major special" style="margin-bottom: 2em">
										<h1 id="ar-title" style="color: #e5474b"><?php if ($article == ''){echo 'Название статьи...'; } else { echo $article[0]['title']; } ?></h1>
										<h5 id="ar-author" style="color: #e5474b"><?php if ($article == ''){echo 'Автор:...'; } else { echo 'Автор:'.$article[0]['author']; } ?></h5>
										<div class="icons" style="font-size: 1.2em; color: #1c1c1c">
													<a id="up" style="color: #1c1c1c" onclick="like_up()">
														<i class="fa fa-chevron-up" aria-hidden="true" >
														</i>
													</a> 
													<span id ="value"> 0 </span>
													<a id="down" style="color: #1c1c1c" onclick="like_down()">
														<i class="fa fa-chevron-down" aria-hidden="true">
														</i>
													</a>&emsp;
														<i class="fa fa-eye" style="color: #1c1c1c" aria-hidden="true">
														</i> 0&emsp;
													<a style="color: #1c1c1c"><i class="fa fa-comments" aria-hidden="true"></i></a> 0
										</div>
									</header>
									
									<!-- Тег для области редактруемой статьи-->
									<div id="ar-edit">
										<?php 
											if ($article == '')
											{
												echo '<span class="ar ar-text">'
														.'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
													.'</span>'
													.'<span class="ar image fit"><img src="http://natureworld.ru/breeds_dog/dachshund_normal_03.jpg" alt=""></span>'
													.'<span class="ar ar-list">'
														.'<ul>'
															.'<li>Значение 1</li>'
															.'<li>Значение 2</li>'
															.'<li>Значение 3</li>'
														.'</ul>'
													.'</span>'; 
											} 
											else 
											{ 
												echo $article[0]['text']; 
											} 
										?>	
									</div>
								
								<!-- ////Метсо редактируемой статьи-->
								</div>
								<script src="/application/views/adm/assets/js/art-edit.js" type="text/javascript"></script>
								
							</div>
                        </div>
						
						<!-- Метсо дополнительного редактирвания-->
						<div class="card card-plain">
								<div class="header">
									<h4 class="title">Дополнительные настройки</h4>
									<p class="category">Здесь производится выбор категории для статьи, добавление картинки превью</p>
									<p class="category">* - необязательные пункты заполнения</p>
								</div>
						</div>	
						
                        <div class="card">
                            <div class="content">
								<span class="form-group">
								  <label for="sel1">Выбирете категорию:</label>
								  <select style="border: 1px solid #CCC5B9" class="form-control" id="choose_category">
									<?php foreach($category as $val){ ?>
									<option value="<?php echo $val['name']; ?>"><?php echo $val['id'].' - '.$val['ru_name']; ?></option>
									<?php } ?>
								  </select>
								</span>
								<span class="form-group">
								  <label for="sel1">Выбирете подкатегорию:</label>
								  <select style="border: 1px solid #CCC5B9" class="form-control" id="choose_subcategory">
									<?php foreach($subcategory as $val){ ?>
									<option value="<?php echo $val['name']; ?>"><?php echo $val['name_id'].' - '.$val['name_ru']; ?></option>
									<?php } ?>
								  </select>
								</span>
								<span class="form-group">
								  <label for="sel1">*Выбирете бренд:</label>
								  <select style="border: 1px solid #CCC5B9" class="form-control" id="choose_brand">
									<option value="">Нет</option>
									<?php foreach($brand as $val){ ?>
									<option value="<?php echo $val['id_name']; ?>"><?php echo $val['name']; ?></option>
									<?php } ?>
								  </select>
								</span>
								
								<div class="form-group">
								  <label for="comment">Введите краткое описание:</label>
								  <textarea style="border: 1px solid #CCC5B9" class="form-control" rows="5" id="ar-description"><?php if ($article == ''){echo ''; } else { echo $article[0]['description']; } ?></textarea>
								</div>
								
								<label for="comment">Загрузите превью:</label>
								<span class="ar image fit logo">
									<img id="ar-logo" data-width="1600" data-height="1600" src="<?php if ($article == ''){echo 'http://natureworld.ru/breeds_dog/dachshund_normal_03.jpg'; } else { echo $article[0]['logo']; } ?>" alt="">
								</span>
								
								<hr>
								<a id="<?php if ($article == ''){echo 'add_to_base'; } else { echo 'upload_to_base'; } ?>" class="btn btn-round btn-fill btn-info">Сохранить</a>
							</div>
						</div>
						<!--///////Метсо дополнительного редактирвания-->
						
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
	<script src="/application/views/adm/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="/application/views/adm/assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="/application/views/adm/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/application/views/adm/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="/application/views/adm/assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="/application/views/adm/assets/js/demo.js"></script>
	
	<!-- UploadImage Script -->
	<!-- <script src="/adm/static/dmuploader.min.js"></script>-->
	
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-hand-point-right',
            	message: "Чтобы редактировать элементы,<br>нужно просто по ним кликнуть!"

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

</html>
