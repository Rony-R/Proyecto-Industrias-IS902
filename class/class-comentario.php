<?php

	class Comentario{

		private $id_comentario;
		private $id_usuario;
		private $id_publicacion;
		private $comentario;
		private $fecha_comentario;

		public function __construct($id_comentario,
					$id_usuario,
					$id_publicacion,
					$comentario,
					$fecha_comentario){
			$this->id_comentario = $id_comentario;
			$this->id_usuario = $id_usuario;
			$this->id_publicacion = $id_publicacion;
			$this->comentario = $comentario;
			$this->fecha_comentario = $fecha_comentario;
		}
		public function getId_comentario(){
			return $this->id_comentario;
		}
		public function setId_comentario($id_comentario){
			$this->id_comentario = $id_comentario;
		}
		public function getId_usuario(){
			return $this->id_usuario;
		}
		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}
		public function getId_publicacion(){
			return $this->id_publicacion;
		}
		public function setId_publicacion($id_publicacion){
			$this->id_publicacion = $id_publicacion;
		}
		public function getComentario(){
			return $this->comentario;
		}
		public function setComentario($comentario){
			$this->comentario = $comentario;
		}
		public function getFecha_comentario(){
			return $this->fecha_comentario;
		}
		public function setFecha_comentario($fecha_comentario){
			$this->fecha_comentario = $fecha_comentario;
		}
		public function __toString(){
			return "Id_comentario: " . $this->id_comentario . 
				" Id_usuario: " . $this->id_usuario . 
				" Id_publicacion: " . $this->id_publicacion . 
				" Comentario: " . $this->comentario . 
				" Fecha_comentario: " . $this->fecha_comentario;
		}

        public function verComentarioPublicación($conexion){
            $sql = sprintf(	"SELECT 
                c.id_comentario, 
                u.nombre,
                u.apellido,
                u.ruta_img_perfil,
                u.nombre_img_perfil, 
                c.comentario,
				c.fecha_comentario
                FROM tbl_comentarios as c
                INNER JOIN tbl_usuario as u
                ON c.id_usuario = u.id_usuario 
                WHERE c.id_publicacion= %s",
				$conexion->antiInyeccion($this->id_publicacion));

            $resultado = $conexion->ejecutarConsulta($sql);
            $listaSucursales = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $listaSucursales[] = $fila;
            }

            $final = json_encode($listaSucursales);

            return $final;
        }

        public function insertarNuevoComentario($conexion){
            
        }


	}
?>