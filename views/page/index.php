<ul>
    <?php foreach ($this->pages as $page) :?>
        <li><?=$page["title"]?>, <?=$page["content"]?></li>
    <?php endforeach; ?>
</ul>