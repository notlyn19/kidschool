<?php
class Docentes {
    private $_conexion;
    private $_id_docente;
    private $_id_usuario;
    private $_nombre_completo;
    private $_documento;
    private $_correo;
    private $_telefono;
    private $_especialidad;

    function __construct($conexion, $id_docente, $id_usuario, $nombre_completo, $documento, $correo, $telefono, $especialidad) {
        $this->_conexion = $conexion;
        $this->_id_docente = $id_docente;
        $this->_id_usuario = $id_usuario;
        $this->_nombre_completo = $nombre_completo;
        $this->_documento = $documento;
        $this->_correo = $correo;
        $this->_telefono = $telefono;
        $this->_especialidad = $especialidad;
    }

}
?>
