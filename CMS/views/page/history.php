<ul>
    <?php foreach ($this->pages as $page): ?>
    <li><a href="<?=ABSOLUTE_PATH?>page/version/<?=$page["id"]."/".$page["version"]?>"><?=$page["date"]?></a></li>
    <?php endforeach;?>
</ul>