<?php
class Salones {
    private $_conexion;
    private $_id_salon;
    private $_nombre_salon;
    private $_capacidad;
    private $_tipo_salon;

    function __construct($conexion, $id_salon, $nombre_salon, $capacidad, $tipo_salon) {
        $this->_conexion = $conexion;
        $this->_id_salon = $id_salon;
        $this->_nombre_salon = $nombre_salon;
        $this->_capacidad = $capacidad;
        $this->_tipo_salon = $tipo_salon;
    }

}
?>
