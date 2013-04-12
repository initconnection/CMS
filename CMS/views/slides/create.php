<form action="<?=ABSOLUTE_PATH?>slides/create" enctype="multipart/form-data" method="post" xmlns="http://www.w3.org/1999/html">
    <?php $this->render_view("slides/form.php") ?>
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>