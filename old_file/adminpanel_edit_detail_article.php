<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("include/adminpanel_navbar.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Редактирование <small></small>
                        </h1>
                    </div>
                </div>
        <div class="row">
			 <form action="http://automationpost.ru/adminpanel/edit_article_reciever" method="post" enctype="multipart/form-data">

				<div class="col-lg-12">
					<h2 align='center'>Редактирование статьи</h2>
				</div>
				<div class="col-lg-12">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $article[0]['id']; ?>">
					<div class="form-group" >
						<label>Название статьи</label>
						<input class="form-control" name="title" value="<?php echo $article[0]['title']; ?>">
					</div>
					<div class="form-group">
						<label>Описание</label>
						<textarea class="form-control" name="description"><?php echo $article[0]['description']; ?></textarea>
					</div>
					<div class="form-group">
						<label>Содержание</label>
						<textarea rows="20" class="form-control" name="text"><?php echo $article[0]['text']; ?></textarea>
					</div>
					<div class="form-group">
						<label>Дата</label>
						<input class="form-control"  name="date" type="date" value="<?php echo $article[0]['date']; ?>">
					</div>
					<button type="submit" name="download" class="btn btn-default">Изменить запись в базе</button>

			 </form>


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
