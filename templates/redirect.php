<?php header("Location: ". $this->location); exit; ?>
<html>
    <body>
        <h1><?=$this->title?></h1>
        <a href="<?=$this->location?>">Press here if you are not redirected automatically.</a>
    </body>
</html>