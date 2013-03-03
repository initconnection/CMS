<html>
	<body>
		<h1><?=$this->title?></h1>
		<ul>
			<?php foreach ($this->users as $user) :?>
			<li><?=$user["username"]?>, <?=$user["password"]?></li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>