<?php
if ($_POST[login] && $_POST[oldpw] && $_POST[newpw] && $_POST[submit] == "OK" && file_exists("../private/passwd"))
{
	$passwords = unserialize(file_get_contents("../private/passwd"));
	foreach ($passwords as $key => $entry)
		if ($entry[login] == $_POST[login])
		{
			if ($entry[passwd] == hash("SHA256", $_POST[oldpw]))
			{
				$passwords[$key][passwd] = hash("SHA256", $_POST[newpw]);
				file_put_contents("../private/passwd", serialize($passwords));
				echo "OK\n";
			}
			else
				echo "ERROR\n";
			return ;
		}
}
echo "ERROR\n";
?>
