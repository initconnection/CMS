<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - Home Page | Design Company - Free Website Template from Templatemonster.com</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/jquery-1.4.2.min.js" ></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/Humanst521_BT_400.font.js"></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/Humanst521_Lt_BT_400.font.js"></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/roundabout.js"></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/roundabout_shapes.js"></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/gallery_init.js"></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/cufon-replace.js"></script>
    <!--[if lt IE 7]>
    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/ie/ie6.css" type="text/css" media="all">
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/html5.js"></script>
    <script type="text/javascript" src="<?=ABSOLUTE_PATH?>views/style/js/IE9.js"></script>
    <![endif]-->
</head>

<body>
<!-- header -->
<header>
    <div class="container">
        <h1><a href="home">Design Company</a></h1>
        <nav>
            <ul>
            <?php foreach ($this->categories["main-menu"]["pages"] as $menuItem): ?>
                <li><a href="<?=ABSOLUTE_PATH?><?=$menuItem["name"]?>"
                <?=($menuItem["name"] == $this->currentPage) ? ' class="current"' : ''?>>
                <?=$menuItem["title"]?></a></li>
            <?php endforeach ?>
            </ul>
        </nav>
    </div>
</header>
<!-- #gallery -->
<section id="gallery">
    <div class="container">
        <ul id="myRoundabout">
            <?php foreach($this->slides as $slide): ?>
            <li><a href="<?=$slide["link"]?>"><img src="<?=ABSOLUTE_PATH?>upload/<?=$slide["file"]?>" alt="<?=$slide["title"]?>" /></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</section>
<!-- /#gallery -->
<div class="main-box">
    <div class="container">
        <div class="inside">
            <div class="wrapper">
                <?php $this->render_view($this->view_file) ?>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<footer>
    <div class="container">
        <div class="wrapper">
            <div class="fleft">Copyright - Type in your name here</div>
            <div class="fright"><!--<a rel="nofollow" href="http://www.templatemonster.com/" target="_blank">Website template</a> designed by TemplateMonster.com&nbsp; &nbsp; |&nbsp; &nbsp; <a href="http://templates.com/product/3d-models/" target="_blank">3D Models</a> provided by Templates.com--></div>
        </div>
    </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
