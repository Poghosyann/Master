<!DOCTYPE html>
<html>

<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Show Master" />

    <!-- Page Title -->
    <title>Show Master</title>

    <!-- Favicon and Touch Icons -->
    <link href="/public/images/favicon.png" rel="shortcut icon" type="image/png">

    <!-- Stylesheet -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/public/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="/public/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/public/css/css-plugin-collections.css" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link href="/public/css/menuzord-megamenu.css?v=1.2" rel="stylesheet"/>
    <link id="menuzord-menu-skins" href="/public/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="/public/css/style-main.css?v=1.2" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="/public/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="/public/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="/public/lib/office/css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="/public/css/colors/theme-skin-color-set5.css?v=1.2" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/public/lib/lightbox/lightbox.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->

    <!-- external javascripts -->
    <!--    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>-->
    <script src="/public/js/jquery-2.2.4.min.js"></script>
    <script src="/public/js/jquery-ui.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/lib/lightbox/lightbox.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="/public/js/jquery-plugin-collection.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if($cnt->lang=="ru"){?>
        <style>
            .ru{
                font-size: 15px;
                text-shadow: 0 0 1px;
            }
            .en:hover,
            .en:focus{
                text-shadow: 0 0 1px;
                transition: .5s;
            }
        </style>
    <?php } else {?>
        <style>
            .en{
                font-size: 15px;
                text-shadow: 0 0 1px;
            }
            .ru:hover,
            .ru:focus{
                text-shadow: 0 0 1px;
                transition: .5s;
            }
        </style>
    <?php } ?>
</head>
<body class="has-side-panel side-panel-right fullwidth-page">
<div id="wrapper" class="container clearfix">

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-nav">
            <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                <div class="container-fluid menu_nav">
                    <nav id="menuzord" class="menuzord default theme-colored menuzord-responsive">
                        <a href="/"><img class="blc_logo" src="/public/images/logo.png" alt=""></a>
                        <ul class="menuzord-menu">
                            <a href="?lang=ru" class="loc_nav col-xs-6 text-right" style="display: none;">Рус</a><a href="?lang=en" class="loc_nav col-xs-6 text-left" style="display: none;">Eng</a>
                            <li><a href="/"><?=$cnt->val['home']?></a></li>
                            <li><a href="/about"><?=$cnt->val['about']?></a></li>
                            <li><a href="/goods/"><?=$cnt->val['materials']?></a>
                                <ul class="dropdown">
                                    <li><a href="/page1">page1</a></li>
                                    <li><a href="/page2">page2</a></li>
                                    <li><a href="/page3">page3</a></li>
                                </ul>
                            </li>
                            <li><a href="/goods/"><?=$cnt->val['brands']?></a>
                                <ul class="dropdown">
                                    <li><a href="/page1">page1</a></li>
                                    <li><a href="/page2">page2</a></li>
                                    <li><a href="/page3">page3</a></li>
                                </ul>
                            </li>
                            <li><a href="/our_services"><?=$cnt->val['our_services']?></a></li>
                            <li><a href="/suggestion"><?=$cnt->val['suggestion']?></a></li>
                            <li><a href="#"><?=$cnt->val['gallery']?></a>
                                <ul class="dropdown">
                                    <li><a href="/gallery_photo"><?=$cnt->val['photo']?></a></li>
                                    <li><a href="/gallery_video"><?=$cnt->val['video']?></a></li>
                                </ul>
                            </li>
                            <li><a href="/contact"><?=$cnt->val['contact']?></a></li>
                        </ul>
                        <div class="mt-35 loc_header pull-right">
                            <a class="ru" href="?lang=ru">РУ </a>|
                            <a class="en" href="?lang=en">EN</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>