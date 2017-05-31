<?
	class Totem
	{
		private $planta;
		private $id;
		private $coordenada;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			this.$planta="";
			this.$id="";
			this.$coordenada="";
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