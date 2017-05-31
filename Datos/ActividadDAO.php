<?php
	include_once "../Datos/ConexionDAO.php";
	include_once "../Entidades/Actividad.php";

	class ActividadDAO
	{
		private $conexionDao;

		function __construct()
		{
			$this->$conexionDao = new ConexionDAO();
		}


		/*
		* Metodo getActividad
		* Permite traer todos las actividades de la Base de Datos
		* return $actividades
		*/
		public function getActividad()
		{
			$query = "select * from act_economica";
			$this->conexionDAO->Abrir();
			$resultado = $this->conexionDAO->select($query);
			$actividades = array();
			while($row = $resultado->fetch_array()) 
			{
				$actividad = new Actividad();
				$actividad->id = $row["ID"];
				$actividad->detalle = $row["DETALLE"];
				
				$actividades[] = $actividad;
			} 
			$this->conexionDAO->Cerrar();
			return $actividades;
		}

		
	}




	
?>