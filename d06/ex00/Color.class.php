<?php
class Color
{
	public static	$verbose = FALSE;
	public	$red = 0;
	public	$green = 0;
	public	$blue = 0;

	public function	__construct(array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$val = (int)$kwargs['rgb'];
			$this->red = ($val >> 16) & 0xff;
			$this->green = ($val >> 8) & 0xff;
			$this->blue = $val & 0xff;
		}
		else
		{
			if (array_key_exists('red', $kwargs))
				$this->red = (int)$kwargs['red'];	
			if (array_key_exists('green', $kwargs))
				$this->green = (int)$kwargs['green'];	
			if (array_key_exists('blue', $kwargs))
				$this->blue = (int)$kwargs['blue'];	
		}
		if (Color::$verbose)
			echo "$this constructed.\n";
	}

	public function add(Color $rhs)
	{
		$r = $this->red + $rhs->red;
		$g = $this->green + $rhs->green;
		$b = $this->blue + $rhs->blue;
		return (new Color(array('red' => $r, 'green' => $g, 'blue' => $b)));
	}
	
	public function	sub(Color $rhs)
	{
		$r = $this->red - $rhs->red;
		$g = $this->green - $rhs->green;
		$b = $this->blue - $rhs->blue;
		return (new Color(array('red' => $r, 'green' => $g, 'blue' => $b)));
	}
	
	public function	mult($f)
	{
		$r = $this->red * $f;
		$g = $this->green * $f;
		$b = $this->blue * $f;
		return (new Color(array('red' => $r, 'green' => $g, 'blue' => $b)));
	}
	
	public static function	doc() {
		return(file_get_contents("Color.doc.txt"));
	}

	public function	__toString() {
		return(sprintf("Color( red: % 3d, green: % 3d, blue: % 3d )", $this->red, $this->green, $this->blue));
	}

	public function	__destruct()
	{
		if (Color::$verbose)
			echo "$this destructed.\n";
	}
}
?>
