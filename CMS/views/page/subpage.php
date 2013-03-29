<ul>
    <?php foreach ($params["page"]["subpages"] as $subpage): ?>
    <li>
        <a href="<?=ABSOLUTE_PATH?>subpage/update/<?=$subpage["id"]?>"><?=$subpage["title"]?></a>
        <a href="<?=ABSOLUTE_PATH?>subpage/up/<?=$subpage["id"]?>/<?=$subpage["parent"]?>"><i class="icon-arrow-up"></i></a>
        <a href="<?=ABSOLUTE_PATH?>subpage/down/<?=$subpage["id"]?>/<?=$subpage["parent"]?>"><i class="icon-arrow-down"></i></a>
        <a href="<?=ABSOLUTE_PATH?>subpage/delete/<?=$subpage["id"]?>/<?=$subpage["parent"]?>"><i class="icon-remove"></i></a>
        <a href="<?=ABSOLUTE_PATH?>subpage/create/<?=$subpage["id"]?>"><i class="icon-plus"></i></a>
        <?php $this->render_part("page/subpage.php", array("page" => $subpage)) ?>
    </li>
    <?php endforeach; ?>
</ul>