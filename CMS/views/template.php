<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="keywords" />
    <meta name="description" content="description" />
    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/reset.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/bootstrap.css" type="text/css" media="all" />
	<script src="<?=ABSOLUTE_PATH?>views/style/js/jquery-1.9.1.js"></script>
	<script src="<?=ABSOLUTE_PATH?>ckeditor/ckeditor.js"></script>
	<script src="<?=ABSOLUTE_PATH?>views/style/js/main.js"></script>
</head>
<body>
	<div id="loading">
	</div>
	<div id="header">
		<div id="logo">
		</div>
		<ul id="menu">
			<li><a href="<?=ABSOLUTE_PATH?>page/index">Pages</a></li>
            <li><a href="<?=ABSOLUTE_PATH?>site/index"><?=_("Options")?></a></li>
            <li><a href="<?=ABSOLUTE_PATH?>upload/index"><?=_("Upload")?></a></li>
            <li><a href="<?=ABSOLUTE_PATH?>home/index"><?=_("Home page")?></a></li>
			<div class="clear"></div>
		</ul>
	</div>
	<div id="main">
		<?php $this->render_view($this->view_file) ?>
	</div>
	<div id="saved">
		OK, išsaugota
	</div>
</body>
</html>