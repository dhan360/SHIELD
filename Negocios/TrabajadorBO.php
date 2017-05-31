<?php
	include_once "../Entidades/Trabajador.php";
	include_once "../Datos/TrabajadorDAO.php";

	class TrabajadorBO
	{
		private $trabajador;
		private $trabajadorDao;

		function __construct()
		{
			$this->trabajador = new Trabajador();
			$this->trabajadorDao = new TrabajadorDAO();
		}

		public function AgregarTrabajador($rut,$dv,$ap_paterno,$ap_materno,$nombres,$fecha_nacimiento,$estado_civil,$telefono,$mail,$direccion,$comuna,$region,$pais,$empresa){
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
								if(!is_null($fecha_nacimiento) && !empty($fecha_nacimiento))
								{
									if(!is_null($estado_civil) && !empty($estado_civil))
									{
										if(!is_null($telefono) && !empty($telefono))
										{
											if(!is_null($mail) && !empty($mail))
											{
												if(!is_null($direccion) && !empty($direccion))
												{
													if(!is_null($comuna) && !empty($comuna))
													{
														if(!is_null($region) && !empty($region))
														{
															if(!is_null($pais) && !empty($pais))
															{
																if(!is_null($empresa) && !empty($empresa))
																{
																	$this->trabajador->rut = $rut;
																	$this->trabajador->dv = $dv;
																	$this->trabajador->ap_paterno = $ap_paterno;
																	$this->trabajador->ap_materno = $ap_materno;
																	$this->trabajador->nombres = $nombres;
																	$this->trabajador->fecha_nacimiento = $fecha_nacimiento;
																	$this->trabajador->estado_civil = $estado_civil;
																	$this->trabajador->telefono = $telefono;
																	$this->trabajador->mail = $mail;
																	$this->trabajador->direccion = $direccion;
																	$this->trabajador->comuna = $comuna;
																	$this->trabajador->region = $region;
																	$this->trabajador->pais = $pais;
																	$this->trabajador->empresa = $empresa;
																	$retorno = $this->trabajadorDao->agregarTrabajador($this->trabajador);
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}

			return $retorno;
		}


		public function getTrabajador(){
			$tabla = "<table border='1' bgcolor='yellow'>";
			$tabla = $tabla."<thead>";
			$tabla = $tabla."<tr>";
			$tabla = $tabla."<td>RUT</td>";
			$tabla = $tabla."<td>DV</td>";
			$tabla = $tabla."<td>APELLIDO PATERNO</td>";
			$tabla = $tabla."<td>APELLIDO MATERNO</td>";
			$tabla = $tabla."<td>NOMBRES</td>";
			$tabla = $tabla."<td>FECHA DE NACIMIENTO</td>";
			$tabla = $tabla."<td>ESTADO CIVIL</td>";
			$tabla = $tabla."<td>TELEFONO</td>";
			$tabla = $tabla."<td>MAIL</td>";
			$tabla = $tabla."<td>DIRECCION</td>";
			$tabla = $tabla."<td>COMUNA</td>";
			$tabla = $tabla."<td>REGION</td>";
			$tabla = $tabla."<td>PAIS</td>";
			$tabla = $tabla."<td>EMPRESA</td>";
			$tabla = $tabla."</tr>";
			$tabla = $tabla."</thead>";
			$tabla = $tabla."<tbody>";
			$trabajadores = $this->trajadorDao->getTrabajador();
			foreach ($trabajadores as $trabajador)
			{
				$tabla = $tabla."<tr>";
				$tabla = $tabla."<td>".$trabajador->rut.'</td>';
				$tabla = $tabla."<td>".$trabajador->dv.'</td>';
				$tabla = $tabla."<td>".$trabajador->ap_paterno.'</td>';
				$tabla = $tabla."<td>".$trabajador->ap_materno.'</td>';
				$tabla = $tabla."<td>".$trabajador->nombres.'</td>';
				$tabla = $tabla."<td>".$trabajador->fecha_nacimiento.'</td>';
				$tabla = $tabla."<td>".$trabajador->estado_civil.'</td>';
				$tabla = $tabla."<td>".$trabajador->telefono.'</td>';
				$tabla = $tabla."<td>".$trabajador->mail.'</td>';
				$tabla = $tabla."<td>".$trabajador->direccion.'</td>';
				$tabla = $tabla."<td>".$trabajador->comuna.'</td>';
				$tabla = $tabla."<td>".$trabajador->region.'</td>';
				$tabla = $tabla."<td>".$trabajador->pais.'</td>';
				$tabla = $tabla."<td>".$trabajador->empresa.'</td>';
				$tabla = $tabla."</tr>";
			}
			$tabla = $tabla."</tbody>";  
			$tabla = $tabla."</table>";
			return $tabla;
		}

		public function eliminarTrabajador($rut){
			$retorno = FALSE;

				if(!is_null($rut) && !empty($rut))
				{
					$retorno = $this->trabajadorDao->eliminarTrabajador($rut);
					
					
				}
					
				
			
			return $retorno;
		}
	}

?>