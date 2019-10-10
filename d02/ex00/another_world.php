#!/usr/bin/php
<?php
if ($argc > 1)
	print(preg_replace("/[\h]+/", " ", trim($argv[1], " \t"))."\n");
?>
