<?php
class Calificaciones {
    private $_conexion;
    private $_id_calificacion;
    private $_id_estudiante;
    private $_id_materia;
    private $_id_docente;
    private $_nota;
    private $_fecha_registro;

    function __construct($conexion, $id_calificacion, $id_estudiante, $id_materia, $id_docente, $nota, $fecha_registro) {
        $this->_conexion = $conexion;
        $this->_id_calificacion = $id_calificacion;
        $this->_id_estudiante = $id_estudiante;
        $this->_id_materia = $id_materia;
        $this->_id_docente = $id_docente;
        $this->_nota = $nota;
        $this->_fecha_registro = $fecha_registro;
    }

}
?>
