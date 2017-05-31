<?php
	class ConfigDAO 
	{
		private $servidor;
		private $bd;
		private $usuario;
		private $password;
		
		public function __construct()
		{
			$this->servidor = "localhost:85";
			$this->bd = "shield";
			$this->usuario = "dsilva";
			$this->password = "Preveinfo15";
		}

		/* METODOS MAGICOS */
		public function __get($property) 
		{
			if (property_exists($this, $property)) 
			{
				return $this->$property;
			}
		}

		public function __set($property, $value) 
		{
			if (property_exists($this, $property)) 
			{
				$this->$property = $value;
    		}
		}
	}
?>