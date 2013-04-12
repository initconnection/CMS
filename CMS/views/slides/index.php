<a href="<?=ABSOLUTE_PATH?>slides/create/<?=$this->id?>"><?=_("Insert new")?></a> 
<ul>
    <?php foreach($this->slides as $slide) : ?>
    <li>
        <a href="<?=ABSOLUTE_PATH?>slides/update/<?=$slide["id"]?>">
            <img src="<?=ABSOLUTE_SITE_PATH."upload/thumbnails/".$slide["file"]?>" alt="<?=$slide["title"]?>"/>
        </a>
    </li>
    <?php endforeach ?>
</ul>