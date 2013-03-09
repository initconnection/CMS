<form action="<?=ABSOLUTE_PATH?>page/create" method="post" xmlns="http://www.w3.org/1999/html">
    <label for="title">Title</label> <br/>
    <input type="text" id="title" name="title" value="<?=$this->title?>" /> <br/>
    <label for="title">Content</label> <br/>
    <textarea class="ckeditor" name="content"><?=$this->content?></textarea>

    <div id="pageOptions">
        <h2>Page setup</h2>
        <p>
            Page description:<br />
            <textarea name="description" cols="50" rows="2"><?=$this->description?></textarea><br />
            Page keywords:<br />
            <input name="keywords" value="<?=$this->keywords?>" /><br />
            Page module:<br />
            <select name="module">
                <option value="1">Module 1</option>
            </select>
        </p>
    </div>
    <input type="submit" value="Submit"/>
</form>

<script src="<?=ABSOLUTE_PATH?>ckeditor/ckeditor.js"></script>