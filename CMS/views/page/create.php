<div id="right-panel">
	<label for="module"><?=_("Module")?></label>
		<select name="module" id="module">
		<?php foreach($this->allModules as $module): ?>
			<option value="<?=$module["id"]?>"
				<?=($module["id"] == $this->module) ? "selected" : NULL?> >       
			<?=$module["title"]?></option>
		 <?php endforeach ?>
		</select><br />
	<label for="description"><?=_("Description")?></label>
	<textarea name="description" id="description" cols="50" rows="2"><?=$this->description?></textarea><br />
	<label for="keywords"><?=_("Keywords")?></label>
	<input name="keywords" id="keywords" value="<?=$this->keywords?>" /><br />
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
	<br/>
	<button id="save" class="btn"><?=_("Save")?></button>
</div>

<div id="container">
	<h2>
		<div id="title" contenteditable="true">
		<?=_("Title")?>
		</div>
	</h2>
	<div id="content" contenteditable="true">
		<?=_("Content")?>
	</div>
</div>


<script>

	$("#save").click(function() {
		var title = $("#title").html();
		var content = $("#content").html();
		var module = $("#module").val();
		var description = $("#description").val();
		var keywords = $("#keywords").val();
		var categoriesArray = new Array();
		var categories = $('select[id^="category"]');
		categories.each(function() {
			categoriesArray.push(this.value);
		});
		
		$("#loading").show();
		
		setTimeout(function(){
			$.ajax({
				type: "POST",
				url: "<?=ABSOLUTE_PATH?>page/create",
				data: "title=" + title + "&content=" + content +
					"&module=" + module + "&description=" + description + 
					"&keywords=" + keywords + "&categories=" + categoriesArray,
				success: function(msg) {
					$("#loading").hide();
					$("#saved").fadeIn("slow").delay(1000).fadeOut("slow");
				}
				
			});
		}, 250);
	});
	
	CKEDITOR.inline('title', {
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P
	} );
	
</script>