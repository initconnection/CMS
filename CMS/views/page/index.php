<ul id="categories" class="unstyled">
    
    <?php foreach ($this->categories as $category): ?>
        <li><?=$category["title"]?></li>
        <ul class="unstyled">
            <?php foreach ($category["pages"] as $page): ?>
            <li>
                <a href="<?=ABSOLUTE_PATH?>page/update/<?=$page["id"]?>"><?=$page["title"]?></a>
                <a href="<?=ABSOLUTE_PATH?>page/up/<?=$page["id"]?>"><i class="icon-arrow-up"></i></a>
                <a href="<?=ABSOLUTE_PATH?>page/down/<?=$page["id"]?>"><i class="icon-arrow-down"></i></a>
                <a href="<?=ABSOLUTE_PATH?>page/delete/<?=$page["id"]?>"><i class="icon-remove"></i></a>
            </li>
            <?php endforeach; ?>
            <li class="create"><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?>page/create/<?=$category["id"]?>"><?=_("New page")?></a></li>
        </ul>
    <?php endforeach; ?>    
    <li class="create"><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?>category/create"><?=_("New category")?></a></li>
</ul>