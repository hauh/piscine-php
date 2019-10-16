<?php

require_once ("Vertex.class.php");

class Vector
{
	public static	$verbose = FALSE;
	private	$_x = 0.0;
	private	$_y = 0.0;
	private	$_z = 0.0;
	private	$_w = 0.0;

	public function	__construct(array $kwargs)
	{
		if (array_key_exists('dest', $kwargs))
		{
			$orig = array_key_exists('orig', $kwargs) ? $kwargs['orig']
					: new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0));
			$this->_x = $kwargs['dest']->getX() - $orig->getX();
			$this->_y = $kwargs['dest']->getY() - $orig->getY();
			$this->_z = $kwargs['dest']->getZ() - $orig->getZ();
		}
		if (Self::$verbose)
			echo "$this constructed.\n";
	}

	public function magnitude() {
		return (sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2));
	}

	public function normalize()
	{
		$magn = $this->magnitude();
		$dest = new Vertex(array('x' => $this->_x / $magn,
								'y' => $this->_y / $magn,
								'z' => $this->_z / $magn));
		return (new Vector(array('dest' => $dest)));
	}

	public function add(Vector $rhs)
	{
		$dest = new Vertex(array('x' => $this->_x + $rhs->_x,
								'y' => $this->_y + $rhs->_y,
								'z' => $this->_z + $rhs->_z));
		return (new Vector(array('dest' => $dest)));
	}

	public function sub(Vector $rhs)
	{
		$dest = new Vertex(array('x' => $this->_x - $rhs->_x,
								'y' => $this->_y - $rhs->_y,
								'z' => $this->_z - $rhs->_z));
		return (new Vector(array('dest' => $dest)));
	}
	
	public function scalarProduct($k)
	{
		$dest = new Vertex(array('x' => $this->_x * $k,
								'y' => $this->_y * $k,
								'z' => $this->_z * $k));
		return (new Vector(array('dest' => $dest)));
	}

	public function	opposite() {
		return ($this->scalarProduct(-1));
	}

	public function	dotProduct(Vector $rhs) {
		return ($this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z);
	}

	public function	cos(Vector $rhs) {
		return ($this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()));
	}

	public function crossProduct(Vector $rhs)
	{
		$x = $this->_y * $rhs->_z - $this->_z * $rhs->_y;
		$y = $this->_z * $rhs->_x - $this->_x * $rhs->_z;
		$z = $this->_x * $rhs->_y - $this->_y * $rhs->_x;
		$dest = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		return (new Vector(array('dest' => $dest)));
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

	public static function	doc()
	{
		if (file_exists("Vector.doc.txt"))
			return(file_get_contents("Vector.doc.txt"));
	}

	public function	__toString()
	{
		return (sprintf("Vector( x: %.2f, y: %.2f, z: %.2f, w: %.2f )",
						$this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function	__destruct()
	{
		if (Self::$verbose)
			echo "$this destructed.\n";
	}
}
?>