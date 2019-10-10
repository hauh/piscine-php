#!/usr/bin/php
<?php
if ($argc > 1)
{
	setlocale(LC_TIME, "fr_FR");
	date_default_timezone_set('Europe/Paris');
	if (preg_match("/^[A-Za-z]+ [0-9]{1,2} [A-Za-z]+ [0-9]{4} ([0-9]{2}:[0-9]{2}:[0-9]{2})$/", $argv[1])
		&& ($time = strptime($argv[1], "%A %e %B %Y %H:%M:%S")))
		print(mktime($time[tm_hour], $time[tm_min], $time[tm_sec],
			$time[tm_mon] + 1, $time[tm_mday], $time[tm_year] + 1900, -1));
	else
		print("Wrong Format\n");
}
?>
