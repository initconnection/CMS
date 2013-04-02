<form action="<?=ABSOLUTE_PATH?>news/create" method="post" xmlns="http://www.w3.org/1999/html">
    <?php $this->render_view("news/form.php") ?>
    <input type="hidden" name="pageId" value="<?=$this->pageId?>"/>
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>

<script src="<?=ABSOLUTE_PATH?>ckeditor/ckeditor.js"></script>