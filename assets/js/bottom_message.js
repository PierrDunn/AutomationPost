var m = function(){
	$('body').append('<header id="bottom-message">'
					+'<div class="inner">'
						+'<p style="color: rgb(243, 243, 244); margin-left: 2em; display:inline-block; position: absolute; left:0"><img width="40" height="40" src="/assets/img/favicon.png">&emsp; Следи за появлением новых статей при помощи Vk-bot!</p>'
						+'<a style="margin-right: 2em" href="https://oauth.vk.com/authorize?client_id=5922287&display=page&redirect_uri=http://automationpost.ru/vkmessager/vk_login&scope=pages,photos,friends,offline&response_type=code&v=5.62" class="button special">Подписаться</a>'
						+'<a style="margin-right: 2em" id="close-bt-ms" class="button">Скрыть</a>'
					+'</div>'
				  +'</header>');
	$('#bottom-message').animate({
		height: "7em"
	}, 500);
	$('#close-bt-ms').on('click', function(){
		$('#bottom-message').remove();
	});
};
/*
var h = $.ajax({
		type: "POST",
		url: "http://automationpost.ru/vkmessager/have_user",
		data: ({
		flag: 0
		}),
		success:(function(data){
			console.log(data);
		})
	});
*/
setTimeout(m, 3000);
