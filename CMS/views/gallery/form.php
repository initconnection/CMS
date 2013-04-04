    <label for="heading"><?=_("URL")?></label>
    <input type="file" name="file" id="file" value=""> <br/>
    <label for="title"><?=_("Title")?></label>
    <input type="text" id="title" name="title" value="<?=$this->title?>" /> <br/>
    <button id="showPages" class="btn"><?=_("Assign to pages")?></button> <br />
    <div id="pages">
    <?php foreach ($this->galleryPages as $page): ?>
        <label for="<?=$page["id"]?>"><?=$page["title"]?></label>
        <input value="1" type="checkbox" id="<?=$page["id"]?>" name="page[<?=$page["id"]?>]"
        <?php if($this->pageId == $page["id"] || 
                ($this->selectedPages && in_array($page["id"], $this->selectedPages))): ?>
            checked
        <?php endif; ?> />
    <?php endforeach ?>
    </div>