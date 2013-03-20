<ul>
    <?php foreach ($this->pages as $page): ?>
    <li><a href="<?=ABSOLUTE_PATH?>page/history/<?=$page["id"]."/".$page["version"]?>"><?=$page["date"]?></a></li>
    <?php endforeach;?>
</ul>