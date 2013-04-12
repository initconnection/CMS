<a href="<?=ABSOLUTE_PATH?>news/create/<?=$this->id?>"><?=_("Insert new")?></a>
<ul>
    <?php foreach($this->news as $new) : ?>
    <li><a href="<?=ABSOLUTE_PATH?>news/update/<?=$new["id"]?>"><?=$new["heading"]?></a></li>
    <?php endforeach ?>
</ul>
<a href="<?=ABSOLUTE_PATH?>page/update/<?=$this->id?>"><?=_("Edit page content")?></a>