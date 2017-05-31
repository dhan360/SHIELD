<?
	class Empresa
	{
		private $rut;
		private $dv;
		private $razon_social;
		private $actividad;
		private $ap_pat_repre;
		private $ap_mat_repre;
		private $nombres_repre;
		private $telefono;
		private $mail;
		private $direccion;
		private $comuna;
		private $region;
		private $pais;
		private $logo;
		private $usuario;
		private $contrasena;
		
		/*
		* Constructor sin parametros
		*/
		function __construct()
		{
			this.$rut="";
			this.$dv="";
			this.$razon_social="";
			this.$actividad="";
			this.$ap_pat_repre="";
			this.$ap_mat_repre="";
			this.$nombres_repre="";
			this.$telefono="";
			this.$mail="";
			this.$direccion="";
			this.$comuna="";
			this.$region="";
			this.$pais="";
			this.$logo="";
			this.$usuario="";
			this.$contrasena="";
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