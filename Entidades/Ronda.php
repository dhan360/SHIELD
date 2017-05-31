<?
	class Ronda
	{
		private $id;
		private $fecha;
		private $hora;
		private $trabajador;
		private $planta;
		private $totem;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			this.$planta="";
			this.$fecha="";
			this.$hora="";
			this.$trabajador="";
			this.$planta="";
			this.$totem="";
		}

		/*
		* Accesador Global
		*/
		public function __get($property)
		{
				if ($property_exists($this,$property))
				{
					return $this->$property;
				}
		}
		
		/*
		* Mutador Global
		*/
		public function __set($property,$value)
		{
				if ($property_exists($this,$property))
				{
					$this->$property = $value;
				}
		}
	}
?>