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
</div>

<div id="container">
	<h2>
		<div id="title" contenteditable="true">
		<?=$this->title?>
		</div>
	</h2>
	<div id="content" contenteditable="true">
		<?=$this->content?>
	</div>
</div>

<script>
	
	CKEDITOR.inline('content', {
		on: {
			blur: function(event) {
				var data = event.editor.getData();
				$.ajax({
					type: "POST",
					url: "<?=ABSOLUTE_PATH?>page/update",
					data: "id=<?=$this->id?>&content=" + data,
					success: function(msg){
						$("#saved").fadeIn("slow").delay(2000).fadeOut("slow");
					}
				});
			}
		}
	} );
	
	CKEDITOR.inline('title', {
		on: {
			blur: function(event) {
				var data = event.editor.getData();
				$.ajax({
					type: "POST",
					url: "<?=ABSOLUTE_PATH?>page/update",
					data: "id=<?=$this->id?>&title=" + data,
					success: function(msg){
						$("#saved").fadeIn("normal").delay(3000).fadeOut("normal");
					}
				});
			}
		},
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P
	} );
	
</script>