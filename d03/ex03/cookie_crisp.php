<?php
if ($_GET[name])
{
	if ($_GET[action] == "set")
		setcookie($_GET[name], $_GET[value], time() + 7200);
	else if ($_GET[action] == "get" && $_COOKIE[$_GET[name]])
		echo $_COOKIE[$_GET[name]].PHP_EOL;
	else if ($_GET[action] == "del")
		setcookie($_GET[name], "", time() - 1);
}
?>
