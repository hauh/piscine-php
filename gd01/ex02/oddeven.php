#!/usr/bin/php
<?php
while (1)
{
	print("Enter a number: ");
	$input = fgets(STDIN);
	if ($input)
	{
		$input = substr($input, 0, -1);
		$value = $input;
		if ($value == "0" || ($value = filter_var($value, FILTER_VALIDATE_INT)))
			print("The number $value is " . ($input % 2 ? "odd\n" : "even\n"));
		else
			print("'$input' is not a number\n");
	}
	else
		break ;
}
print("\n");
?>
