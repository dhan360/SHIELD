<?php
	
	class Persona
	{
		private $rut;
		private $dv;
		private $ap_paterno;
		private $ap_materno;
		private $nombres;
		private $telefono;
		private $mail;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			this.$rut="";
			this.$dv="";
			this.$ap_paterno="";
			this.$ap_materno="";
			this.$nombres="";
			this.$telefono="";
			this.$mail="";
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