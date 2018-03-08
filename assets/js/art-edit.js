/*Формирование объекта статьи*/
var aobj = {
	title: 'Название статьи...',
	author: '...',
	brand: '',
	category: '',
	subcategory: '',
	description: '',
	text: '',
	logo: '',
	width: 0,
	height: 0
};

/*Формирование объекта хранения состояний*/
var dump = {
	o: {},
	text: '',
	fp: 0
};

/*Функция формирования информации на странице при её загрузке*/
(function default_form(){
	$('header > h1').text(aobj.title);
	$('header > h5').text('Автор:' + aobj.author);
})();

/*Функция захвата специальных элементов(заголовок, автор) и формирования поля ввода*/
$('header > h1, header > h5').click(function(){
		
	dump.o = $(this);
	
	if(dump.fp != 1){
		dump.text = $(this).text();
		
		$(this).before('<button class="edit-button app" onclick="app(' + '\'' + 'special' + '\'' +')">Применить</button>'
					   +'<button class="edit-button can" onclick="can(' + '\'' + 'special' + '\'' +')">Отмена</button>');
		$(this).html('<input autofocus class="edit-button input-special"></input>');
		
		if(!dump.o.is('h5')){
			$('.input-special').val(dump.text);
		};
		
		dump.fp = dump.fp + 1;
	};
	
});

/*Функция захвата элемента и формирования поля ввода*/
$("body").on('click','.ar-text, .fit, .ar-list',function () {
	
	dump.o = $(this);
	
	/*для ul*/
	if( (dump.fp != 1) && $(this).find('ul')[0] != undefined ){
		
		console.log('start ul');
		
		dump.text = $(this).find('ul').html();
		$(this).find('ul').before('<button class="edit-button app" onclick="app()">Применить</button>'
					   +'<button class="edit-button can" onclick="can()">Отмена</button>'
					   +'<button class="edit-button up" onclick="up()">Добавить элемент сверху</button>'
					   +'<button class="edit-button down" onclick="down()">Добавить элемент снизу</button>'
					   +'<button class="edit-button rem" onclick="rem()">Удалить элемент</button>');
					   
		$(this).html(function(){
			$(this).find('li').each(function(){
				t = $(this).text();
				$(this).html('<input autofocus class="edit-button input-li"></input>'
							+'<button class="edit-button add-li" onclick="add_li($(this).parent())">+</button>'
							+'<button class="edit-button rem-li" onclick="$(this).parent().remove()">-</button>');
				$(this).find('input').val(t);
			});
		});
		dump.fp = dump.fp + 1;
	};
	
	/*для p*/
	if( (dump.fp != 1) && $(this).find('p')[0] != undefined ){
		
		console.log('start p');
		
		dump.text = $(this).find('p').text();
		$(this).before('<button class="edit-button app" onclick="app()">Применить</button>'
					   +'<button class="edit-button can" onclick="can()">Отмена</button>'
					   +'<button class="edit-button up" onclick="up()">Добавить элемент сверху</button>'
					   +'<button class="edit-button down" onclick="down()">Добавить элемент снизу</button>'
					   +'<button class="edit-button rem" onclick="rem()">Удалить элемент</button>');
					   
		$(this).html('<textarea rows="5" class="form-control border-input" placeholder="" value=""  autofocus>'
						+$(this).find('p').text()
					+'</textarea>');
					
		dump.fp = dump.fp + 1;
	};
	
	/*для img*/
	if( (dump.fp != 1) && $(this).find('img')[0] != undefined ){
		
		console.log('start img');
		
		dump.text = $(this).find('img').attr('src');
		$(this).before('<button class="edit-button app" onclick="app()">Применить</button>'
					  +'<button class="edit-button can" onclick="can()">Отмена</button>');
					  
		$(this).before('<button class="edit-button upload" onclick="upload()">Загрузить картинку</button>'
					  +'<button class="edit-button upload-url" onclick="upload_url()">Загрузить картинку по ссылке</button>'
					  +'<input autofocus class="edit-button input-url"></input>'
					  +'<button class="edit-button up" onclick="up()">Добавить элемент сверху</button>'
					  +'<button class="edit-button down" onclick="down()">Добавить элемент снизу</button>'
					  +'<button class="edit-button rem" onclick="rem()">Удалить элемент</button>');
		
		dump.fp = dump.fp + 1;
	};
	
});

/*Функции применения изменений или отмены*/
function app(t){
	
	/*для ul*/
	if(dump.o.find('ul')[0] != undefined){
		
		dump.o.find('ul').html(function(){
			dump.o.find('li').each(function(){
				$(this).html($(this).find('input').val());
			});
		});
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	};
	
	/*для p*/
	if(dump.o.find('textarea')[0] != undefined){
		//console.log($('[autofocus]').val());
		dump.o.html('<p>' + $('[autofocus]').val() + '</p>');
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	};
	
	/*для img*/
	if(dump.o.find('img')[0] != undefined){
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	};
	
	/*для специальных элементов*/
	if(t == 'special'){

		if(dump.o.is('h5')){
			
			dump.o.html('Автор: ' + $('[autofocus]').val());
			
		}else{
			
			dump.o.html($('[autofocus]').val());
		
		}
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	};
};

function can(t){
	
	/*для ul*/
	if(dump.o.find('ul')[0] != undefined){
		
		dump.o.find('ul').html(dump.text);
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	};
	
	/*для p*/
	if(dump.o.find('textarea')[0] != undefined){
		dump.o.html('<p>' + dump.text + '</p>');
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	};
	
	/*для img*/
	if(dump.o.find('img')[0] != undefined){
		dump.o.find('img')[0].src = dump.text;
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	}else if(dump.o.find('#dropzone')[0] != undefined){
		dump.o.html('<img src="' + dump.text + '" alt="">');
	};
	
	/*для специальных элементов*/
	if(t == 'special'){
		dump.o.html(dump.text);
		$('.edit-button').remove();
		dump.fp = dump.fp - 1;
	};
};

