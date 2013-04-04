<h2>
    <?=$this->title?>
</h2>
<ul>
<?php foreach($this->gallery as $image): ?>
    <li>
        <a href="<?=ABSOLUTE_PATH . "upload/" . $image["file"]?>" rel="lightbox[gallery]" >
            <img src="<?=ABSOLUTE_PATH . "upload/thumbnails/" . $image["file"]?>" alt="<?=$image["title"]?>"/>
        </a>
    </li>
<?php endforeach ?>
</ul>