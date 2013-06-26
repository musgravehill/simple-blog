<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/favicon.png" >
        <meta name='yandex-verification' content='592c8d42b791bebc' />


        <link href="/design/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="/design/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>

    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">              
                    <div class="nav-collapse collapse">
                        <a class="brand" href="/">Блог рыболова Бориса Сергеевича</a>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="span9">
                    <?php echo $content; ?>
                </div>
                <div class="span3">
                    <?php include '/views/layout/sidebar.php'; ?>
                </div>
            </div>
        </div> <!-- /container -->

        <script src="/design/jquery/jquery-2.0.2.min.js"></script>
        <script src="/design/bootstrap/js/bootstrap.min.js"></script>


    </body>
</html>