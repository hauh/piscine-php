#!/usr/bin/php
<?php
if ($argc == 4)
{
	$oper = trim($argv[2]);
	if ($oper == "+")
		print(trim($argv[1]) + trim($argv[3]));
	else if ($oper == "-")
		print(trim($argv[1]) - trim($argv[3]));
	else if ($oper == "*")
		print(trim($argv[1]) * trim($argv[3]));
	else if ($oper == "/")
		print(trim($argv[1]) / trim($argv[3]));
	else if ($oper == "%")
		print(trim($argv[1]) % trim($argv[3]));
	}
else
	print("Incorrect Parameters");
print("\n");
?>
