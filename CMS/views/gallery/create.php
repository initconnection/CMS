<form action="<?=ABSOLUTE_PATH?>gallery/create" method="post" xmlns="http://www.w3.org/1999/html">
    <?php $this->render_view("gallery/form.php") ?>
    <input type="hidden" name="pageId" value="<?=$this->pageId?>"/>
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>