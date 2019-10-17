<?php
class Jaime extends Lannister
{
	public function sleepWith($person)
	{
		if (get_class($person) == "Tyrion")
			echo "Not even if I'm drunk !".PHP_EOL;
		else if (get_class($person) == "Sansa")
			echo "Let's do this.".PHP_EOL;
		else if (get_class($person) == "Cersei")
			echo "With pleasure, but only in a tower in Winterfell, then.".PHP_EOL;
	}
}
?>
