<?php
class Vertex
{
	public static	$verbose = FALSE;
	private	$_x = 0.0;
	private	$_y = 0.0;
	private	$_z = 0.0;
	private	$_w = 1.0;
	private	$_c;

	public function	__construct(array $wkargs)
	{
		if (array_key_exists('x', $wkargs))
			$this->_x = $wkargs['x'];
		if (array_key_exists('y', $wkargs))
			$this->_y = $wkargs['y'];
		if (array_key_exists('z', $wkargs))
			$this->_z = $wkargs['z'];
		if (array_key_exists('w', $wkargs))
			$this->_w = $wkargs['w'];
		if (array_key_exists('color', $wkargs))
			$this->_c = $wkargs['color'];
		else
			$this->_c = new Color(array('rgb' => 0xffffff));
		if (Vertex::$verbose)
			echo "$this constructed.\n";
	}
	
	public static function	doc()
	{
		if (file_exists("Vertex.doc.txt"))
			return(file_get_contents("Vertex.doc.txt"));
	}

	public function	__toString()
	{
		return (sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s )",
					$this->_x, $this->_y, $this->_z, $this->_w, $this->_c));
	}
	
	public function	__destruct()
	{
		if (Vertex::$verbose)
			echo "$this destructed.\n";
	}
}
?>
