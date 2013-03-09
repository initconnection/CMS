<p>
    <a href="<?=ABSOLUTE_PATH?>page/create">Create a new page</a>
</p>
<ul>
    <?php foreach ($this->pages as $page) :?>
    <li><a href="<?=ABSOLUTE_PATH?>page/update/<?=$page["id"]?>"><?=$page["title"]?></a></li>
    <?php endforeach; ?>
</ul>