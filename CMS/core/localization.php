<?php
  $locale = "lt_LT";
  if (isSet($_GET["locale"])) $locale = $_GET["locale"];
  putenv("LC_ALL=$locale");
  setlocale(LC_ALL, $locale);
  bindtextdomain("messages", "./locale");
  textdomain("messages");
?>

