<form action="<?=ABSOLUTE_PATH?>category/create" method="post" xmlns="http://www.w3.org/1999/html">
    <label for="title"><?=_("Title")?></label>
    <input type="text" id="title" name="title" value="<?=$this->title?>" /> <br/>
    
    <input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>
