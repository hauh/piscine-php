<?php
if ($_POST[login] && $_POST[passwd] && $_POST[submit] == "OK")
{
	if (file_exists("../private/passwd"))
	{
		$passwords = unserialize(file_get_contents("../private/passwd"));
		foreach ($passwords as $entry)
			if ($entry[login] == $_POST[login])
				{
					echo "ERROR\n";
					return ;
				}
	}
	else
	{
		if (!file_exists("../private"))
			mkdir("../private");
		file_put_contents("../private/passwd", NULL);
	}
	$new[login] = $_POST[login];
	$new[passwd] = hash("SHA256", $_POST[passwd]);
	$passwords[] = $new;
	file_put_contents("../private/passwd", serialize($passwords));
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
