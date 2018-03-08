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

		<!-- Невидимые поля -->
		<input type="text" class="form-control" name="id_st" id="id_st" value="<?php echo $articles[0]['id']; ?>" style="display: none">
		<input type="text" class="form-control" name="id_user" id="id_user" value="<?php if ($this->ion_auth->logged_in()){echo $profile->id;} ?>" style="display: none">	
		<!-- Main -->
			<section id="main" >
				<div class="inner">
					<header class="major special" style="margin-bottom: 2em">
						<h1 style="color: #e5474b"><?php echo $articles[0]['title'];?></h1>
						<h5 style="color: #e5474b">Автор: <?php echo $articles[0]['author'];?></h5>
						<div class="icons" style="font-size: 1.2em; color: #1c1c1c">
									<a id="up" style="color: #1c1c1c" onclick="like_up()">
										<i class="fa fa-chevron-up" aria-hidden="true" >
										</i>
									</a> 
									<span id ="value"><?php echo $value; ?> </span>
									<a id="down" style="color: #1c1c1c" onclick="like_down()">
										<i class="fa fa-chevron-down" aria-hidden="true">
										</i>
									</a>&emsp;
										<i class="fa fa-eye" style="color: #1c1c1c" aria-hidden="true">
										</i> <?php echo $articles[0]['views'];?>&emsp;
									<a style="color: #1c1c1c"><i class="fa fa-comments" aria-hidden="true"></i></a> <? echo count($comments) ?>
						</div>
					</header>
					<?php echo $articles[0]['text'];?>
				</div>
			</section>
		
		<section id="two" style="background:#fff">
				<div class="inner">
					<h2>Комментарии</h2>
				</div>
			<?php foreach ($comments as $item): 
								foreach ($users as $row):
									if ($row['id'] == $item['user_id']){
			?>				
				<div class="inner" style="background: #f3f3f3; padding: 1em; margin-bottom: 1em; margin-left: calc(21% + 3% * <?= $item['level']; ?>)">
					<p style="text-align: center"><img src="/<?= $row['avatar']; ?>" width="70" height="70" class="img-circle"></p> 
					
					<articles>
						<div class="comment-text" style="margin: 1em">
			            	<?php

										?><h5><?= $row['first_name']; ?></h5>
										<input id="<?= $item['comment_id']; ?>" name="<?= $item['comment_id']; ?>" value="<?= $row['first_name']; ?>" hidden="true">
										<?
									}
								endforeach;
							?>
							<h5><?= $item['created']; ?></h5>
							<p><?= $item['message']; ?></p>
							<button onclick="replay(this.value)" name="replay" value="<?= $item['comment_id']; ?>" class="alt" >Ответить</button>
						</div>
					</articles>
				</div>

        <?php  endforeach; ?>										
		
		</section>
		<!-- Footer -->
	
			<section id="footer">
				<div class="inner">
					<header>
						<h2>Добавить комментарий</h2> 
					</header>
<?php if ($this->ion_auth->logged_in()){?>	
					<form action="http://automationpost.ru/startpage/add_comments" method="post" enctype="multipart/form-data">
						<div class="field">
							<label for="message">Текст комментария</label><br>
							<label name="towhom" id="towhom" for="message"></label>						
							<i id="cancel" name="cancel" class="fa fa-times" hidden="true" onclick="cance()" style="cursor: pointer"></i>
							<input type="form-control" name="id" id="id" hidden="true" value="<?php echo $articles[0]['id']; ?>">
							<input type="form-control" name="username" id="username" hidden="true" value="<?php echo  trim($profile->first_name); ?>">
							<input type="form-control" name="id_user" id="id_user" hidden="true" value="<?php echo  trim($profile->id); ?>">
							<input type="form-control" name="id_parent" id="id_parent" hidden="true" value="">
							<input type="form-control" name="avatar" id="avatar" hidden="true" value="<?php echo  trim($profile->avatar); ?>">
							<textarea name="message" id="message" rows="6"></textarea>
						</div>
						<ul class="actions">
							<li><button type="submit" name="download" value="Отправить" class="alt" >Добавить комментармй</button></li>
						</ul>
					</form>
<?php } else { ?>
				  <div style="margin-top: 1em; margin-bottom: 2em">Комментарии могут оставлять только зарегистрированные пользователи. <a style="cursor: pointer" data-toggle="modal" data-target="#Login">Войдите</a>, пожалуйста.</div>
<?php } ?>					
					
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


	  <script type="text/javascript">
	  like_check();

