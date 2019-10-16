<?php
class Tyrion extends Lannister
{
	public function __construct()
	{
		Parent::__construct();
		echo "My name is " . Self::class . PHP_EOL;
	}
	public function	getSize() {
		return ("Short");
	}
}
?>
