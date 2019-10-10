#!/usr/bin/php
<?php
if ($argc == 2)
	print(preg_replace("/[\s]+/", " ", trim($argv[1], " "))."\n");
?>
