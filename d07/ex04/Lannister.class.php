<?php
class Lannister
{
	public function sleepWith($person)
	{
		if (get_class($person) == "Jaime"
			|| get_class($person) == "Cersei"
			|| get_class($person) == "Tyrion")
			echo "Not even if I'm drunk !".PHP_EOL;
		else if (get_class($person) == "Sansa")
			echo "Let's do this.".PHP_EOL;
	}
}
?>
