<?php
class UnholyFactory
{
	private $_fighters = [];

	public function absorb($next)
	{
		if ($next instanceof Fighter == FALSE)
			echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
		else
		{
			$k = $next->__toString();
			if (isset($this->_fighters[$k]))
				echo "(Factory already absorbed a fighter of type $k)".PHP_EOL;
			else
			{
				$this->_fighters[$k] = $next;
				echo "(Factory absorbed a fighter of type $k)".PHP_EOL;
			}
		}
	}

	public function fabricate($name)
	{
		if (isset($this->_fighters[$name]))
		{
			echo "(Factory fabricates a fighter of type $name)".PHP_EOL;
			return (clone $this->_fighters[$name]);
		}
		echo "(Factory hasn't absorbed any fighter of type $name)".PHP_EOL;
	}
}
?>
