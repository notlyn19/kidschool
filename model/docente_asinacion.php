<?php
class Asignacion {
    private $_conexion;
    private $_id_asignacion;
    private $_id_docente;
    private $_id_materia;
    private $_id_curso;
    private $_año_escolar;

    function __construct($conexion, $id_asignacion, $id_docente, $id_materia, $id_curso, $año_escolar) {
        $this->_conexion = $conexion;
        $this->_id_asignacion = $id_asignacion;
        $this->_id_docente = $id_docente;
        $this->_id_materia = $id_materia;
        $this->_id_curso = $id_curso;
        $this->_año_escolar = $año_escolar;
    }

}
?>
