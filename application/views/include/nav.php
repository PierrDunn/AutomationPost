<header id="header">
	<div class="inner">
		<a href="http://automationpost.ru" class="logo">Automation Post</a>
		<nav id="nav">
		</nav>
	</div>
</header>
<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

<a class="navPanelToggle"></a>
<div id="navPanel" class="">
			
			<ul class="dropdown">
			
			  <?php if ($this->ion_auth->logged_in()){ ?>
			  
			  <li>
				<a href="#">
				  <img src="/<? echo trim($profile->avatar);?>" class="img-circle" style="width:40px; height:40px">
				  <? echo trim($profile->first_name); ?>
				</a>
				<ul>
				  <li><a href="<?php echo '/startpage/edit_users'?>">Настройки</a></li>
				  	<?php if ($this->ion_auth->is_admin()){ ?>
						<li><a href="<?php echo '/adm'?>">Админпанель</a></li>
					<?php } ?>
				  <li><a href="<?php echo '/startpage/logout'?>">Выход</a></li>
				</ul>
			  </li>
			  
			  <?php }else{ ?>
			  <li>
				<a href="" id="login" data-toggle="modal" data-target="#Login">Вход</a>
			  </li>
			  <li>
				<a href="" id="reg" data-toggle="modal" data-target="#Registration">Регистрация</a>
			  </li>
			  <?php } ?>
			  
			  <li>
				<a href="">Категории</a>
				<ul>
				  <?php foreach($get_categories as $val){ ?>
				  <li><a href="http://automationpost.ru/c_view/<?php echo $val['name']; ?>"><?php echo $val['ru_name']; ?></a></li>
				  <?php }; ?>
				</ul>
			  </li>
			  
			  <li>
				<a href="">Бренды</a>
				<ul>
				  <li><a href="http://automationpost.ru/b_view/ru">Отечественные</a></li>
				  <li><a href="http://automationpost.ru/b_view/eu">Зарубежные</a></li>
				  <li><a href="http://automationpost.ru/b_view/all">Все</a></li>
				</ul>
			  </li>
			  
			</ul>
			
		<a class="close" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></a>
</div>

<!-- Jlist Menu -->
<script src="/assets/js/tendina.min.js"></script>
<style>
   li {
    list-style-type: none; /* Убираем маркеры */
   }
   ul {
    margin-left: 0; /* Отступ слева в браузере IE и Opera */
    padding-left: 0; /* Отступ слева в браузере Firefox, Safari, Chrome */
   }
</style>
   
<script>
	$('.dropdown').tendina({
		animate: true,
		speed: 500,
		onHover: false,
		hoverDelay: 300
	})
</script>	