<?php
	include_once "../Datos/ConexionDAO.php";
	include_once "../Entidades/Totem.php";

	class TotemDAO
	{
		private $conexionDao;

		function __construct()
		{
			$this->$conexionDao = new ConexionDAO();
		}

		/*
		* Metodo agregarTotem
		* Permite Agregar nuevo totem a la base de datos
		* @param $totem (recibe una variable Contacto)
		* return $retorno
		*/
		public function agregarTotem($totem)
		{
			$retorno = null;
			if(!is_null($totem))
			{
				$query = "insert into totem(PLANTA,ID,COORDENADAS) ";
				$quey = $query."values(".$totem->planta.",".$totem->id.",'".$totem->coordenada."')";
				$this->conexionDao->abrir();
				$retorno = $this->conexionDao->insertUpdateDelete($query);
				$this->conexionDao->cerrar();
			}

			return $retorno;
		}

		
		

		/*
		* Metodo eliminarTotem
		* Permite eliminar totem de la base de datos por su id y planta
		* @param $id
		* @param $planta
		* return $retorno
		*/
		public function eliminarPlanta($id,$planta)
		{
			
				$query = "delete from totem where ";
				$query = $query."ID = ".$id." PLANTA = ".$planta;
				echo "$query";
					$this->conexionDAO->Abrir();
					$retorno = $this->conexionDAO->insertUpdateDelete($query);
					$this->conexionDAO->Cerrar();
					return $retorno;
					
		}
	}




	}
?>