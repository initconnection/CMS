<ul>
	<?php foreach ($this->users as $user) :?>
	<li><?=$user["username"]?>, <?=$user["password"]?></li>
	<?php endforeach; ?>
</ul>