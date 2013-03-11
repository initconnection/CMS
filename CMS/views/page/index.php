<ul id="categories" class="unstyled">
    
    <?php foreach ($this->categories as $category): ?>
        <li><?=$category["title"]?></li>
        <ul class="unstyled">
            <?php foreach ($category["pages"] as $page): ?>
            <li><a href="<?=ABSOLUTE_PATH?>page/update/<?=$page["id"]?>"><?=$page["title"]?></a></li>
            <?php endforeach; ?>
            <li class="create"><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?>page/create/<?=$category["id"]?>">Create a new page</a></li>
        </ul>
    <?php endforeach; ?>    
    <li class="create"><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?>category/create">Create a new category</a></li>
</ul>