function like_check(){
	var id_st = $('#id_st').val();
	var id_user = $('#id_user').val();
   	var html = $.ajax({
			type: "POST",
			url: "http://automationpost.ru/startpage/likes_check",
			success:function(){},
            data: ({
				'id_st' : id_st,
				'id_user' : id_user,
			}),
            async: false
        }).responseText;
		if(html=='false'){
			//$('#value').replaceWith('<div id ="value"><?php echo $value; ?> </div>');
			$('#up').replaceWith('<a id="up" style="color: #1c1c1c" onclick="like_up()"> <i class="fa fa-chevron-up" aria-hidden="true" ></i></a>');
			$('#down').replaceWith('<a id="down" style="color: #1c1c1c" onclick="like_down()"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>');
		}
}

	function like_up(){

	var id_st = $('#id_st').val();
	var id_user = $('#id_user').val();
	var value = 1;
	var html = 'false';
   		html = $.ajax({

			type: "POST",
			// Тут в качестве параметра url мы указываем на
			// controller который будет обрабатывать наши данные
			url: "http://automationpost.ru/startpage/likes",
			success:function(){},
            data: ({
				// Перечесляем передаваемые переменные
				// Сначала идёт название которое получит controller
				// через метод post, следом наша переменная с данными
				'id_st' : id_st,
				'id_user' : id_user,
				'value' : value,
			}),
           // dataType: "html",
            async: false
        }).responseText;
		
		if(html=='true'){
			//$('#value').replaceWith('<div id ="value"><?php echo $value; ?> </div>');
			$('#up').replaceWith('<a id="up" style="color: #1c1c1c" onclick="like_up()"> <i class="fa fa-chevron-up" aria-hidden="true" ></i></a>');
			$('#down').replaceWith('<a id="down" style="color: #1c1c1c" onclick="like_down()"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>');
				
				var val = $("#value").text();
				val = parseInt(val);
				$("#value").empty();
				$("#value").append(1+val);
		}
		else{

		} 
}
	function like_down(){

	var id_st = $('#id_st').val();
	var id_user = $('#id_user').val();
	var value = -1;
	var html = 'false';
   		html = $.ajax({

			type: "POST",
			// Тут в качестве параметра url мы указываем на
			// controller который будет обрабатывать наши данные
			url: "http://automationpost.ru/startpage/likes",
			success:function(){},
            data: ({
				// Перечесляем передаваемые переменные
				// Сначала идёт название которое получит controller
				// через метод post, следом наша переменная с данными
				'id_st' : id_st,
				'id_user' : id_user,
				'value' : value,
			}),
           // dataType: "html",
            async: false
        }).responseText;
		
		//alert(html);
		if(html=='true'){
			//$('#value').replaceWith('<div id ="value"><?php echo $value; ?> </div>');
			$('#up').replaceWith('<a id="up" style="color: #1c1c1c" onclick="like_up()"> <i class="fa fa-chevron-up" aria-hidden="true" ></i></a>');
			$('#down').replaceWith('<a id="down" style="color: #1c1c1c" onclick="like_down()"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>');
				var val = $("#value").text();
				$("#value").empty();
				$("#value").append(val-1);			
		}
		else{

		} 
}
	function replay(value){
		$('#id_parent').replaceWith('<input type="form-control" name="id_parent" id="id_parent" hidden="true" value="'+value+'">');
		$('#towhom').replaceWith('<label name="towhom" id="towhom" for="message">Кому: ' + document.getElementById(value).value + '</label>');
		$('#cancel').replaceWith('<i id="cancel" name="cancel" class="fa fa-times" onclick="cance()" style="cursor: pointer"></i>');

	}

	function cance(){
	$('#towhom').replaceWith('<label name="towhom" id="towhom" for="message"></label>');
	$('#id_parent').replaceWith('<input type="form-control" name="id_parent" id="id_parent" hidden="true" value="">');
	$('#cancel').replaceWith('<i id="cancel" name="cancel" class="fa fa-times" hidden="true" onclick="cance()" style="cursor: pointer"></i>');

}	
	  </script>