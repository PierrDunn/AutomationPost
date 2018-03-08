<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Категор. и Подкат.</title>

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
									<h4 class="title">Добавить категорию или подкатегорию</h4>
									<p class="category">Здесь производится добавление категорий и подкатегорий</p>
								</div>
						</div>	
						
                        <div class="card">
                            <div class="content">
								<div class="content">
								
								<h4>Категории</h4>
								<hr>
                                
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Название категории</label>
                                                <input id="category_ru_name" type="text" class="form-control border-input" placeholder="ru_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Транскрибция</label>
                                                <input id="category_name" type="text" class="form-control border-input" placeholder="name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button id="add_category" class="btn btn-info btn-fill btn-wd">Добавить категорию</button>
                                    </div>
                                    <div class="clearfix"></div>
                                
								
								<h4>Подкатегории</h4>
								<hr>
								
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Название подкатегории</label>
                                                <input id="subcategory_name_ru" type="text" class="form-control border-input" placeholder="name_ru">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Транскрибция</label>
                                                <input id="subcategory_name" type="text" class="form-control border-input" placeholder="name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Связать с категрией</label>
                                                <select style="border: 1px solid #CCC5B9" class="form-control" name="my_select" id="subcategory_select">
													<option value="defualt">Выберите категорию</option>
													<?php foreach($category as $val){?>
													<option id="subcategory_name_id" value="<?php echo $val['id']; ?>"><?php echo $val['ru_name']; ?></option>
													<?php }?>
												</select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button id="add_subcategory" class="btn btn-info btn-fill btn-wd">Добавить подкатегорию</button>
                                    </div>
                                    <div class="clearfix"></div>
                                
                            </div>
							</div>
						</div>
						<script>
							$('#add_category').click(function(){
								
								if($('#category_ru_name').val() && $('#category_name').val()){
									$.ajax({
									type: 'POST',
									url: '/adm/add_category',
									data: {name: $('#category_name').val(), ru_name: $('#category_ru_name').val()},
									success:function(){
										demo.initChartist();
										$.notify({
											icon: 'ti-hand-point-right',
											message: "Категория добавлена!"
										},{
											type: 'success',
											timer: 1
										});
										alert("Категория добавлена!");
										location.reload();
									}
									});
								}else{
									demo.initChartist();
									$.notify({
										icon: 'ti-hand-point-right',
										message: "Поля для добавления<br>категории не должны быть пустыми!"
									},{
										type: 'warning',
										timer: 1
									});
								};
								
							});
							$('#add_subcategory').click(function(){
								
								if($('#subcategory_name_ru').val() && $('#subcategory_name').val() && $('#subcategory_select').val() != 'defualt'){
									$.ajax({
									type: 'POST',
									url: '/adm/add_subcategory',
									data: {name_id: $('#subcategory_select').val(),name: $('#subcategory_name').val(), name_ru: $('#subcategory_name_ru').val()},
									success:function(){
										demo.initChartist();
										$.notify({
											icon: 'ti-hand-point-right',
											message: "Подкатегория добавлена!"
										},{
											type: 'success',
											timer: 1
										});
										alert("Подкатегория добавлена!");
										location.reload();
									}
									});
								}else{
									demo.initChartist();
									$.notify({
										icon: 'ti-hand-point-right',
										message: "Поля для добавления<br>подкатегории не должны быть пустыми!"
									},{
										type: 'warning',
										timer: 1
									});
								};
								
							});
						</script>
					
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Таблица категорий</h4>
                                <p class="category">Здесь выводятся все категории, которые есть в базе данных</p>
                            </div>
                            <div class="content table-responsive table-full-width">
							
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Название</th>
                                    	<th>Транскрибция</th>
                                    	<th>Изменить</th>
                                    	<th>Удалить</th>
                                    </thead>
                                    <tbody>
										<?php foreach($category as $val){?>
                                        <tr>
                                        	<td id="id"><?php echo $val['id'];?></td>
                                        	<td id="ru_name"><?php echo $val['ru_name'];?></td>
                                        	<td id="name"><?php echo $val['name'];?></td>
                                        	<td id="button_1"><button id="change_category" class="btn btn-default" ><i class="fa fa-pencil fa-1x"></i></button></td>
                                        	<td id="button_2"><button id="remove_category" class="btn btn-default" ><i class="fa fa-trash fa-1x"></i></button></td>
                                        </tr>
										<?php }?>
                                    </tbody>
                                </table>
								<script>
									var i = 0;
									var last = {};
									$('body').on('click', '#change_category', function(){
										
										var str = $(this).parent().parent();
										function change(){
											if(i == 0){
												i++;
												last.ru_name = str.find('#ru_name').text();
												last.name = str.find('#name').text();
												str.find('#ru_name').html('<input id="ru_name" type="text" class="form-control border-input" value="'+ str.find('#ru_name').text() +'">');
												str.find('#name').html('<input id="name" type="text" class="form-control border-input" value="'+ str.find('#name').text() +'">');
												str.find('#button_1').html('<button id="ok_category" class="btn btn-default " ><i class="fa ti-check fa-1x"></i></button>');
												str.find('#button_2').html('<button id="cancel_category" class="btn btn-default " ><i class="fa ti-close fa-1x"></i></button>');
											}else{
												demo.initChartist();
												$.notify({
													icon: 'ti-hand-point-right',
													message: "Один из элементов уже редактируется!"
												},{
													type: 'warning',
													timer: 1
												});
											}
										};
										change();
										
										$('#ok_category').click(function(){
											a = confirm("Вы точно хотите изменить?");
											if(i == 1 && a){
												i--;
												$.ajax({
													type: 'POST',
													url: '/adm/update_category',
													data: {id: str.find('#id').text(), name: str.find('input#name').val(), ru_name: str.find('input#ru_name').val()},
													success:function(){
														demo.initChartist();
														$.notify({
															icon: 'ti-hand-point-right',
															message: "Категория изменена!"
														},{
															type: 'success',
															timer: 1
														});
														alert("Категория изменена!");
														location.reload();
													}
												});
												str.find('td#ru_name').html(str.find('input#ru_name').val());
												str.find('td#name').html(str.find('input#name').val());
												str.find('#button_1').html('<button id="change_category" class="btn btn-default" ><i class="fa fa-pencil fa-1x"></i></button>');
												str.find('#button_2').html('<button id="remove_category" class="btn btn-default" ><i class="fa fa-trash fa-1x"></i></button>');
											}else{
												demo.initChartist();
												$.notify({
													icon: 'ti-hand-point-right',
													message: "Один из элементов уже редактируется!"
												},{
													type: 'warning',
													timer: 1
												});
											}
										});
										
										$('#cancel_category').click(function(){
											if(i == 1){
												i--;
												str.find('td#ru_name').html(last.ru_name);
												str.find('td#name').html(last.name);
												str.find('#button_1').html('<button id="change_category" class="btn btn-default" ><i class="fa fa-pencil fa-1x"></i></button>');
												str.find('#button_2').html('<button id="remove_category" class="btn btn-default" ><i class="fa fa-trash fa-1x"></i></button>');
											}else{
												demo.initChartist();
												$.notify({
													icon: 'ti-hand-point-right',
													message: "Один из элементов уже редактируется!"
												},{
													type: 'warning',
													timer: 1
												});
											}
										});
										
									});
									
									$('body').on('click', '#remove_category', function(){
										a = confirm("Вы точно хотите удалить?");
										if(a){
											var str = $(this).parent().parent();
											$.ajax({
												type: 'POST',
												url: '/adm/remove_category',
												data: {id: str.find('#id').text()},
												success:function(){
													demo.initChartist();
													$.notify({
														icon: 'ti-hand-point-right',
														message: "Категория удалена!"
													},{
														type: 'success',
														timer: 1
													});
													alert("Категория удалена!");
													location.reload();
												}
											});
										}
									});
								</script>
								
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Таблица подкатегорий</h4>
                                <p class="category">Здесь выводятся все подкатегории, которые есть в базе данных</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>ID</th>
										<th>ID категории</th>
                                    	<th>Название</th>
                                    	<th>Транскрибция</th>
                                    	<th>Изменить</th>
                                    	<th>Удалить</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($subcategory as $val){?>
                                        <tr>
                                        	<td id="id"><?php echo $val['id'];?></td>
                                        	<td id="name_id"><?php echo $val['name_id'];?></td>
                                        	<td id="name_ru"><?php echo $val['name_ru'];?></td>
                                        	<td id="name"><?php echo $val['name'];?></td>
                                        	<td id="button_1sub"><button id="change_subcategory" class="btn btn-default " ><i class="fa fa-pencil fa-1x"></i></button></td>
                                        	<td id="button_2sub"><button id="remove_subcategory" class="btn btn-default " ><i class="fa fa-trash fa-1x"></i></button></td>
                                        </tr>
										<?php }?>
                                    </tbody>
                                </table>
								<script>
									var inc = 0;
									var last_sub = {};
									$('body').on('click', '#change_subcategory', function(){
										
										var str = $(this).parent().parent();
										function change(){
											if(inc == 0){
												inc++;
												last_sub.name_id = str.find('#name_id').text();
												last_sub.name_ru = str.find('#name_ru').text();
												last_sub.name = str.find('#name').text();
												str.find('#name_id').html('<select style="border: 1px solid #CCC5B9" class="form-control" name="my_select" id="subcategory_select_table">'
																		  +$('#subcategory_select').html()
																		 +'</select>');
												str.find('#name_ru').html('<input id="name_ru" type="text" class="form-control border-input" value="'+ str.find('#name_ru').text() +'">');
												str.find('#name').html('<input id="name" type="text" class="form-control border-input" value="'+ str.find('#name').text() +'">');
												str.find('#button_1sub').html('<button id="ok_subcategory" class="btn btn-default " ><i class="fa ti-check fa-1x"></i></button>');
												str.find('#button_2sub').html('<button id="cancel_subcategory" class="btn btn-default " ><i class="fa ti-close fa-1x"></i></button>');
											}else{
												demo.initChartist();
												$.notify({
													icon: 'ti-hand-point-right',
													message: "Один из элементов уже редактируется!"
												},{
													type: 'warning',
													timer: 1
												});
											}
										};
										change();
										
										$('#ok_subcategory').click(function(){
											a = confirm("Вы точно хотите изменить?");
											if(inc == 1 && a && str.find('select#subcategory_select_table').val() != 'defualt'){
												inc--;
												
												$.ajax({
													type: 'POST',
													url: '/adm/update_subcategory',
													data: {id: str.find('#id').text(), name: str.find('input#name').val(), name_id: str.find('select#subcategory_select_table').val(), name_ru: str.find('input#name_ru').val()},
													success:function(){
														demo.initChartist();
														$.notify({
															icon: 'ti-hand-point-right',
															message: "Категория изменена!"
														},{
															type: 'success',
															timer: 1
														});
														alert("Категория изменена!");
														location.reload();
													}
												});
												
												str.find('td#name_id').html(str.find('select#subcategory_select_table').val());
												str.find('td#name_ru').html(str.find('input#name_ru').val());
												str.find('td#name').html(str.find('input#name').val());
												str.find('#button_1sub').html('<button id="change_subcategory" class="btn btn-default" ><i class="fa fa-pencil fa-1x"></i></button>');
												str.find('#button_2sub').html('<button id="remove_subcategory" class="btn btn-default" ><i class="fa fa-trash fa-1x"></i></button>');
											}else{
												demo.initChartist();
												$.notify({
													icon: 'ti-hand-point-right',
													message: "Один из элементов уже редактируется!"
												},{
													type: 'warning',
													timer: 1
												});
											}
										});
										
										$('#cancel_subcategory').click(function(){
											if(inc == 1){
												inc--;
												str.find('td#name_id').html(last_sub.name_id);
												str.find('td#name_ru').html(last_sub.name_ru);
												str.find('td#name').html(last_sub.name);
												str.find('#button_1sub').html('<button id="change_subcategory" class="btn btn-default" ><i class="fa fa-pencil fa-1x"></i></button>');
												str.find('#button_2sub').html('<button id="remove_subcategory" class="btn btn-default" ><i class="fa fa-trash fa-1x"></i></button>');
											}else{
												demo.initChartist();
												$.notify({
													icon: 'ti-hand-point-right',
													message: "Один из элементов уже редактируется!"
												},{
													type: 'warning',
													timer: 1
												});
											}
										});
										
									});
									
									$('body').on('click', '#remove_subcategory', function(){
										a = confirm("Вы точно хотите удалить?");
										if(a){
											var str = $(this).parent().parent();
											
											$.ajax({
												type: 'POST',
												url: '/adm/remove_subcategory',
												data: {id: str.find('#id').text()},
												success:function(){
													
													demo.initChartist();
													$.notify({
														icon: 'ti-hand-point-right',
														message: "Категория удалена!"
													},{
														type: 'success',
														timer: 1
													});
												location.reload();	
												alert("Категория удалена!");
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
