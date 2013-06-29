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
        <link href="/design/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body style="padding-top: 90px;">
        <a class="name-top-brand" href="/">☁❄ Рыбку ловим! ☼☂</a>
        <div class="fish-top-left"></div>
        <div class="fish-top-right"></div>
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
        .fish-top-left{            
            position:absolute;
            top:0px;
            left: 0px;
            display: inline-block;
            background-image: url('/design/img/top-fish-shadow-320-l.png');
            width: 320px;
            height: 98px;
            padding: 0px;
            margin: 0px;
        }
        .fish-top-right{            
            position:absolute;
            top:0px;
            right: 0px;
            display: inline-block;
            background-image: url('/design/img/top-fish-shadow-320-r.png');
            width: 320px;
            height: 98px;
            padding: 0px;
            margin: 0px;
        }
        a.name-top-brand, a.name-top-brand:hover{             
            position: absolute;            
            top:10px;
            left:50%;  
            margin-left: -200px;
            text-decoration: none;
            display: inline-block;
            font-family: inherit;
            font-weight: bold;            
            font-size: 38px;                        
            color:#666600;
        }



    </style>
</html>