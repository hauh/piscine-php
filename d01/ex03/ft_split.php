<?php
function ft_split($string)
{
	$arr = preg_split("/[\s]+/", $string, 0, PREG_SPLIT_NO_EMPTY);
	sort($arr);
	return ($arr);
}
?>
