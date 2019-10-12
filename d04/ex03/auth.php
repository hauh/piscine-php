<?php
function auth($login, $passwd)
{
	if (file_exists("../private/passwd") && $login && $passwd)
		if (($passwords = unserialize(file_get_contents("../private/passwd"))))
			foreach ($passwords as $entry)
				if ($entry[login] == $login)
					return ($entry[passwd] == hash("SHA256", $passwd) ? TRUE : FALSE);
	return (FALSE);
}
?>
