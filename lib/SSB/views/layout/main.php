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
        <link href="/design/bootstrap/css/bootstrap.css" rel="stylesheet">        
        <style>
            body {
                padding-top: 80px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
        <link href="/design/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div class="navbar-wood">
            <a class="name-top-brand" style="" href="/">Рыбку ловим!</a>
        </div>
        <div class="top-div-brand">            
        </div>
        <div class="container">
            <div class="row">
                <div class="span9">
                    <?php echo $content; ?>
                </div>
                <div class="span3">
                    <?php include 'lib/SSB/views/layout/sidebar.php'; ?>
                </div>
            </div>
        </div> <!-- /container -->
        <script src="/design/jquery/jquery-2.0.2.min.js"></script>
        <script src="/design/bootstrap/js/bootstrap.min.js"></script>
    </body>
    <style>
        .top-div-brand{            
            position:absolute;
            top:0px;
            display: inline-block;
            background-image: url('/design/img/top-fish-320.png');
            width: 320px;
            height: 108px;
            padding: 0px;
            margin: 0px;
        }
        .name-top-brand, .name-top-brand:hover{
            color:white;
            font-size: 32px;
            text-decoration: none;
            margin: 10px 0px 0px 40%;
            display: inline-block;
        }

        .navbar-wood{
            position:absolute;
            top:0px;
            background-image: url('/design/img/top-bambooo.png');
            height: 80px;
            display: inline-block;
            width: 100%;            
        }

    </style>
</html>