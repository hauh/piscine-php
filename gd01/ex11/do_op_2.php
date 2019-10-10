#!/usr/bin/php
<?php
if ($argc == 2)
{
	if (($oper = strpos($argv[1], "+")))
	{
		$arr = explode("+", trim($argv[1]));
		print($arr[0] + $arr[1]);
	}
	else if (($oper = strpos($argv[1], "-")))
	{
		$arr = explode("-", trim($argv[1]));
		print($arr[0] - $arr[1]);
	}
	else if (($oper = strpos($argv[1], "*")))
	{
		$arr = explode("*", trim($argv[1]));
		print($arr[0] * $arr[1]);
	}
	else if (($oper = strpos($argv[1], "/")))
	{
		$arr = explode("/", trim($argv[1]));
		print($arr[0] / $arr[1]);
	}
	else if (($oper = strpos($argv[1], "%")))
	{
		$arr = explode("%", trim($argv[1]));
		print($arr[0] % $arr[1]);
	}
}
else
	print("Incorrect Parameters");
print("\n");
?>
