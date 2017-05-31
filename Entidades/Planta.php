<?
	class Planta
	{
		private $id;
		private $nombre;
		private $contacto;
		private $empresa;
		private $direccion;
		private $comuna;
		private $region;
		private $pais;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			this.$id="";
			this.$nombre="";
			this.$contacto="";
			this.$empresa="";
			this.$direccion="";
			this.$comuna="";
			this.$region="";
			this.$pais="";
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