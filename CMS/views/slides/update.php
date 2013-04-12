<form action="<?=ABSOLUTE_PATH?>slides/update" enctype="multipart/form-data" method="post" xmlns="http://www.w3.org/1999/html">
    <img src="<?=ABSOLUTE_SITE_PATH?>upload/thumbnails/<?=$this->image?>" alt="<?=$this->title?>" />
    <?php $this->render_view("slides/form.php") ?>
    <input type="hidden" name="id" value="<?=$this->id?>" />
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>