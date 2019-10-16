<?php

require_once ("Color.class.php");

class Vertex
{
	public static	$verbose = FALSE;
	private	$_x = 0.0;
	private	$_y = 0.0;
	private	$_z = 0.0;
	private	$_w = 1.0;
	private	$_c;

	public function	__construct(array $kwargs)
	{
		if (array_key_exists('x', $kwargs))
			$this->_x = $kwargs['x'];
		if (array_key_exists('y', $kwargs))
			$this->_y = $kwargs['y'];
		if (array_key_exists('z', $kwargs))
			$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_c = $kwargs['color'];
		else
			$this->_c = new Color(array('rgb' => 0xffffff));
		if (Self::$verbose)
			echo "$this constructed.\n";
	}

	public function	getX() {
		return ($this->_x);
	}

	public function	getY() {
		return ($this->_y);
	}

	public function	getZ() {
		return ($this->_z);
	}

	public function	getW() {
		return ($this->_w);
	}

	public function	getColor() {
		return ($this->_c);
	}

	public function	setX(float $new_x) {
		$thix->_x = $new_x;
	}

	public function	setY(float $new_y) {
		$thix->_y = $new_y;
	}

	public function	setZ(float $new_z) {
		$thix->_z = $new_z;
	}

	public function	setW(float $new_w) {
		$thix->_w = $new_w;
	}

	public function	setColor(Color $new_c) {
		$thix->_c = $new_c;
	}

	public static function	doc()
	{
		if (file_exists("Vertex.doc.txt"))
			return(file_get_contents("Vertex.doc.txt"));
	}

	public function	__toString()
	{
		return (Self::$verbose ?
			sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s )",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_c) :
			sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f )",
						$this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function	__destruct()
	{
		if (Self::$verbose)
			echo "$this destructed.\n";
	}
}
?>
