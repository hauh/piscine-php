#!/usr/bin/php
<?php
$arr = "";
for ($i = 1; $i < $argc; $i++)
	$arr .= " ".$argv[$i];
$arr = preg_split("/[\s]+/", $arr, 0, PREG_SPLIT_NO_EMPTY);
sort($arr);
$size = count($arr);
for ($i = 0; $i < $size; $i++)
	print("$arr[$i]\n");
?>
