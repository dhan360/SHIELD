<?php
	include_once "../Datos/ConexionDAO.php";
	include_once "../Entidades/Cliente.php";

	class ClienteDAO
	{
		private $conexionDao;

		function __construct()
		{
			$this->$conexionDao = new ConexionDAO();
		}

		/*
		* Metodo agregarCliente
		* Permite Agregar nuevo cliente a la base de datos
		* @param $cliente (recibe una variable Cliente)
		* return $retorno
		*/
		public function agregarCliente($cliente)
		{
			$retorno = null;
			if(!is_null($cliente))
			{
				$query = "insert into cliente(RUT, DV, RAZON_SOCIAL, ACTIVIDAD) ";
				$quey = $query."values(".$cliente->rut.",'".$cliente->dv."','".$cliente->razon_social."',".$cliente->actividad.")";
				$this->conexionDao->abrir();
				$retorno = $this->conexionDao->insertUpdateDelete($query);
				$this->conexionDao->cerrar();
			}

			return $retorno;
		}

		/*
		* Metodo getCliente
		* Permite traer todos los clientes de la Base de Datos
		* return $clientes
		*/
		public function getCliente()
		{
			$query = "select cliente.RUT, cliente.DV, cliente.RAZON_SOCIAL, act_economica.DETALLE from cliente inner join act_economica on act_economica.ID = cliente.ACTIVIDAD";
			$this->conexionDAO->Abrir();
			$resultado = $this->conexionDAO->select($query);
			$clientes = array();
			while($row = $resultado->fetch_array()) 
			{
				$cliente = new Cliente();
				$cliente->rut = $row["RUT"];
				$cliente->dv = $row["DV"];
				$cliente->razon_social = $row["RAZON_SOCIAL"];
				$cliente->actividad = $row["DETALLE"];
				
				$clientes[] = $cliente;
			} 
			$this->conexionDAO->Cerrar();
			return $clientes;
		}

		/*
		* Metodo eliminarCliente
		* Permite eliminar cliente de la base de datos por su rut
		* @param $rut
		* return $retorno
		*/
		public function eliminarCliente($rut)
		{
			
				$query = "delete from cliente where ";
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