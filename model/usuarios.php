<?php
    Class Usuario{
        private $_conexion;
        private $_id_usuario;
        private $_nombre_usuario;
        private $_correo;
        private $_contraseña;
        private $_rol;
        private $_estado;
        private $_fecha_creacion;

        function __construct($conexion, $id_usuario, $nombre_usuario, $correo, $contraseña, $rol, $estado, $fecha_creacion){
            $this->_conexion = $conexion;
            $this->_id_usuario = $id_usuario;
            $this->_nombre_usuario = $nombre_usuario;
            $this->_correo = $correo;
            $this->_contraseña = $contraseña;
            $this->_rol = $rol;
            $this->_estado = $estado;
            $this->_fecha_creacion = $fecha_creacion;
        } 


    }