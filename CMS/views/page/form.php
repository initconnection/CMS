    <label for="title"><?=_("Title")?></label>
    <input type="text" id="title" name="title" value="<?=$this->title?>" /> <br/>
    <textarea id="content" name="content"><?=$this->content?></textarea>
    <script>
        var editor = CKEDITOR.replace('content', 
        {
            width: 572 + 50,
			height: 400,
        });
    </script>
    <button id="showOptional" class="btn"><?=_("Options")?></button>
    <div id="pageOptions">
        <h2><?=_("Page setup")?></h2>
        <p>
            <label for="description"><?=_("Description")?></label>
            <textarea name="description" id="description" cols="50" rows="2"><?=$this->description?></textarea><br />
            <label for="keywords"><?=_("Keywords")?></label>
            <input name="keywords" id="keywords" value="<?=$this->keywords?>" /><br />
            <label for="module"><?=_("Module")?></label>
            <select name="module" id="module">
            <?php foreach($this->allModules as $module): ?>
                <option value="<?=$module["id"]?>"
                    <?=($module["id"] == $this->module) ? "selected" : NULL?> >       
                <?=$module["title"]?></option>
             <?php endforeach ?>
            </select><br />
            <label for="category0"><?=_("Categories")?></label>
            <select name="category0" id="category0">
                <?php foreach($this->allCategories as $category): ?>
                    <option value="<?=$category["id"]?>"
                    <?php if ($this->categories): ?>
                        <?=($category["id"] == $this->categories[0]) ? "selected" : NULL?>
                    <?php endif; ?> >
                        <?=$category["title"]?>
                    </option>
                <?php endforeach ?>
            </select> <br />
            <?php for ($i = 1; $i < count($this->categories); $i++): ?>
            <select name="category<?=$i?>" id="category<?=$i?>">
                <?php foreach($this->allCategories as $category): ?>
                    <option value="<?=$category["id"]?>"
                        <?=($category["id"] == $this->categories[$i]) ? "selected" : NULL?>>
                        <?=$category["title"]?>
                    </option>
                <?php endforeach ?>
            </select> <br />
            <?php endfor; ?>
            <button id="addCategory" class="btn"><?=_("Add category")?></button>
        </p>
    </div>