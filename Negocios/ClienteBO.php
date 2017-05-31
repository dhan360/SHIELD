<?php
	include_once "../Entidades/Cliente.php";
	include_once "../Datos/ClienteDAO.php";

	class ClienteBO
	{
		private $cliente;
		private $clienteDao;

		function __construct()
		{
			$this->cliente = new Cliente();
			$this->clienteDao = new ClienteDAO();
		}

		public function AgregarCliente($rut,$dv,$razon_social,$actividad){
			$retorno = false;
			if(!is_null($rut) && !empty($rut))
			{
				if(!is_null($dv) && !empty($dv))
				{
					if(!is_null($razon_social) && !empty($razon_social))
					{
						if(!is_null($actividad) && !empty($actividad))
						{
							$this->cliente->rut = $rut;
							$this->cliente->dv = $dv;
							$this->cliente->razon_social = $razon_social;
							$this->cliente->actividad = $actividad;
							$retorno = $this->clienteDao->agregarCliente($this->cliente);
						}
					}
				}
			}

			return $retorno;
		}


		public function getCliente(){
			$tabla = "<table border='1' bgcolor='yellow'>";
			$tabla = $tabla."<thead>";
			$tabla = $tabla."<tr>";
			$tabla = $tabla."<td>RUT</td>";
			$tabla = $tabla."<td>DV</td>";
			$tabla = $tabla."<td>RAZON SOCIAL</td>";
			$tabla = $tabla."<td>ACTIVIDAD</td>";
			$tabla = $tabla."</tr>";
			$tabla = $tabla."</thead>";
			$tabla = $tabla."<tbody>";
			$clientes = $this->clienteDao->getCliente();
			foreach ($clientes as $cliente)
			{
				$tabla = $tabla."<tr>";
				$tabla = $tabla."<td>".$cliente->rut.'</td>';
				$tabla = $tabla."<td>".$cliente->dv.'</td>';
				$tabla = $tabla."<td>".$cliente->razon_social.'</td>';
				$tabla = $tabla."<td>".$cliente->actividad.'</td>';
				$tabla = $tabla."</tr>";
			}
			$tabla = $tabla."</tbody>";  
			$tabla = $tabla."</table>";
			return $tabla;
		}

		public function eliminarCliente($rut){
			$retorno = FALSE;

				if(!is_null($rut) && !empty($rut))
				{
					$retorno = $this->clienteDao->eliminarCliente($rut);
					
					
				}
					
				
			
			return $retorno;
		}
	}

?>