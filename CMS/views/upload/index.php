<form action="<?=ABSOLUTE_PATH?>upload/index" enctype="multipart/form-data" method="post" xmlns="http://www.w3.org/1999/html">

    <label for="file"><?=_("File name")?></label>
    <input type="file" name="file" id="file" value=""> <br/>
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>

    <h3><?=_("Uploaded files")?></h3>
    <ul>
    <?php foreach($this->uploadedFiles as $file): ?>
        <li>
            <a href="<?=ABSOLUTE_SITE_PATH?>upload/<?=$file["file"]?>" rel="lightbox" title="my caption">
                <img src="<?=ABSOLUTE_SITE_PATH?>upload/thumbnails/<?=$file["file"]?>" alt=""/><br />
                <?=$file["file"]?>
            </a>
            <a href="<?=ABSOLUTE_PATH?>upload/delete/<?=$file["id"]?>"><i class="icon-remove"></i></a>
        </li>
    <?php endforeach ?>
    </ul>
</form>