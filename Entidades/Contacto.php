<?
	include_once "Persona.php";

	class Contacto extends Persona
	{
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			parent::__construct();
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