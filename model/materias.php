<?php
class Materias {
    private $_conexion;
    private $_id_materia;
    private $_nombre_materia;
    private $_descripcion;

    function __construct($conexion, $id_materia, $nombre_materia, $descripcion) {
        $this->_conexion = $conexion;
        $this->_id_materia = $id_materia;
        $this->_nombre_materia = $nombre_materia;
        $this->_descripcion = $descripcion;
    }

}
?>
