<?php

	class Solicitud{

		private $id_solicitud;
		private $id_publicacion;
		private $id_usuario;
		private $fecha_solicitud;

		public function __construct($id_solicitud,
					$id_publicacion,
					$id_usuario,
					$fecha_solicitud){
			$this->id_solicitud = $id_solicitud;
			$this->id_publicacion = $id_publicacion;
			$this->id_usuario = $id_usuario;
			$this->fecha_solicitud = $fecha_solicitud;
		}
		public function getId_solicitud(){
			return $this->id_solicitud;
		}
		public function setId_solicitud($id_solicitud){
			$this->id_solicitud = $id_solicitud;
		}
		public function getId_publicacion(){
			return $this->id_publicacion;
		}
		public function setId_publicacion($id_publicacion){
			$this->id_publicacion = $id_publicacion;
		}
		public function getId_usuario(){
			return $this->id_usuario;
		}
		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}
		public function getFecha_solicitud(){
			return $this->fecha_solicitud;
		}
		public function setFecha_solicitud($fecha_solicitud){
			$this->fecha_solicitud = $fecha_solicitud;
		}
		public function __toString(){
			return "Id_solicitud: " . $this->id_solicitud . 
				" Id_publicacion: " . $this->id_publicacion . 
				" Id_usuario: " . $this->id_usuario . 
				" Fecha_solicitud: " . $this->fecha_solicitud;
		}

        public function enviarSolicitud($conexion){
            $sql = sprintf("INSERT INTO tbl_solicitudes(id_publicacion, 
                                                        id_usuario, 
                                                        fecha_solicitud) 
                            VALUES (%s,
                            %s,
                            CURDATE())",
                            $conexion->antiInyeccion($this->id_publicacion),
                            $conexion->antiInyeccion($this->id_usuario));
            
            $resultado = $conexion->ejecutarConsulta($sql);

			if($resultado){
				$mensaje["mensaje"]="Solicitud enviada exitosamente";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido enviar la solicitud";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
        }
		
		public function limitarSolicitudes($conexion){
			$sql = sprintf("SELECT COUNT(id_solicitud) as cantidadSolicitudes FROM tbl_solicitudes
					where id_publicacion = %s and id_usuario=%s",
					$conexion->antiInyeccion($this->id_publicacion),
					$conexion->antiInyeccion($this->id_usuario));
			$resultado = $conexion->ejecutarConsulta($sql);
            $listaSucursales = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $listaSucursales[] = $fila;
            }

            $final = json_encode($listaSucursales);

            return $final;
		}

	}
?>