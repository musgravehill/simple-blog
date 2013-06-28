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
        <a class="name-top-brand" style="" href="/">Рыбку ловим!</a>
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
            background-image: url('/design/img/top-fish-shadow-320.png');
            width: 320px;
            height: 102px;
            padding: 0px;
            margin: 0px;
        }
        .name-top-brand, .name-top-brand:hover{
            position: absolute;
            top:10px;
            left:40%;
            color:#003300;            
            text-decoration: none;
            display: inline-block;
            font-family: inherit;
            font-weight: bold;            
            font-size: 32px;
            color: inherit;
            text-rendering: optimizelegibility;
        }



    </style>
</html>