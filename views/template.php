<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <meta name="description" content="Designa Studio, a HTML5 / CSS3 template.">
    <meta name="author" content="Sylvain Lafitte, Web Designer, sylvainlafitte.com">

    <title>Example Website</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?=ABSOLUTE_PATH?>views/style/img/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?=ABSOLUTE_PATH?>views/style/img/favicon.png">

    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/style.css">

</head>

    <body>
    <div class="container">

        <header id="navtop">
            <a href="<?=ABSOLUTE_PATH?>home" class="logo fleft">
                <img src="<?=ABSOLUTE_PATH?>views/style/img/logo.png" alt="Designa Studio">
            </a>

            <nav class="fright">
            <?php foreach (array_chunk($this->categories["top-menu"]["pages"], 2) as $col): ?>
                <ul>
                <?php foreach($col as $menuItem): ?>
                    <li><a href="<?=ABSOLUTE_PATH?>page/show/<?=$menuItem["id"]?>"><?=$menuItem["title"]?></a></li>
                <?php endforeach ?>
                </ul>
            <?php endforeach ?>
            </nav>
        </header>


        <div class="home-page main">
            <section class="grid-wrap" >
                <header class="grid col-full">
                    <hr>
                </header>

                <div class="grid col-one-half mq2-col-full">
                    <?php $this->render_view($this->view_file) ?>
                </div>
            </section>

        <div class="divide-top">
            <footer class="grid-wrap">
                <ul class="grid col-one-third social">
                    <li><a href="#">RSS</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Google+</a></li>
                    <li><a href="#">Flickr</a></li>
                </ul>

                <div class="up grid col-one-third ">
                    <a href="#navtop" title="Go back up">&uarr;</a>
                </div>

                <nav class="grid col-one-third ">
                    <ul>
                    <?php foreach ($this->categories["bottom-menu"]["pages"] as $menuItem): ?>
                        <li><a href="<?=ABSOLUTE_PATH?>page/show/<?=$menuItem["id"]?>"><?=$menuItem["title"]?></a></li>
                    <?php endforeach ?>
                    </ul>
                </nav>
            </footer>
        </div>

    </div>
    <!-- Javascript - jQuery -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>

    <!--[if (gte IE 6)&(lte IE 8)]>
    <script src="<?=ABSOLUTE_PATH?>views/style/js/selectivizr.js"></script>
    <![endif]-->

    <script src="<?=ABSOLUTE_PATH?>views/style/js/jquery.flexslider-min.js"></script>
    <script src="<?=ABSOLUTE_PATH?>views/style/js/scripts.js"></script>

</body>

</html>



