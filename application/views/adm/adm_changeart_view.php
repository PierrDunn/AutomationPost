<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Статьи и премод.</title>

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
                                <h4 class="title">Выводимые статьи</h4>
                                <p class="category">Здесь выводятся все статьи, которые прошли премодерацию</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Название</th>
										<th>Автор</th>
										<th>Описание</th>
										<th>Инф.</th>
                                    	<th>Дата публикации</th>
                                    	<th>На премод.</th>
                                    	<th>Изменить</th>
                                    	<th>Удалить</th>
                                    </thead>
                                    <tbody>
										<?php foreach($mod as $val){?>
                                        <tr>
                                        	<td id="id" ><?php echo $val['id']; ?></td>
                                        	<td><?php echo $val['title']; ?></td>
                                        	<td><?php echo $val['author']; ?></td>
                                        	<td><?php echo $val['description']; ?></td>
                                        	<td>
												<span style="font-weight: bold">Категория:</span> <?php echo $val['category']; ?>
												<br><span style="font-weight: bold">Подкатегория:</span> <?php echo $val['sub_category']; ?>
												<br><span style="font-weight: bold">Бренд:</span> <?php echo $val['brand']; ?>
												<br><span style="font-weight: bold">Просмотры:</span> <?php echo $val['views']; ?>
												<br><span style="font-weight: bold">Лайки:</span> <?php echo $val['likes']; ?>
												<br><span style="font-weight: bold">Комментарии:</span> <?php echo $val['comments']; ?>
											</td>
                                        	<td><?php echo $val['date']; ?></td>
                                        	<td><button  id="article_on_mod" class="btn btn-default " ><i class="fa ti-thumb-down fa-1x"></i></button></td>
                                        	<td><a href="article_edit/<?php echo $val['id']; ?>" id="article_edit" class="btn btn-default " ><i class="fa fa-pencil fa-1x"></i></a></td>
                                        	<td><button  id="article_remove" class="btn btn-default " ><i class="fa fa-trash fa-1x"></i></button></td>
                                        </tr>
										<?php }?>
                                    </tbody>
                                </table>
                            </div>
							
							<div class="header">
                                <h4 class="title">Статьи для премодерации</h4>
                                <p class="category">Здесь выводятся все статьи, которые ждут своей премодерации</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Название</th>
										<th>Автор</th>
										<th>Описание</th>
										<th>Инф.</th>
                                    	<th>Дата публикации</th>
                                    	<th>Одобрить</th>
                                    	<th>Чё не так?</th>
                                    	<th>Изменить</th>
                                    	<th>Удалить</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($premod as $val){?>
                                        <tr>
                                        	<td id="id" ><?php echo $val['id']; ?></td>
                                        	<td><?php echo $val['title']; ?></td>
                                        	<td><?php echo $val['author']; ?></td>
                                        	<td><?php echo $val['description']; ?></td>
                                        	<td>
												<span style="font-weight: bold">Категория:</span> <?php echo $val['category']; ?>
												<br><span style="font-weight: bold">Подкатегория:</span> <?php echo $val['sub_category']; ?>
												<br><span style="font-weight: bold">Бренд:</span> <?php echo $val['brand']; ?>
												<br><span style="font-weight: bold">Просмотры:</span> <?php echo $val['views']; ?>
												<br><span style="font-weight: bold">Лайки:</span> <?php echo $val['likes']; ?>
												<br><span style="font-weight: bold">Комментарии:</span> <?php echo $val['comments']; ?>
											</td>
                                        	<td><?php echo $val['date']; ?></td>
                                        	<td><button id="article_off_mod" class="btn btn-default " ><i class="fa ti-thumb-up fa-1x"></i></button></td>
                                        	<td><button id="wtf_button" data-toggle="modal" data-target="#wtf" class="btn btn-default " ><i class="fa ti-help fa-1x"></i></button></td>
                                        	<td><a href="article_edit/<?php echo $val['id']; ?>" id="article_edit" class="btn btn-default " ><i class="fa fa-pencil fa-1x"></i></a></td>
                                        	<td><button id="article_remove"class="btn btn-default " ><i class="fa fa-trash fa-1x"></i></button></td>
                                        </tr>
										<?php }?>
                                    </tbody>
                                </table>
                            </div>
							
                        </div>
                    </div>
					<script>
						$('body').on('click', '#article_on_mod', function(){
							var str = $(this).parent().parent().find('#id').html();
							$.ajax({
								type: 'POST',
								url: '/adm/article_on_mod',
								data: {id: str},
								success:function(){
									demo.initChartist();
									$.notify({
										icon: 'ti-hand-point-right',
										message: "Статья id: " + str + " внесена в список премодерирования!"
									},{
										type: 'success',
										timer: 1
									});
								}
							});	
						});
						
						$('body').on('click', '#article_off_mod', function(){
							var str = $(this).parent().parent().find('#id').html();
							$.ajax({
								type: 'POST',
								url: '/adm/article_off_mod',
								data: {id: str},
								success:function(){
									demo.initChartist();
									$.notify({
										icon: 'ti-hand-point-right',
										message: "Статья id: " + str + " вынесена из списока премодерирования!"
									},{
										type: 'success',
										timer: 1
									});
								}
							});	
						});
						
						$('body').on('click', '#article_remove', function(){
							var str = $(this).parent().parent().find('#id').html();
							a = confirm("Вы точно хотите удалить статью id: " + str + " ?");
							if(a){
								$.ajax({
									type: 'POST',
									url: '/adm/article_remove',
									data: {id: str},
									success:function(){
										demo.initChartist();
										$.notify({
											icon: 'ti-hand-point-right',
											message: "Статья id: " + str + " успешно удалена!"
										},{
											type: 'success',
											timer: 1
										});
									}
								});
							}
						});	
					</script>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- WTF Model -->
<div class="modal fade" id="wtf" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Что не так?</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
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


</html>