/*Функции выбора элемента*/
function select_elem(e){
	
	
	if(e && e.t == 'create_text'){
		
		$(e.p).removeClass().addClass('ar ar-text').html('<p>Шаблон для текста</p>');
		
		
	}else if(e && e.t == 'create_img'){
		
		$(e.p).removeClass().addClass('ar image fit').html('<img src="http://i.io.ua/img_su/large/0230/23/02302397_n2.jpg" alt="">');
		
	}else{
		

		return '<span class="simple">'
					+'<div style="text-align: center;">'
						+'<h5>Что это будет за элемент?</h5>'
						+'<button id="create_text" onclick="select_elem($(this).selectType())">Текст</button>'
						+'<button id="create_img" onclick="select_elem($(this).selectType())">Картинка</button>'
					+'</div>'
				+'</span>';
	
	};
};

(function(){ //Эта функция определяет тип объекта, который нужно создать и место создания
	$.fn.selectType = function(){
		var o = {};
		o.p = this.parent().parent()[0];
		o.t = this.attr('id');
		return o;
	};
})(jQuery);

/*Функции добавления верхнего или нижнего элемента*/
function up(){

	can();
	dump.o.before(select_elem());
	if(dump.fp == 1){dump.fp = dump.fp - 1;};
	
};

function down(){
	
	can();
	dump.o.after(select_elem());
	if(dump.fp == 1){dump.fp = dump.fp - 1;};
};

/*Функция удаления любого редактруемого объекта*/
function rem(){
	
	$('.edit-button').remove();
	dump.o.remove();
	if(dump.fp == 1){dump.fp = dump.fp - 1;};
	
	//Если все элементы со страницы удалены
	if($(".ar").length == 0){
		console.info('EMPTY!!!!!!!!!!!!!!!!!!!');
		$('#ar-edit').html(select_elem());
	};
};

/*Функция загрузки картинки*/
function upload(){
	dump.text = dump.o.find('img')[0].src;
	
	dump.o.html('<div id="dropzone">'
        +'<div class="title">Перетащите файлы сюда</div>'
        +'<div class="or">или</div>'
        +'<div class="browser">'
            +'<label>'
               +' <span>Выберите файлы</span>'
                +'<input type="file" name="file"/>'
            +'</label>'
        +'</div>'
        +'<div class="reqs">Можно: png, jpg, jpeg.</div>'
    +'</div>');
	
	$('#dropzone').dmUploader({
                url: 'upload.php',
                dataType: 'json',
                maxFileSize: 5000 * 5000,
                allowedTypes: 'image/*',
                /*onBeforeUpload: function (id) {
                    $("div#output").html('<img src="static/loader.gif">')
                        .show();
                },*/
                onUploadSuccess: function (id, response) {
					
                    if (response.type == "message") {
                        demo.initChartist();
						$.notify({
							icon: 'ti-hand-point-right',
							message: "Что то пошло не так!"
						},{
							type: 'warning',
							timer: 1
						});
                    }
					
                    if (response.type == "upload") {
						demo.initChartist();
						$.notify({
							icon: 'ti-hand-point-right',
							message: "Загрузка прошла успешно!"
						},{
							type: 'success',
							timer: 1
						});
                        dump.o.html('<img src="' + response.data.url + '" alt="">');
                    }
					
                },
                onUploadError: function (id, message) {
						demo.initChartist();
						$.notify({
							icon: 'ti-hand-point-right',
							message: "Файл: " + id + " не загрузился: " + message
						},{
							type: 'warning',
							timer: 1
						});
                },
                onFileTypeError: function (file) {
						demo.initChartist();
						$.notify({
							icon: 'ti-hand-point-right',
							message: "Загружать можно только png и jpeg!"
						},{
							type: 'warning',
							timer: 1
						});
                },
                onFileSizeError: function (file) {
						demo.initChartist();
						$.notify({
							icon: 'ti-hand-point-right',
							message: "Файл слишком большой!!"
						},{
							type: 'warning',
							timer: 1
						});
                },
                onFallbackMode: function (message) {
					demo.initChartist();
						$.notify({
							icon: 'ti-hand-point-right',
							message: "Ваш браузер не поддерживается 8("
						},{
							type: 'warning',
							timer: 1
						});
                }
            });
			
};

/*Функция загрузки картинки по ссылке*/
function upload_url(){
	
	if($('.input-url').val() == ''){
			
			demo.initChartist();

        	$.notify({
            	icon: 'ti-hand-point-right',
            	message: "Пожалуйста укажите в поле ввода<br>ссылку на картинку!"

            },{
                type: 'warning',
                timer: 1
            });
	}else{
		dump.text = dump.o.find('img')[0].src;
		
		dump.o.find('img')[0].src = $('.input-url').val();
		
			demo.initChartist();

        	$.notify({
            	icon: 'ti-hand-point-right',
            	message: "Загрузка<br>прошла успешно!"

            },{
                type: 'success',
                timer: 1
            });
	};
	
};

/*Функция для редактирования списков*/
function add_li(o){
	
	$(o[0]).after('<li>'
				  +'<input autofocus class="edit-button input-li"></input>'
				  +'<button class="edit-button add-li" onclick="add_li($(this).parent())">+</button>'
				  +'<button class="edit-button add-li" onclick="$(this).parent().remove()">-</button>'
				  +'</li>');
	
};
