<?php
	include "ConfigDAO.php";
	class ConexionDAO
	{
		private $mysqli;
		private $conexion;

		/* 
		 * CONSTRUCTOR POR DEFECTO DE LA CLASE ConexionDAO
		 */
		public  function __construct()
		{
			$this->conexion = new ConfigDAO();
		}

		/*  FUNCIÓN Abrir
		 *	Permite abrir la conexión a la base de datos */
		public function abrir()
		{
			$this->mysqli = new mysqli($this->conexion->servidor, $this->conexion->usuario, $this->conexion->password,$this->conexion->bd);

			//Consulta si hubo un error
			if ($this->mysqli->connect_error) 
			{
				die("Error : ".$this->mysqli->connect_error);
				
			}
		}

		/*  FUNCIÓN Cerrar
		 *	Permite Cerrar la conexión de la base de datos */
		public function cerrar()
		{
			$this->mysqli->close();
			;
		}

		/*  FUNCIÓN Select
		 *  @param query: Una consulta SQL en formato CADENA de tipo SELECT
		 *	@return Obtiene los datos de una consulta de tipo SELECT en formato ARRAY */
		public function select($query)
		{			
			$resultado = $this->mysqli->query($query);
			return $resultado;

		}

		public function newSelect($query)
		{			
			$resultado = $this->mysqli->query($query);
			$totalFilas = $resultado->num_rows;
			if ($totalFilas != 0){
			return 1;
		}
		else
			return 0;

		}

		

			
		
		
		/*  FUNCIÓN InsertUpdateDelete
		 *  @param query: Una consulta SQL en formato CADENA de tipo Insert, Update o DELETE
		 *	@return Devuelve TRUE si hubieron filas afectadas, false sino hubo. */
		public function insertUpdateDelete($query)
		{
			$comprobador = FALSE;
			if($this->mysqli->query($query) == TRUE)
			{
				
				if($this->mysqli->affected_rows > 0)
				{
					
					$comprobador = TRUE;
					
				}
			}

			return $comprobador;
		}
	}
?>