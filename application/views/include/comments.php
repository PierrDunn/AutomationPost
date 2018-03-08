	<!--Блок комментариев-->
	<div class="container">
	<h2>Комментарии (<?=  count($comments)  ?>)</h2>
			<?php foreach ($comments as $item): ?>
			<div class="media">
			  <div class="media-left">
				<a href="#">
				  <img class="media-object" src="/assets/img/default-user.png">
				</a>
			  </div>
			  <div class="media-body">
				<h4 class="media-heading"><?= $item['email']; ?></h4>
					<h5><?= $item['message']; ?></h5> <?= $item['created']; ?>
			  </div>
			</div>			
			
        <?php  endforeach; ?>
	<form action="http://apost.kaiser-soft.ru/startpage/add_comments" method="post" enctype="multipart/form-data">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">

        <?php if ($this->ion_auth->logged_in()){ 
		 ?> 
		  <textarea class="form-control" name="message" id="message" rows="5"></textarea>
		  <input type="form-control" name="id" id="id" hidden="true" value="<?php echo $articles[0]['id']; ?>">
		  <input type="form-control" name="email" id="email" hidden="true" value="<?php echo  trim($profile->email); ?>">
		  <button type="submit" name="download" class="btn btn-default">Добавить комментармй</button>
		 <?php
		}
		else
		{
		?>
		  <div class="alert alert-info" role="alert">Комментарии могут оставлять только зарегистрированные пользователи. <a data-toggle="modal" data-target="#Войти">Войдите</a>, пожалуйста.</div>
<?php } ?>
		</div>
	  </div>
	</div>	
	</form>
	<!--/Блок комментариев-->