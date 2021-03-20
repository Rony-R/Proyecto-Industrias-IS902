<?php

	class Publicacion{

		private $id_publicacion;
		private $id_presupuesto;
		private $id_usuario;
		private $id_categoria;
		private $id_estado;
		private $nombre_proyecto;
		private $descripcion;

		public function __construct($id_publicacion,
					$id_presupuesto,
					$id_usuario,
					$id_categoria,
					$id_estado,
					$nombre_proyecto,
					$descripcion){
			$this->id_publicacion = $id_publicacion;
			$this->id_presupuesto = $id_presupuesto;
			$this->id_usuario = $id_usuario;
			$this->id_categoria = $id_categoria;
			$this->id_estado = $id_estado;
			$this->nombre_proyecto = $nombre_proyecto;
			$this->descripcion = $descripcion;
		}
		public function getId_publicacion(){
			return $this->id_publicacion;
		}
		public function setId_publicacion($id_publicacion){
			$this->id_publicacion = $id_publicacion;
		}
		public function getId_presupuesto(){
			return $this->id_presupuesto;
		}
		public function setId_presupuesto($id_presupuesto){
			$this->id_presupuesto = $id_presupuesto;
		}
		public function getId_usuario(){
			return $this->id_usuario;
		}
		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}
		public function getId_categoria(){
			return $this->id_categoria;
		}
		public function setId_categoria($id_categoria){
			$this->id_categoria = $id_categoria;
		}
		public function getId_estado(){
			return $this->id_estado;
		}
		public function setId_estado($id_estado){
			$this->id_estado = $id_estado;
		}
		public function getNombre_proyecto(){
			return $this->nombre_proyecto;
		}
		public function setNombre_proyecto($nombre_proyecto){
			$this->nombre_proyecto = $nombre_proyecto;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function __toString(){
			return "Id_publicacion: " . $this->id_publicacion . 
				" Id_presupuesto: " . $this->id_presupuesto . 
				" Id_usuario: " . $this->id_usuario . 
				" Id_categoria: " . $this->id_categoria . 
				" Id_estado: " . $this->id_estado . 
				" Nombre_proyecto: " . $this->nombre_proyecto . 
				" Descripcion: " . $this->descripcion;
		}

        public function verPublicacionEspecifica($conexion){
            $sql = "SELECT id_publicacion, 
                        id_presupuesto, 
                        id_usuario, 
                        id_categoria, 
                        id_estado, 
                        nombre_proyecto, 
                        descripcion FROM tbl_publicacion WHERE id_publicacion=1";
            $resultado = $conexion->ejecutarConsulta($sql);
            $listaSucursales = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $listaSucursales[] = $fila;
            }

            $final = json_encode($listaSucursales);

            return $final;
        }

        public function verInformacionUsuarioPublicacion($conexion){
            $sql = "SELECT id_publicacion, 
                        u.nombre,
                        u.apellido,
                        u.ruta_img_perfil,
                        u.nombre_img_perfil,
                        u.correo,
                        u.telefono,
                        ps.pais 
                        FROM tbl_publicacion AS p
                        INNER JOIN tbl_usuario AS u
                        ON p.id_usuario = u.id_usuario
                        INNER JOIN tbl_paises AS ps
                        ON u.id_pais = ps.id_pais
                        WHERE id_publicacion=1";
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