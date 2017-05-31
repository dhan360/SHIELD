<?php
	include_once "../Datos/ConexionDAO.php";
	include_once "../Entidades/Planta.php";

	class PlantaDAO
	{
		private $conexionDao;

		function __construct()
		{
			$this->$conexionDao = new ConexionDAO();
		}

		/*
		* Metodo agregarPlanta
		* Permite Agregar nueva planta a la base de datos
		* @param $planta (recibe una variable Contacto)
		* return $retorno
		*/
		public function agregarPlanta($planta)
		{
			$retorno = null;
			if(!is_null($planta))
			{
				$query = "insert into planta(ID, NOMBRE, CONTACTO, EMPRESA, DIRECCION, COMUNA, REGION, PAIS) ";
				$quey = $query."values(".$planta->id.",'".$planta->nombre."',".$planta->contacto.",".$planta->empresa.",'".$planta->direccion."',".$planta->comuna.",".$planta->region.",".$planta->pais.")";
				$this->conexionDao->abrir();
				$retorno = $this->conexionDao->insertUpdateDelete($query);
				$this->conexionDao->cerrar();
			}

			return $retorno;
		}

		/*
		* Metodo getPlanta
		* Permite traer todos las plantas de la Base de Datos
		* return $plantas
		*/
		public function getPlanta()
		{
			$query = "select planta.ID, planta.NOMBRE, concat(contacto.NOMBRES,' ',contacto.APELLIDO_PATERNO,' ',contacto.APELLIDO_MATERNO) AS CONTACTO, empresa.RAZON_SOCIAL as EMPRESA, planta.DIRECCION, comuna.DETALLE as COMUNA, region.DETALLE as REGION, pais.DETALLE as PAIS from planta inner join contacto on contacto.RUT = planta.CONTACTO inner join empresa on empresa.RUT = planta.EMPRESA inner join comuna on planta.COMUNA = comuna.ID inner join region on planta.REGION = region.ID inner join pais on planta.PAIS = pais.ID";
			$this->conexionDAO->Abrir();
			$resultado = $this->conexionDAO->select($query);
			$plantas = array();
			while($row = $resultado->fetch_array()) 
			{
				$planta = new Planta();
				$planta->id = $row["ID"];
				$planta->nombre = $row["NOMBRE"];
				$planta->contacto = $row["CONTACTO"];
				$planta->empresa = $row["EMPRESA"];
				$planta->direccion = $row["DIRECCION"];
				$planta->comuna = $row["COMUNA"];
				$planta->region = $row["REGION"];
				$planta->pais = $row["PAIS"];

				$plantas[] = $planta;
			} 
			$this->conexionDAO->Cerrar();
			return $plantas;
		}

		/*
		* Metodo eliminarPlanta
		* Permite eliminar planta de la base de datos por su rut
		* @param $id
		* return $retorno
		*/
		public function eliminarPlanta($id)
		{
			
				$query = "delete from planta where ";
				$query = $query."ID = ".$id;
				echo "$query";
					$this->conexionDAO->Abrir();
					$retorno = $this->conexionDAO->insertUpdateDelete($query);
					$this->conexionDAO->Cerrar();
					return $retorno;
					
		}
	}




	}
?>