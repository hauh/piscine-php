<?php
function ft_is_sort($array)
{
	$sorted = $array;
	sort($sorted);
	return ($array === $sorted);
}
?>
