<?php
session_start();
if ($_GET[login] && $_GET[passwd] && $_GET[submit] == "OK")
{
	$_SESSION[login]= $_GET[login];
	$_SESSION[passwd]= $_GET[passwd];
}
?>
<html><body>
	<form name="index.php" action="." metod="GET">
		Username: <input type="text" name="login" value="<?=$_SESSION[login]?>"/>
		<br />
		Password: <input type="password" name="passwd" value="<?=$_SESSION[passwd]?>"/>
		<br />
		<input type="submit" name="submit" value="OK" />
	</form>
</body></html>
