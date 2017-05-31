<?php
	
	class Cliente
	{
		private $rut;
		private $dv;
		private $razon_social;
		private $actividad;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			this.$rut="";
			this.$dv="";//LDSDLSDLS
			this.$razon_social="";
			this.$actividad="";
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