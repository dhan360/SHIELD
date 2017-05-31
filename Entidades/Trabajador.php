<?
	include_once "Persona.php";
	
	class Trabajador extends Persona
	{
		private $fecha_nacimiento;
		private $estado_civil;
		private $direccion:
		private $comuna;
		private $region;
		private $pais;
		private $empresa;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			parent::__construct();
			this.$fecha_nacimiento="";
			this.$estado_civil="";
			this.$direccion="";
			this.$comuna="";
			this.$region="";
			this.$pais="";
			this.$empresa="";
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