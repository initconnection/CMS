<h2>
    <?=$this->title?>
</h2>
<?php foreach ($this->subpages as $subpage): ?>
<ul>
    <li><a href="<?=ABSOLUTE_PATH?><?=$this->url?>/<?=$subpage["name"]?>"><?=$subpage["title"]?></a></li>
</ul>
<?php endforeach ?>
<p>
    <?=$this->content?>
</p>