<?php
	include_once "../Datos/ConexionDAO.php";
	include_once "../Entidades/Empresa.php";

	class EmpresaDAO
	{
		private $conexionDao;

		function __construct()
		{
			$this->$conexionDao = new ConexionDAO();
		}

		/*
		* Metodo agregarEmpresa
		* Permite Agregar nueva empresa a la base de datos
		* @param $empresa (recibe una variable Empresa)
		* return $retorno
		*/
		public function agregarEmpresa($empresa)
		{
			$retorno = null;
			if(!is_null($empresa))
			{
				$query = "insert into empresa(RUT, DV, RAZON_SOCIAL, ACTIVIDAD, AP_PAT_REPRESENTANTE, AP_MAT_REPRESENTANTE, NOMBRES_REPRESENTANTE, TELEFONO, EMAIL, DIRECCION, COMUNA, REGION, PAIS, LOGO, USUARIO, CONTRASENA) ";
				$quey = $query."values(".$empresa->rut.",'".$empresa->dv."','".$empresa->razon_social."','".$empresa->ap_pat_repre."','".$empresa->ap_mat_repre."','".$empresa->nombres_repre."',".$empresa->telefono.",'".$empresa->mail."','".$empresa->direccion."',".$empresa->comuna.",".$empresa->region.",".$empresa->pais.",'".$empresa->logo."','".$empresa->usuario."','".$empresa->contrasena."')";
				$this->conexionDao->abrir();
				$retorno = $this->conexionDao->insertUpdateDelete($query);
				$this->conexionDao->cerrar();
			}

			return $retorno;
		}

		/*
		* Metodo getEmpresa
		* Permite traer todos las empresas de la Base de Datos
		* return $empresas
		*/
		public function getEmpresa()
		{
			$query = "select empresa.RUT, empresa.DV, empresa.AP_PAT_REPRESENTANTE, empresa.AP_MAT_REPRESENTANTE, empresa.NOMBRES_REPRESENTANTE,  empresa.TELEFONO, empresa.EMAIL, empresa.DIRECCION, comuna.DETALLE as COMUNA, region.DETALLE as REGION, pais.DETALLE as PAIS, empresa.USUARIO from empresa inner join comuna on empresa.COMUNA = comuna.ID inner join region on empresa.REGION = region.ID inner join pais on empresa.PAIS = pais.ID";
			$this->conexionDAO->Abrir();
			$resultado = $this->conexionDAO->select($query);
			$empresas = array();
			while($row = $resultado->fetch_array()) 
			{
				$empresa = new Empresa();
				$empresa->rut = $row["RUT"];
				$empresa->dv = $row["DV"];
				$empresa->ap_pat_repre = $row["AP_PAT_REPRESENTANTE"];
				$empresa->ap_mat_repre = $row["AP_PAT_REPRESENTANTE"];
				$empresa->nombres = $row["NOMBRES_REPRESENTANTE"];
				$empresa->telefono = $row["	TELEFONO"];
				$empresa->mail = $row["EMAIL"];
				$empresa->direccion = $row["DIRECCION"];
				$empresa->comuna = $row["COMUNA"];
				$empresa->region = $row["REGION"];
				$empresa->pais = $row["PAIS"];
				$empresa->logo = "";
				$empresa->usuario = $row["USUARIO"];
				$empresa->contrasena = "";

				$empresas[] = $empresa;
			} 
			$this->conexionDAO->Cerrar();
			return $empresas;
		}

		/*
		* Metodo eliminarEmpresa
		* Permite eliminar empresa de la base de datos por su rut
		* @param $rut
		* return $retorno
		*/
		public function eliminarEmpresa($rut)
		{
			
				$query = "delete from empresa where ";
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