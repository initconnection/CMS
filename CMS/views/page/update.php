<form action="<?=ABSOLUTE_PATH?>page/update" method="post" xmlns="http://www.w3.org/1999/html">
    <?php $this->render_view("page/form.php") ?>
    <input type="hidden" name="id" value="<?=$this->id?>"/>
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>

<script src="<?=ABSOLUTE_PATH?>ckeditor/ckeditor.js"></script>