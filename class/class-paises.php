<?php

	class Pais{

		private $id_pais;
		private $pais;

		public function __construct($id_pais,
					$pais){
			$this->id_pais = $id_pais;
			$this->pais = $pais;
		}
		public function getId_pais(){
			return $this->id_pais;
		}
		public function setId_pais($id_pais){
			$this->id_pais = $id_pais;
		}
		public function getPais(){
			return $this->pais;
		}
		public function setPais($pais){
			$this->pais = $pais;
		}
		public function __toString(){
			return "Id_pais: " . $this->id_pais . 
				" Pais: " . $this->pais;
		}

        public function verPaises($conexion){
            $sql = "select id_pais, pais from tbl_paises";
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