<a href="<?=ABSOLUTE_PATH?>gallery/create/<?=$this->id?>"><?=_("Insert new")?></a> 
<ul>
    <?php foreach($this->images as $image) : ?>
    <li>
        <a href="<?=ABSOLUTE_PATH?>gallery/update/<?=$image["id"]?>">
            <img src="<?=ABSOLUTE_SITE_PATH."upload/thumbnails/".$image["file"]?>" alt="<?=$image["title"]?>"/>
        </a>
    </li>
    <?php endforeach ?>
</ul>