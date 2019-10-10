#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Moscow');
$file = file_get_contents("/var/run/utmpx");
$file = substr($file, 1256);
while (strlen($file) >= 628)
{
	$name = unpack("A256name/A4id/A32line/lpid/ltype/ltime", $file);
	$date = date("M d H:i", $name[time]);
	print("$name[name]\t$name[line]\t$date\n");
	$file = substr($file, 628);
}
?>
