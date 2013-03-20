<form action="<?=ABSOLUTE_PATH?>page/update" method="post" xmlns="http://www.w3.org/1999/html">
    <?php $this->render_view("page/form.php") ?>
    <input type="hidden" name="id" value="<?=$this->id?>"/>
    <input type="submit" value="<?=_("Submit")?>" class="btn"/><br/>
</form>
<a href="<?=ABSOLUTE_PATH?>page/history/<?=$this->id?>"><?=_("History")?></a>

<script src="<?=ABSOLUTE_PATH?>ckeditor/ckeditor.js"></script>