<?php

	class Actividad 
	{
		private $id;
		private $detalle;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
				this.$id = "";
				this.$detalle = "";
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