#!/usr/bin/php
<?php
if ($argc > 1)
{
	$arr = preg_split("/[\s]+/", trim($argv[1], " "), 0, PREG_SPLIT_NO_EMPTY);
	if (($size = count($arr)))
	{
		print($arr[--$size]."\n");
		for ($i = 0; $i < $size; $i++)
			print("$arr[$i]\n");
	}
}
?>
