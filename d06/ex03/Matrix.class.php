<?php

require_once ("Vector.class.php");

class Matrix
{
	public static $verbose = FALSE;

	const	IDENTITY	= "IDENTITY";
	const	SCALE		= "SCALE";
	const	RX			= "RX";
	const	RY			= "RY";
	const	RZ			= "RZ";
	const	TRANSLATION	= "TRANSLATION";
	const	PROJECTION	= "PROJECTION";

	public	$matrix	= [	[1.0, 0.0, 0.0, 0.0],
							[0.0, 1.0, 0.0, 0.0],
							[0.0, 0.0, 1.0, 0.0],
							[0.0, 0.0, 0.0, 1.0] ];
	private $_preset	= IDENTITY;
	private $_scale		= 1.0;
	private $_angle		= 0.0;
	private $_vtc;
	private $_fov		= 90.0;
	private $_ratio		= 1.0;
	private $_near		= 1.0;
	private $_far		= 0.0;

	public function		__construct(array $kwargs)
	{
		if (array_key_exists('preset', $kwargs))
		{
			$this->_preset = $kwargs['preset'];
			switch ($this->_preset)
			{
				case (SCALE):
					if (array_key_exists('scale', $kwargs))
						$this->_scale = $kwargs['scale'];
					$this->createScaleMatrix();
					break ;
				case (RX):
				case (RY):
				case (RZ):
					if (array_key_exists('angle', $kwargs))
						$this->_angle = $kwargs['angle'];
					$this->createRotationMatrix();
					break ;
				case (TRANSLATION):
					$this->_vtc = array_key_exists('vtc', $kwargs) ? $kwargs['vtc']
								: new Vector(array('dest' =>
									new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0))));
					$this->createTranslationMatrix();
					break ;
				case (PROJECTION):
					if (array_key_exists('fov', $kwargs))
						$this->_fov = $kwargs['fov'];
					if (array_key_exists('ratio', $kwargs))
						$this->_ratio = $kwargs['ratio'];
					if (array_key_exists('near', $kwargs))
						$this->_near = $kwargs['near'];
					if (array_key_exists('far', $kwargs))
						$this->_far = $kwargs['far'];
					$this->createProjectionMatrix();
			}
		}
		if (Self::$verbose)
			echo "Matrix $this->_preset instance constructed.\n";
	}

	private function	createScaleMatrix()
	{
		$this->matrix[0][0] = $this->_scale;
		$this->matrix[1][1] = $this->_scale;
		$this->matrix[2][2] = $this->_scale;
	}
	
	private function	createRotationMatrix()
	{
		$this->matrix[0][0] = $this->_preset == RX ? 1.0 : cos($this->_angle);
		$this->matrix[0][1] = $this->_preset == RZ ? -sin($this->_angle) : 0.0;
		$this->matrix[0][2] = $this->_preset == RY ? sin($this->_angle) : 0.0;
		
		$this->matrix[1][0] = $this->_preset == RZ ? sin($this->_angle) : 0.0;
		$this->matrix[1][1] = $this->_preset == RY ? 1.0 : cos($this->_angle);
		$this->matrix[1][2] = $this->_preset == RX ? -sin($this->_angle) : 0.0;
		
		$this->matrix[2][0] = $this->_preset == RY ? -sin($this->_angle) : 0.0;
		$this->matrix[2][1] = $this->_preset == RX ? sin($this->_angle) : 0.0;
		$this->matrix[2][2] = $this->_preset == RZ ? 1.0 : cos($this->_angle);
	}

	private function	createTranslationMatrix()
	{
		$this->matrix[0][3] = $this->_vtc->getX();
		$this->matrix[1][3] = $this->_vtc->getY();
		$this->matrix[2][3] = $this->_vtc->getZ();
	}

	private function	createProjectionMatrix()
	{
		$this->matrix[0][0] = 1 / ($this->_ratio * tan(deg2rad($this->_fov) / 2));
		$this->matrix[1][1] = 1 / tan(deg2rad($this->_fov) / 2);
		$this->matrix[2][2] = ($this->_far + $this->_near) / ($this->_far - $this->_near) * -1;
		$this->matrix[2][3] = (2 * $this->_far * $this->_near) / ($this->_far - $this->_near) * -1;
		$this->matrix[3][2] = -1.0;
		$this->matrix[3][3] = 0.0;
	}

	public function		mult(Matrix $rhs)
	{
		$new = new Matrix(array('preset' => IDENTITY));
		for ($i = 0; $i < 4; $i++)
			for ($j = 0; $j < 4; $j++)
			{
				$new->matrix[$i][$j] = 0;
				for ($k = 0; $k < 4; $k++)
					$new->matrix[$i][$j] += $this->matrix[$i][$k] * $rhs->matrix[$k][$j];
			}
		return ($new);
	}

	public function		 transformVertex(Vertex $vtx)
	{
		$new = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$new->setX($this->matrix[0][0] * $vtx->getX()
					+ $this->matrix[0][1] * $vtx->getY()
					+ $this->matrix[0][2] * $vtx->getZ()
					+ $this->matrix[0][3] * $vtx->getW());
		$new->setY($this->matrix[1][0] * $vtx->getX()
					+ $this->matrix[1][1] * $vtx->getY()
					+ $this->matrix[1][2] * $vtx->getZ()
					+ $this->matrix[1][3] * $vtx->getW());
		$new->setZ($this->matrix[2][0] * $vtx->getX()
					+ $this->matrix[2][1] * $vtx->getY()
					+ $this->matrix[2][2] * $vtx->getZ()
					+ $this->matrix[2][3] * $vtx->getW());
		$new->setW($this->matrix[3][0] * $vtx->getX()
					+ $this->matrix[3][1] * $vtx->getY()
					+ $this->matrix[3][2] * $vtx->getZ()
					+ $this->matrix[3][3] * $vtx->getW());
		return ($new);
	}

	public static function	doc()
	{
		if (file_exists("Matrix.doc.txt"))
			return(file_get_contents("Matrix.doc.txt"));
	}

	public function		__toString()
	{
		return (sprintf(
			"M | vtcX | vtcY | vtcZ | vtxO\n".
			"-----------------------------\n".
			"x | %.2f | %.2f | %.2f | %.2f\n".
			"y | %.2f | %.2f | %.2f | %.2f\n".
			"z | %.2f | %.2f | %.2f | %.2f\n".
			"w | %.2f | %.2f | %.2f | %.2f\n",
			$this->matrix[0][0], $this->matrix[0][1], $this->matrix[0][2], $this->matrix[0][3],
			$this->matrix[1][0], $this->matrix[1][1], $this->matrix[1][2], $this->matrix[1][3],
			$this->matrix[2][0], $this->matrix[2][1], $this->matrix[2][2], $this->matrix[2][3],
			$this->matrix[3][0], $this->matrix[3][1], $this->matrix[3][2], $this->matrix[3][3]));
	}

	public function		__destruct()
	{
		if (Self::$verbose)
			echo "Matrix instance destructed.\n";
	}
}
?>
