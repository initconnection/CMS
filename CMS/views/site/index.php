<form action="<?=ABSOLUTE_PATH?>site/index" method="post" xmlns="http://www.w3.org/1999/html">

    <label for="homePage"><?=_("Home page")?></label>
    <select id="homePage" name="homePage">
    <?php foreach ($this->pages as $page): ?>
        <option value="<?=$page["id"]?>"
            <?=($page["id"] == $this->homePage) ? "selected" : NULL?>>
            <?=$page["title"]?>
        </option>
    <?php endforeach ?>
    </select><br/>
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>