<ul id="categories" class="unstyled">
    
    <?php foreach ($this->categories as $category): ?>
        <li>
            <?=$category["title"]?>
            <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/category/delete/<?=$category["id"]?>"><i class="icon-remove"></i></a>
        </li>
        <ul class="category unstyled">
            <?php foreach ($category["pages"] as $page): ?>
            <li>
                <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/<?=$page["moduleName"]?>/update/<?=$page["id"]?>"><?=$page["title"]?></a>
                <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/page/up/<?=$page["id"]?>/<?=$category["id"]?>"><i class="icon-arrow-up"></i></a>
                <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/page/down/<?=$page["id"]?>/<?=$category["id"]?>"><i class="icon-arrow-down"></i></a>
                <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/page/delete/<?=$page["id"]?>/<?=$category["id"]?>"><i class="icon-remove"></i></a>
                <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/subpage/create/<?=$page["id"]?>"><i class="icon-plus"></i></a>
                <?php $this->render_part("page/subpage.php", array("page" => $page)) ?>
            </li>
            <?php endforeach ?>
            <li class="create"><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/page/create/<?=$category["id"]?>"><?=_("New page")?></a></li>
        </ul>
    <?php endforeach ?>
    <li class="create"><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/category/create"><?=_("New category")?></a></li>
</ul>

<?=_("Pages without category")?>
<ul class="category unstyled">
    <?php foreach ($this->pages as $page): ?>
    <li>
        <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/page/update/<?=$page["id"]?>"><?=$page["title"]?></a>
        <a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/page/delete/<?=$page["id"]?>"><i class="icon-remove"></i></a>
        <?php $this->render_part("page/subpage.php", array("page" => $page)) ?>
    </li>
    <?php endforeach; ?>
    <li class="create"><i class="icon-plus"></i><a href="<?=ABSOLUTE_PATH?><?=$this->lang?>/page/create"><?=_("New page")?></a></li>       
</ul>