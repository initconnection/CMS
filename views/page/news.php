<h2>
    <?=$this->title?>
</h2>
<?php foreach($this->news as $news): ?>
    <h3><?=$news["heading"]?></h3>
    <p><?=$news["content"]?></p>
<?php endforeach ?>