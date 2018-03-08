<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Страница не найдена</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="/assets/img/favicon.png" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="/assets/css/main.css" rel="stylesheet">
	
	<!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

</head>
<body>
<style>
	body {
	  font-family: 'Fira Sans', sans-serif;
	  padding-top: 150px;
	  background-attachment: fixed;
	  background-repeat: no-repeat;
	  background-size: cover;
	}

	.message {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	  background-color: rgba(8, 8, 8, 0.8);
	}
	h2{
	  font-family: 'Pacifico', cursive;
      text-transform: none;
      font-weight: normal;
	  color: #e5474b;	
	}
	.btn{
	  background-color: #e5474b;
	  border: none;
	}
	.btn-success:hover{
	  background-color: #97181c !important;
	  border: none;
	}
</style>

<div class="container">
    <div class="message"> 
	    <h2>404 Page Not Found</h2>
		<p style="color: white">
		<script>
			function r(n,m){
				return Math.floor(Math.random() * (n - m + 1)) + m; 
			};
			switch(r(1, 7)){
				case 1:
					document.body.style.backgroundImage = "url('/assets/img/an1.gif')";
					break;
				case 2:
					document.body.style.backgroundImage = "url('/assets/img/an2.gif')";
					break;
				case 3:
					document.body.style.backgroundImage = "url('/assets/img/an3.gif')";
					break;
				case 4:
					document.body.style.backgroundImage = "url('/assets/img/an1.gif')";
					break;
				case 5:
					document.body.style.backgroundImage = "url('/assets/img/an2.gif')";
					break;
				case 6:
					document.body.style.backgroundImage = "url('/assets/img/an3.gif')";
					break;
				case 7:
					document.body.style.backgroundImage = "url('/assets/img/an1.gif')";
					break;
				default:
					document.body.style.backgroundImage = "url('/assets/img/an2.gif')";
			};
			switch(r(1, 7)){
				case 1:
					document.write("В поисках себя — главное не переусердствовать.");
					break;
				case 2:
					document.write("Кто ищет, тот всегда найдет что искать.");
					break;
				case 3:
					document.write("В поисках счастья теряешь радость.");
					break;
				case 4:
					document.write("Кто хочет - ищет способ, кто не хочет - ищет причину.");
					break;
				case 5:
					document.write("Потеряешь - не жалей, найдёшь - не радуйся.");
					break;
				case 6:
					document.write("Философы утверждают, что они ищут; стало быть, они еще не нашли.");
					break;
				case 7:
					document.write("Найти смысл жизни - это счастье, найти счастье в жизни - это смысл.");
					break;
				default:
					document.write("Рыба ищет, где глубже, а человек, где рыба.");
			};
			switch(r(1, 7)){
				case 1:
					document.write("<br><br>© Фридрих Ницше");
					break;
				case 2:
					document.write("<br><br>© Мартин Хайдеггер");
					break;
				case 3:
					document.write("<br><br>© Эдмунд Гуссерль");
					break;
				case 4:
					document.write("<br><br>© Сёрен Кьеркегор");
					break;
				case 5:
					document.write("<br><br>© Людвиг Витгенштейн");
					break;
				case 6:
					document.write("<br><br>© Георг Гегель");
					break;
				case 7:
					document.write("<br><br>© Иммануил Кант");
					break;
				default:
					document.write("<br><br>© Жан-Поль Сартр");
			};
		</script>
		</p>
	</div>

</div>

</body>

</html>