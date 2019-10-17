<?php
class Tyrion extends Lannister
{
	public function sleepWith($person)
	{
		if (get_class($person) == "Jaime" || get_class($person) == "Cersei")
			echo "Not even if I'm drunk !".PHP_EOL;
		else if (get_class($person) == "Sansa")
			echo "Let's do this.".PHP_EOL;
	}
}
?>
