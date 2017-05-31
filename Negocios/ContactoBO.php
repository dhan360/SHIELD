<?php
	include_once "../Entidades/Contacto.php";
	include_once "../Datos/ContactoDAO.php";

	class ContactoBO
	{
		private $contacto;///Prueba
		private $contactoDao;

		function __construct()
		{
			$this->contacto = new Contacto();
			$this->contactoDao = new ContactoDAO();
		}

		public function AgregarContacto($rut,$dv,$ap_paterno,$ap_materno,$nombres,$telefono,$mail){
			$retorno = false;
			if(!is_null($rut) && !empty($rut))
			{
				if(!is_null($dv) && !empty($dv))
				{
					if(!is_null($ap_paterno) && !empty($ap_paterno))
					{
						if(!is_null($ap_materno) && !empty($ap_materno))
						{
							if(!is_null($nombres) && !empty($nombres))
							{
								if(!is_null($telefono) && !empty($telefono))
								{
									if(!is_null($mail) && !empty($mail))
									{
										$this->contacto->rut = $rut;
										$this->contacto->dv = $dv;
										$this->contacto->ap_paterno = $ap_paterno;
										$this->contacto->ap_materno = $ap_materno;
										$this->contacto->nombres = $nombres;
										$this->contacto->telefono = $telefono;
										$this->contacto->mail = $mail;
										$retorno = $this->contactoDao->agregarContacto($this->contacto);
									}
								}
							}
						}
					}
				}
			}

			return $retorno;
		}


		public function getContacto(){
			$tabla = "<table border='1' bgcolor='yellow'>";
			$tabla = $tabla."<thead>";
			$tabla = $tabla."<tr>";
			$tabla = $tabla."<td>RUT</td>";
			$tabla = $tabla."<td>DV</td>";
			$tabla = $tabla."<td>APELLIDO PATERNO</td>";
			$tabla = $tabla."<td>APELLIDO MATERNO</td>";
			$tabla = $tabla."<td>NOMBRES</td>";
			$tabla = $tabla."<td>TELEFONO</td>";
			$tabla = $tabla."<td>MAIL</td>";
			$tabla = $tabla."</tr>";
			$tabla = $tabla."</thead>";
			$tabla = $tabla."<tbody>";
			$contactos = $this->contactoDao->getContacto();
			foreach ($contactos as $contacto)
			{
				$tabla = $tabla."<tr>";
				$tabla = $tabla."<td>".$contacto->rut.'</td>';
				$tabla = $tabla."<td>".$contacto->dv.'</td>';
				$tabla = $tabla."<td>".$contacto->ap_paterno.'</td>';
				$tabla = $tabla."<td>".$contacto->ap_materno.'</td>';
				$tabla = $tabla."<td>".$contacto->nombres.'</td>';
				$tabla = $tabla."<td>".$contacto->telefono.'</td>';
				$tabla = $tabla."<td>".$contacto->mail.'</td>';
				$tabla = $tabla."</tr>";
			}
			$tabla = $tabla."</tbody>";  
			$tabla = $tabla."</table>";
			return $tabla;
		}

		public function eliminarContacto($rut){
			$retorno = FALSE;

				if(!is_null($rut) && !empty($rut))
				{
					$retorno = $this->contactoDao->eliminarContacto($rut);
					
					
				}
					
				
			
			return $retorno;
		}
	}

?>