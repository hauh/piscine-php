<?php
class Targaryen
{
	protected function resistsFire() {
		return False;
	}

	public function getBurned() {
		if ($this->resistsFire())
			return "emerges naked but unharmed";
		else
			return "burns alive";
	}
}
?>
