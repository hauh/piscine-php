<?php
class NightsWatch
{
	private $_members = [];

	public function recruit($new) {
		$this->_members[] = $new;
	}

	public function fight()
	{
		foreach ($this->_members as $fighter)
			if (method_exists($fighter, "fight"))
				$fighter->fight();
	}
}
?>
