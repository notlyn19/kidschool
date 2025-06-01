<?php
class TipoUsuario {
    private $_conexion;
    private $_id_tipo_usuario;
    private $_tipo_usuario;

    function __construct($conexion, $id_tipo_usuario, $tipo_usuario) {
        $this->_conexion = $conexion;
        $this->_id_tipo_usuario = $id_tipo_usuario;
        $this->_tipo_usuario = $tipo_usuario;
    }

}
?>
