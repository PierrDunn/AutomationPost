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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('include/adminpanel_navbar.php') ?>

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

        <table class="table">
         <thead>
         <tr> <th>#</th> <th>Заголовок </th> <th>Описание</th> <!-- <th>Содержание</th>-->  <th>Изменить</th><th>Удалить</th> </tr>
         </thead>
          <tbody>
         <?php foreach ($article as $item): ?>
            <tr> 
                <th scope="row"> <?= $item['id']; ?> </th> 
                <td><?= $item['title']; ?> </td>
                <td><?= $item['description']; ?> </td> 
                <!--<td><?= $item['text']; ?> </td>--> 
                <td>&nbsp&nbsp&nbsp<a class="fa fa-pencil-square-o fa-2x" href="http://automationpost.ru/adminpanel/edit_article_detail/<?=  $item['id']; ?> "></a></td>
                <td>&nbsp&nbsp&nbsp<a  class="fa fa-trash fa-2x" href="http://automationpost.ru/adminpanel/remove_article_reciever/<?=  $item['id']; ?> " onclick ="return confirm('Удалить?');"></a></td> 
            </tr> 
        <?php  endforeach; ?>

           </tbody>
         </table>

<?php echo $this->pagination->create_links(); ?>
    <!-- jQuery -->
    <script src="/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="/admin/js/plugins/morris/morris.min.js"></script>
    <script src="/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>
