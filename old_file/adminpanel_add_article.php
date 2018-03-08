<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/sb-admin.css" rel="stylesheet">
    <link href="/admin/css/plugins/morris.css" rel="stylesheet">
    <link href="/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

    <title>SB Admin - Bootstrap Admin Template</title>
</head>

<body>
  <div id="wrapper">
    <?php include("include/adminpanel_navbar.php"); ?>
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
            Добавление места <small></small>
            </h1>
          </div>
        </div>
        <div class="row">
          <form action="http://automationpost.ru/adminpanel/add_article_reciever" method="post" enctype="multipart/form-data">
            <div class="col-lg-12">
              <div class="form-group" >
                <label>Название статьи</label>
                <input class="form-control" name="title">
              </div>  
              <div class="form-group" >
                <label>Краткое описание</label>
                <textarea class="form-control" name="description"></textarea>
              </div>
              <div class="form-group" >
                <label>Тект</label>
                <textarea class="form-control" name="text"></textarea>
              </div>
              <div class="form-group">
                <label>Превью фото</label>
                <input type="file" name="userfile">
              </div>
              <div class="form-group" >
                <label>Дата</label>
                <input class="form-control" name="date" type="date">
              </div>  
              <div class="form-group" >
                <label>Автор</label>
                <input class="form-control" name="author" type="text">
              </div>
              <div class="form-group" >
                <label>Бренд</label>
                <select name="brands">
                <?php foreach ($brands as $item): ?>
                  <option><?= $item['name']; ?></option>
                <? endforeach;?>
                </select>
              </div> 
              <div class="form-group" >
                <label>Категории</label>
                <select name="category">
                <?php foreach ($category as $item): ?>
                  <option ><?= $item['name']; ?></option>
                <? endforeach;?>
                </select>
              </div>        
              <div class="form-group" >
                <label>Раздел</label>
                <select name="subcategory">
                <?php foreach ($subcategory as $item): ?>
                  <option><?= $item['name']; ?></option>
                <? endforeach;?>
                </select>
              </div>              
            </div>
            <button type="submit" name="download" class="btn btn-default">Добавить в базу</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  

    <!-- jQuery -->
    <script src="/admin/js/jquery.js"></script>
    <script type="text/javascript">
    	CKEDITOR.replace("text");
    </script>


    <!-- Bootstrap Core JavaScript -->
    <script src="/admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="/admin/js/plugins/morris/morris.min.js"></script>
    <script src="/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>
