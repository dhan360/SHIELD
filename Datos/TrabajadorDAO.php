<?php
	include_once "../Datos/ConexionDAO.php";
	include_once "../Entidades/Trabajador.php";

	class TrabajadorDAO
	{
		private $conexionDao;

		function __construct()
		{
			$this->$conexionDao = new ConexionDAO();
		}

		/*
		* Metodo agregarTrabajador
		* Permite Agregar nuevo trabajador a la base de datos
		* @param $trabajador (recibe una variable Trabajador)
		* return $retorno
		*/
		public function agregarTrabajador($trabajador)
		{
			$retorno = null;
			if(!is_null($trabajador))
			{
				$query = "insert into trabajador(RUT, DV, APELLIDO_PATERNO, APELLIDO_MATERNO, NOMBRES, FECHA_NACIMIENTO, ESTADO_CIVIL, TELEFONO, EMAIL, DIRECCION, COMUNA, REGION, PAIS, EMPRESA) ";
				$quey = $query."values(".$trabajador->rut.",'".$trabajador->dv."','".$trabajador->ap_paterno."','".$trabajador->ap_materno."','".$trabajador->nombres."',".$trabajador->fecha_nacimiento.",".$trabajador->estado_civil.",".$trabajador->telefono.",'".$trabajador->mail."','".$trabajador->direccion."',".$trabajador->comuna.",".$trabajador->region.",".$trabajador->pais.",".$trabajador->empresa.")";
				$this->conexionDao->abrir();
				$retorno = $this->conexionDao->insertUpdateDelete($query);
				$this->conexionDao->cerrar();
			}

			return $retorno;
		}

		/*
		* Metodo getTrabajador
		* Permite traer todos los trabajadores de la Base de Datos
		* return $trabajadores
		*/
		public function getTrabajador()
		{
			$query = "select trabajador.RUT, trabajador.DV, trabajador.APELLIDO_PATERNO, trabajador.APELLIDO_MATERNO, trabajador.NOMBRES, trabajador.FECHA_NACIMIENTO, estado_civil.DETALLE as ESTADO_CIVIL, trabajador.TELEFONO, trabajador.EMAIL, trabajador.DIRECCION, comuna.DETALLE as COMUNA, region.DETALLE as REGION, pais.DETALLE as PAIS, empresa.razon_social as EMPRESA from trabajador inner join estado_civil on trabajador.ESTADO_CIVIL = estado_civil.ID inner join comuna on trabajador.COMUNA = comuna.ID inner join region on trabajador.REGION = region.ID inner join pais on trabajador.PAIS = pais.ID inner join empresa on trabajador.EMPRESA = empresa.RUT";
			$this->conexionDAO->Abrir();
			$resultado = $this->conexionDAO->select($query);
			$trabajadores = array();
			while($row = $resultado->fetch_array()) 
			{
				$trabajador = new Trabajador();
				$trabajador->rut = $row["RUT"];
				$trabajador->dv = $row["DV"];
				$trabajador->ap_paterno = $row["APELLIDO_PATERNO"];
				$trabajador->ap_materno = $row["APELLIDO_MATERNO"];
				$trabajador->nombres = $row["NOMBRES"];
				$trabajador->fecha_nacimiento = $row["FECHA_NACIMIENTO"];
				$trabajador->estado_civil = $row["ESTADO_CIVIL"];
				$trabajador->telefono = $row["	TELEFONO"];
				$trabajador->mail = $row["EMAIL"];
				$trabajador->direccion = $row["DIRECCION"];
				$trabajador->comuna = $row["COMUNA"];
				$trabajador->region = $row["REGION"];
				$trabajador->pais = $row["PAIS"];
				$trabajador->empresa = $row["EMPRESA"];

				$trabajadores[] = $trabajador;
			} 
			$this->conexionDAO->Cerrar();
			return $clientes;
		}

		/*
		* Metodo eliminarTrabajador
		* Permite eliminar trabajador de la base de datos por su rut
		* @param $rut
		* return $retorno
		*/
		public function eliminarTrabajador($rut)
		{
			
				$query = "delete from trabajador where ";
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