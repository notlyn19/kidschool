<?php
class Inscripciones {
    private $_conexion;
    private $_id_inscripcion;
    private $_id_estudiante;
    private $_id_materia;
    private $_id_curso;
    private $_fecha_inscripcion;
    private $_estado_inscripcion;

    function __construct($conexion, $id_inscripcion, $id_estudiante, $id_materia, $id_curso, $fecha_inscripcion, $estado_inscripcion) {
        $this->_conexion = $conexion;
        $this->_id_inscripcion = $id_inscripcion;
        $this->_id_estudiante = $id_estudiante;
        $this->_id_materia = $id_materia;
        $this->_id_curso = $id_curso;
        $this->_fecha_inscripcion = $fecha_inscripcion;
        $this->_estado_inscripcion = $estado_inscripcion;
    }

}
?>
