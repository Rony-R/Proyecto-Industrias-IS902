<?php

	class creacionUsuario{

		private $id_usuario;
		private $id_tipo_usuario;
		private $id_pais;
		private $nombre;
		private $apellido;
		private $direccion;
		private $correo;
		private $telefono;
		private $contrasenia;
		private $ruta_img_perfil;
		private $nombre_img_perfil;

		public function __construct($id_usuario,
					$id_tipo_usuario,
					$id_pais,
					$nombre,
					$apellido,
					$direccion,
					$correo,
					$telefono,
					$contrasenia,
					$ruta_img_perfil,
					$nombre_img_perfil){
			$this->id_usuario = $id_usuario;
			$this->id_tipo_usuario = $id_tipo_usuario;
			$this->id_pais = $id_pais;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->direccion = $direccion;
			$this->correo = $correo;
			$this->telefono = $telefono;
			$this->contrasenia = $contrasenia;
			$this->ruta_img_perfil = $ruta_img_perfil;
			$this->nombre_img_perfil = $nombre_img_perfil;
		}
		public function getId_usuario(){
			return $this->id_usuario;
		}
		public function setId_usuario($id_usuario){
			$this->id_usuario = $id_usuario;
		}
		public function getId_tipo_usuario(){
			return $this->id_tipo_usuario;
		}
		public function setId_tipo_usuario($id_tipo_usuario){
			$this->id_tipo_usuario = $id_tipo_usuario;
		}
		public function getId_pais(){
			return $this->id_pais;
		}
		public function setId_pais($id_pais){
			$this->id_pais = $id_pais;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getDireccion(){
			return $this->direccion;
		}
		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getContrasenia(){
			return $this->contrasenia;
		}
		public function setContrasenia($contrasenia){
			$this->contrasenia = $contrasenia;
		}
		public function getRuta_img_perfil(){
			return $this->ruta_img_perfil;
		}
		public function setRuta_img_perfil($ruta_img_perfil){
			$this->ruta_img_perfil = $ruta_img_perfil;
		}
		public function getNombre_img_perfil(){
			return $this->nombre_img_perfil;
		}
		public function setNombre_img_perfil($nombre_img_perfil){
			$this->nombre_img_perfil = $nombre_img_perfil;
		}
		public function __toString(){
			return "Id_usuario: " . $this->id_usuario . 
				" Id_tipo_usuario: " . $this->id_tipo_usuario . 
				" Id_pais: " . $this->id_pais . 
				" Nombre: " . $this->nombre . 
				" Apellido: " . $this->apellido . 
				" Direccion: " . $this->direccion . 
				" Correo: " . $this->correo . 
				" Telefono: " . $this->telefono . 
				" Contrasenia: " . $this->contrasenia . 
				" Ruta_img_perfil: " . $this->ruta_img_perfil . 
				" Nombre_img_perfil: " . $this->nombre_img_perfil;
		}

        public function crearFreelancer($conexion){
            $sql = sprintf("insert into tbl_usuario(
                    id_tipo_usuario, 
                    id_pais, 
                    nombre, 
                    apellido, 
                    correo, 
                    telefono, 
                    contrasenia) 
                VALUES (%s,
                    %s,
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s')",
					$conexion->antiInyeccion($this->id_tipo_usuario),
					$conexion->antiInyeccion($this->id_pais),
					$conexion->antiInyeccion($this->nombre),
					$conexion->antiInyeccion($this->apellido),
					$conexion->antiInyeccion($this->correo),
					$conexion->antiInyeccion($this->telefono),
					$conexion->antiInyeccion($this->contrasenia));
			
			$resultado = $conexion->ejecutarConsulta($sql);

			if($resultado){
				$mensaje["mensaje"]="Freelancer agregado exitosamente";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido agregar el Freelancer";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
        }

        public function crearEmpresa($conexion){
			$sql = sprintf("insert into tbl_usuario(
				id_tipo_usuario, 
				id_pais, 
				nombre, 
				direccion, 
				correo, 
				telefono, 
				contrasenia) 
			VALUES (%s,
				%s,
				'%s',
				'%s',
				'%s',
				'%s',
				'%s')",
				$conexion->antiInyeccion($this->id_tipo_usuario),
				$conexion->antiInyeccion($this->id_pais),
				$conexion->antiInyeccion($this->nombre),
				$conexion->antiInyeccion($this->direccion),
				$conexion->antiInyeccion($this->correo),
				$conexion->antiInyeccion($this->telefono),
				$conexion->antiInyeccion($this->contrasenia));
		
			$resultado = $conexion->ejecutarConsulta($sql);

			if($resultado){
				$mensaje["mensaje"]="Empresa agregada exitosamente";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido agregar la Empresa";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
		}
        }
	}
?>