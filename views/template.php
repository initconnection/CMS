<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$this->pageTitle?></title>
    <meta charset="utf-8" />
    <meta name="keywords" content="<?=$this->keywords?>" />
    <meta name="description" content="<?=$this->description?>" />
    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?=ABSOLUTE_PATH?>views/style/css/style.css" type="text/css" media="all">
</head>

<body>
    <div id="main-container">
        <div id="header">
            <div id="logo"><a href="<?=ABSOLUTE_PATH?>"><img width="250" height="125"
                                    src="<?=ABSOLUTE_PATH?>views/style/images/Mandola.png" alt="mandola.lt"/></a></div>
            <ul id="main-menu">
                <?php foreach($this->categories["main-menu"]["pages"] as $menuItem): ?>        
                    <li><a class="<?=($menuItem["name"] == $this->currentPage) ? "active" : null?>" 
                           href="<?=ABSOLUTE_PATH . $menuItem["name"]?>"><?=$menuItem["title"]?></a>
                    </li>
                <?php endforeach ?> 
                <p class="clear"/>
            </ul>
            <p class="clear"/>
        </div>
        <div id="content">
            <h1><?=$this->title?></h1>
            <p><?=$this->content?></p>    
        </div>
        <div id="footer">
            <p>&COPY; <?=date('Y')?> Mandola. Visos teisės saugomos.</p>
        </div>
    </div>
</body>
</html>
