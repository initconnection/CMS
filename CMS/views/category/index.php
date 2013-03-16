<ul id="categories" class="unstyled">
<?php foreach ($this->categories as $category) :?>
    <li><a href="<?=ABSOLUTE_PATH?>category/update/<?=$category["id"]?>"><?=$category["title"]?></a></li>
<?php endforeach; ?>
</ul>
<span><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?>category/create"><?=_("New category")?></a></span>