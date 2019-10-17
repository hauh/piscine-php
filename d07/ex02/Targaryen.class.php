<?php
class Targaryen
{
	protected function	resistsFire() {
		return (False);
	}

	public function		getBurned() {
		return ($this->resistsFire() ?
					"emerges naked but unharmed" :
					"burns alive");
	}
}
?>
