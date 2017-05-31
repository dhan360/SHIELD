<?php
	include_once "../Datos/ConexionDAO.php";
	include_once "../Entidades/Contacto.php";

	class ContactoDAO
	{
		private $conexionDao;

		function __construct()
		{
			$this->$conexionDao = new ConexionDAO();
		}

		/*
		* Metodo agregarContacto
		* Permite Agregar nuevo contacto a la base de datos
		* @param $contacto (recibe una variable Contacto)
		* return $retorno
		*/
		public function agregarContacto($contacto)
		{
			$retorno = null;
			if(!is_null($contacto))
			{
				$query = "insert into contacto(RUT, DV, APELLIDO_PATERNO, APELLIDO_MATERNO, NOMBRES,TELEFONO, EMAIL) ";
				$quey = $query."values(".$trabajador->rut.",'".$trabajador->dv."','".$trabajador->ap_paterno."','".$trabajador->ap_materno."',".$trabajador->telefono.",'".$trabajador->mail."')";
				$this->conexionDao->abrir();
				$retorno = $this->conexionDao->insertUpdateDelete($query);
				$this->conexionDao->cerrar();
			}

			return $retorno;
		}

		/*
		* Metodo getContacto
		* Permite traer todos los contactos de la Base de Datos
		* return $contactos
		*/
		public function getContacto()
		{
			$query = "select * from contacto";
			$this->conexionDAO->Abrir();
			$resultado = $this->conexionDAO->select($query);
			$contactos = array();
			while($row = $resultado->fetch_array()) 
			{
				$contacto = new Contacto();
				$contacto->rut = $row["RUT"];
				$contacto->dv = $row["DV"];
				$contacto->ap_paterno = $row["APELLIDO_PATERNO"];
				$contacto->ap_materno = $row["APELLIDO_MATERNO"];
				$contacto->nombres = $row["NOMBRES"];
				$contacto->telefono = $row["	TELEFONO"];
				$contacto->mail = $row["EMAIL"];

				$contactos[] = $contacto;
			} 
			$this->conexionDAO->Cerrar();
			return $contactos;
		}

		/*
		* Metodo eliminarContacto
		* Permite eliminar contacto de la base de datos por su rut
		* @param $rut
		* return $retorno
		*/
		public function eliminarContacto($rut)
		{
			
				$query = "delete from contacto where ";
				$query = $query."RUT = ".$rut;
				echo "$query";
					$this->conexionDAO->Abrir();
					$retorno = $this->conexionDAO->insertUpdateDelete($query);
					$this->conexionDAO->Cerrar();
					return $retorno;
					
		}
	}




	}
?>