
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Automation Post</title>

    <!--Здесь подключаю стили-->

    <!--Стиль и скрипт прелоада страницы-->
    <style type="text/css">
        page-preloader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: #000;
            z-index: 100500;
        }

        #page-preloader .spinner {
            width: 32px;
            height: 32px;
            position: absolute;
            left: 50%;
            top: 50%;
            background: url('img/spinner.gif') no-repeat 50% 50%;
            margin: -16px 0 0 -16px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            var $preloader = $('#page-preloader'),
                $spinner   = $preloader.find('.spinner');
            $spinner.fadeOut();
            $preloader.delay(350).fadeOut('slow');
        });
    </script>
    <!--/Стиль и скрипт прелоада страницы-->

    <link href="/assets/fonts/firasans/firasans.css" rel= "stylesheet" type= "text/css">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/page_hover.css" rel="stylesheet">
    <!--/Здесь подключаю стили-->

  </head>

  <body>

    Все прошло успешно 
    <!--Здесь подключаю скрипты-->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/offcanvas.js"></script>
    <script src="/assets/js/godown.js"></script>
    <script src="/assets/js/page_hover.js"></script>
    <script src="/assets/js/get_likes.js"></script>
  </body>
</html>
