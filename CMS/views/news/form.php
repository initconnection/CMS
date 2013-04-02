    <label for="heading"><?=_("Heading")?></label>
    <input type="text" id="heading" name="heading" value="<?=$this->heading?>" /> <br/>
    <textarea class="ckeditor" name="content"><?=$this->content?></textarea>
    <button id="showPages" class="btn"><?=_("Assign to pages")?></button> <br />
    <div id="pages">
    <?php foreach ($this->newsPages as $page): ?>
        <label for="<?=$page["id"]?>"><?=$page["title"]?></label>
        <input value="1" type="checkbox" id="<?=$page["id"]?>" name="page[<?=$page["id"]?>]"
        <?php if($this->pageId == $page["id"] || 
                ($this->selectedPages && in_array($page["id"], $this->selectedPages))): ?>
            checked
        <?php endif; ?> />
    <?php endforeach ?>
    </div>