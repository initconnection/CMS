<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
          href="<?=ABSOLUTE_PATH?>views/style/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css"
          href="<?=ABSOLUTE_PATH?>views/style/css/main.css" />
</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav">
                <?php foreach($this->menu["naujas-kategorija"] as $menuItem) : ?>
                <li><a href="<?=ABSOLUTE_PATH?>page/show/<?=$menuItem["id"]?>"><?=$menuItem["title"]?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
    <div class="container">
        <?php $this->render_view($this->view_file) ?>
        <a href="javascript:history.back()">< back</a>
    </div>
    <script src="<?=ABSOLUTE_PATH?>views/style/js/jquery-1.9.1.js"></script>
    <script src="<?=ABSOLUTE_PATH?>views/style/js/main.js"></script>
    <script src="<?=ABSOLUTE_PATH?>views/style/js/bootstrap.js"></script>
</body>

</html>



