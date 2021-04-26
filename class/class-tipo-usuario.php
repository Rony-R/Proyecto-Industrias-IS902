<?php

	class tipoUsuario{

		private $id_tipo_usuario;
		private $tipo_usuario;

		public function __construct($id_tipo_usuario,
					$tipo_usuario){
			$this->id_tipo_usuario = $id_tipo_usuario;
			$this->tipo_usuario = $tipo_usuario;
		}
		public function getId_tipo_usuario(){
			return $this->id_tipo_usuario;
		}
		public function setId_tipo_usuario($id_tipo_usuario){
			$this->id_tipo_usuario = $id_tipo_usuario;
		}
		public function getTipo_usuario(){
			return $this->tipo_usuario;
		}
		public function setTipo_usuario($tipo_usuario){
			$this->tipo_usuario = $tipo_usuario;
		}
		public function __toString(){
			return "Id_tipo_usuario: " . $this->id_tipo_usuario . 
				" Tipo_usuario: " . $this->tipo_usuario;
		}

        public function verTipoUsuario($conexion){
            $sql = "select id_tipo_usuario, tipo_usuario
            from tbl_tipo_usuario";
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