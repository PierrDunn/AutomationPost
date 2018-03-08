    <div class="sidebar" data-background-color="black" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text" style="font-family: 'Pacifico', cursive; color: #e5474b; font-size: 1.75em; text-transform: none; font-weight: normal">
                    Automation Post
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="http://automationpost.ru/adm">
                        <i class="ti-pie-chart"></i>
                        <p>Общая информация</p>
                    </a>
                </li>
                <li>
                    <a href="http://automationpost.ru/adm/create_user">
                        <i class="ti-user"></i>
                        <p>Создать пользователя</p>
                    </a>
                </li>
                <li>
                    <a href="http://automationpost.ru/adm/add_article">
                        <i class="ti-printer"></i>
                        <p>Добавить статью</p>
                    </a>
                </li>
                <li>
                    <a href="http://automationpost.ru/adm/change_article">
                        <i class="ti-pencil"></i>
                        <p>Статьи и премод.</p>
                    </a>
                </li>
				<li>
                    <a href="http://automationpost.ru/adm/change_category_subcategory">
                        <i class="ti-pencil"></i>
                        <p>Категор. и Подкат.</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="http://automationpost.ru">
                        <i class="ti-export"></i>
                        <p>Вернуться на сайт</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
	<script>
	(function(){
		var a = $('li');
		a.each(function(){
			$(this).removeClass('active');
			if($(this).find('p').text() == $('title').text()){
				$(this).addClass('active');
			}
		});
		/*
		for(var i=0; i<a.length; i++){
			console.log(a);
			console.log(a[i].find('p').text()+' '+$('title').text())
			if(a[i].find('p').text() == $('title').text()){
				a[i].addClass('active');
			}
		};
		*/
	})();
		
	</script>