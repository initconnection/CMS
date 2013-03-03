<?php

	function require_file($filePath) {
		@require_once(ROOT_PATH . $filePath);
	}
?>
