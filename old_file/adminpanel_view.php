<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/sb-admin.css" rel="stylesheet">
    <link href="/admin/css/plugins/morris.css" rel="stylesheet">
    <link href="/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>SB Admin - Bootstrap Admin Template</title>

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
                            Dashboard <small></small>
                        </h1>
                    </div>
                </div>
<div class="row">
  <div class="col-lg-6">
    <?php include("include/adminpanel_navbar.php"); ?>
  <a href="/adminpanel/add_article">
    <div class="panel-footer">
      <span class="pull-left">Добавить статью</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
  </a>
  <a href="/adminpanel/edit_article">
    <div class="panel-footer">
      <span class="pull-left">Редактировать статью</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
  </a>
  <a href="/adminpanel/create_user">
    <div class="panel-footer">
      <span class="pull-left">Создать пользователя</span>
      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
      <div class="clearfix"></div>
    </div>
  </a>     
    </div>
  </div>
  
</div>
</div>
    <script src="/admin/js/jquery.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="/admin/js/plugins/morris/morris.min.js"></script>
    <script src="/admin/js/plugins/morris/morris-data.js"></script>
</body>

</html>